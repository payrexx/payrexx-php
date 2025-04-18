<?php

/**
 * Guzzle communication adapter
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.0
 */

namespace Payrexx\CommunicationAdapter;

use CURLFile;
use Exception;

// check for php version 8.0 or higher
if (version_compare(PHP_VERSION, '8.0', '<')) {
    throw new Exception('Your PHP version is not supported. Minimum version should be 8.0');
}

// is the GuzzleHttp extension available?
if (!class_exists(\GuzzleHttp\Client::class)) {
    throw new Exception('Please install the PHP GuzzleHttp library');
}

/**
 * Class GuzzleCommunication for the communication with cURL
 * @package Payrexx\CommunicationAdapter
 */
class GuzzleCommunication extends AbstractCommunication
{
    /**
     * {@inheritdoc}
     */
    public function requestApi($apiUrl, $params = [], $method = 'POST', $httpHeader = [])
    {
        $hasFile = false;
        $hasCurlFile = class_exists('CURLFile', false);
        $multipart = [];
        foreach ($params as $key => $param) {
            if (is_resource($param)) {
                $multipart[] = [
                    'name'     => $key,
                    'contents' => stream_get_contents($param),
                ];
                $hasFile = true;
            } elseif ($hasCurlFile && $param instanceof CURLFile) {
                $multipart[] = [
                    'name'     => $key,
                    'contents' => fopen($param->getFilename(), 'r'),
                    'filename' => basename($param->getFilename()),
                ];
                $hasFile = true;
            }
        }
        if ($hasFile && empty($params['id'])) {
            unset($params['id']);
            $requestParams['multipart'] = $multipart;
        } else {
            $requestParams['json'] = $params;
        }

        $client = new \GuzzleHttp\Client([
            'headers' => $httpHeader,
            // 'verify' => dirname(__DIR__) . '/certs/ca.pem',
            'verify' => false,
        ]);

        try {
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
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];

            $responseInfo = [
                'http_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : 0,
                'contentType' => $e->hasResponse() ? $e->getResponse()->getHeaderLine('Content-Type') : '',
            ];
        }

        // Decode JSON if content-type is application/json
        if (isset($responseInfo['contentType']) && str_contains($responseInfo['contentType'], 'application/json')) {
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
