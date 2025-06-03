<?php

/**
 * Guzzle communication adapter
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v2.0.0
 */

namespace Payrexx\CommunicationAdapter;

use CURLFile;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;

try {
    if (version_compare(PHP_VERSION, '8.0', '<')) {
        throw new Exception('Your PHP version is not supported. Minimum version should be 8.0');
    }

    if (!class_exists(Client::class)) {
        throw new Exception('GuzzleHttp library not found. Run "composer require guzzlehttp/guzzle" to install');
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}

/**
 * Class GuzzleCommunication for the communication with cURL
 * @package Payrexx\CommunicationAdapter
 */
class GuzzleCommunication extends AbstractCommunication
{

    protected ?ClientInterface $client;

    public function __construct(?ClientInterface $client = null)
    {
        $this->client = $client;
    }

    public function requestApi($apiUrl, $params = [], $method = 'POST', $httpHeader = []): array
    {
        $hasCurlFile = class_exists('CURLFile', false);
        $multipart = [];
        $hasFile = false;
        foreach ($params as $key => $param) {
            $filePath = false;
            if (is_string($param) && is_file($param)) {
                $filePath = $param;
            } elseif ($hasCurlFile && $param instanceof CURLFile) {
                $filePath = $param->getFilename();
            }

            if ($filePath) {
                $resource = fopen($filePath, 'r');
                if (is_resource($resource)) {
                    $multipart[] = [
                        'name' => $key,
                        'contents' => $resource,
                        'filename' => basename($filePath),
                    ];
                    $hasFile = true;
                }
            } elseif (is_array($param)) {
                foreach ($param as $subKey => $subValue) {
                    $multipart[] = [
                        'name' => "{$key}[$subKey]",
                        'contents' => (string)$subValue,
                    ];
                }
            } else {
                $multipart[] = [
                    'name' => $key,
                    'contents' => (string)$param,
                ];
            }
        }

        if ($hasFile && empty($params['id'])) {
            unset($params['id']);
            $requestParams['multipart'] = $multipart;
        } else {
            $requestParams['json'] = $params;
        }

        try {
            $client = $this->client ?? new Client([
                RequestOptions::HEADERS => $httpHeader,
                RequestOptions::VERIFY => dirname(__DIR__) . '/certs/ca.pem',
            ]);
            $response = $client->request(
                $method,
                $apiUrl . '?instance=' . $params['instance'],
                $requestParams,
            );

            $responseBody = $response->getBody()->getContents();
            $responseInfo = [
                'http_code' => $response->getStatusCode(),
                'contentType' => $response->getHeaderLine('Content-Type'),
            ];
        } catch (RequestException $e) {
            $responseBody = $e->hasResponse()
                ? $e->getResponse()->getBody()->getContents()
                : json_encode([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                ]);

            $responseInfo = [
                'http_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : 0,
                'contentType' => $e->hasResponse() ? $e->getResponse()->getHeaderLine('Content-Type') : '',
            ];
        } catch (GuzzleException $e) {
            $responseBody = json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);

            $responseInfo = [
                'http_code' => 0,
                'contentType' => '',
            ];
        }

        // Decode JSON if content-type is application/json
        if (str_contains($responseInfo['contentType'], 'application/json')) {
            $decoded = json_decode($responseBody, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $responseBody = $decoded;
            }
        }

        return [
            'info' => $responseInfo,
            'body' => $responseBody,
        ];
    }
}
