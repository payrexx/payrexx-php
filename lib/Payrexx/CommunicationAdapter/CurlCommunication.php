<?php

/**
 * This is the cURL communication adapter
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.0
 */

namespace Payrexx\CommunicationAdapter;

use CURLFile;
use Exception;
use CurlHandle;

// check for php version 8.0 or higher
if (version_compare(PHP_VERSION, '8.0', '<')) {
    throw new Exception('Your PHP version is not supported. Minimum version should be 8.0');
} else if (!function_exists('json_decode')) {
    throw new Exception('json_decode function missing. Please install the JSON extension');
}

// is the curl extension available?
if (!extension_loaded('curl')) {
    throw new Exception('Please install the PHP cURL extension');
}

/**
 * Class CurlCommunication for the communication with cURL
 * @package Payrexx\CommunicationAdapter
 */
class CurlCommunication extends AbstractCommunication
{
    public function requestApi(
        string $apiUrl,
        array $params = [],
        string $method = 'POST',
        array $httpHeader = []
    ): array {
        $curlOpts = [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_CAINFO => dirname(__DIR__) . '/certs/ca.pem',
        ];
        if (defined('PHP_QUERY_RFC3986')) {
            $paramString = http_build_query($params, '', '&', PHP_QUERY_RFC3986);
        } else {
            // legacy, because the $enc_type has been implemented with PHP 5.4
            $paramString = str_replace(
                ['+', '%7E'],
                ['%20', '~'],
                http_build_query($params, '', '&')
            );
        }
        if ($method == 'GET') {
            if (!empty($params)) {
                $curlOpts[CURLOPT_URL] .= str_contains($curlOpts[CURLOPT_URL], '?') ? '&' : '?';
                $curlOpts[CURLOPT_URL] .= $paramString;
            }
        } else {
            $curlOpts[CURLOPT_POSTFIELDS] = json_encode($params);
            $curlOpts[CURLOPT_URL] .= str_contains($curlOpts[CURLOPT_URL], '?') ? '&' : '?';
            $curlOpts[CURLOPT_URL] .= 'instance=' . $params['instance'];
        }
        if ($httpHeader) {
            $header = [];
            foreach ($httpHeader as $name => $value) {
                $header[] = $name . ': ' . $value;
            }
            $curlOpts[CURLOPT_HTTPHEADER] = $header;
        }
        $hasFile = false;
        $hasCurlFile = class_exists('CURLFile', false);
        foreach ($params as $param) {
            if (is_resource($param) || ($hasCurlFile && $param instanceof CURLFile)) {
                $hasFile = true;
                break;
            }
        }
        if ($hasFile) {
            if (empty($params['id'])) {
                unset($params['id']);
            }
            $postFields = [];
            foreach ($params as $key => $param) {
                if (is_array($param)) {
                    foreach ($param as $index => $value) {
                        $postFields["{$key}[$index]"] = $value;
                    }
                } else {
                    $postFields[$key] = $param;
                }
            }
            $curlOpts[CURLOPT_POSTFIELDS] = $postFields;
        }
        $curlOpts[CURLOPT_HTTPHEADER][] = 'Content-Type: ' . (
            $hasFile ? 'multipart/form-data' : 'application/json'
        );

        $curl = curl_init();
        curl_setopt_array($curl, $curlOpts);
        $responseBody = $this->curlExec($curl);
        $responseInfo = $this->curlInfo($curl);

        if ($responseBody === false) {
            $responseBody = ['status' => 'error', 'message' => $this->curlError($curl)];
        }
        curl_close($curl);

        if ($responseInfo['content_type'] === 'application/json') {
            $responseBody = json_decode($responseBody, true);
        }

        return [
            'info' => $responseInfo,
            'body' => $responseBody
        ];
    }

    protected function curlExec(CurlHandle $curl): string|bool
    {
        return curl_exec($curl);
    }

    protected function curlInfo(CurlHandle $curl): mixed
    {
        return curl_getinfo($curl);
    }

    protected function curlError(CurlHandle $curl): int
    {
        return curl_errno($curl);
    }
}
