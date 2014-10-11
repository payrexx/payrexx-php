<?php

namespace Payrexx\Communication;

if (version_compare(PHP_VERSION, '5.2.0', '<')) {
    throw new \Exception('Your PHP version is not supported. Minimum version should be 5.2.0');
} else if (!function_exists('json_decode')) {
    throw new \Exception('json_decode function missing. Please install the JSON extension');
}

if (!extension_loaded('curl')) {
    throw new \Exception('Please install the PHP cURL extension');
}

class CurlCommunication extends \Payrexx\Communication\CommunicationAbstract
{
    public function requestApi($apiUrl, $apiSecret, $action = '', $params = array(), $method = 'POST')
    {
        $curlOpts = array(
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_USERAGENT => 'payrexx-php/1.0.0',
            CURLOPT_SSL_VERIFYPEER => true
        );
        $params['ApiAction'] = $action;
        $params['ApiSignature'] =
            base64_encode(hash_hmac('sha256', http_build_query($params, null, '&'), $apiSecret, true));
        $paramString = http_build_query($params, null, '&');
        if ($method == 'GET') {
            if (!empty($params)) {
                $curlOpts[CURLOPT_URL] .= strpos($curlOpts[CURLOPT_URL], '?') === false ? '?' : '&';
                $curlOpts[CURLOPT_URL] .= $paramString;
            }
        } else {
            $curlOpts[CURLOPT_POSTFIELDS] = $paramString;
        }

        $curl = curl_init();
        curl_setopt_array($curl, $curlOpts);
        $responseBody = $this->curlExec($curl);
        $responseInfo = $this->curlInfo($curl);

        if ($responseBody === false) {
            $responseBody = array('error' => $this->curlError($curl));
        }
        curl_close($curl);

        if ($responseInfo['content_type'] == 'application/json') {
            $responseBody = json_decode($responseBody, true);
        } else if ($responseInfo['content_type'] == 'text/csv' && !isset($responseBody['error'])) {
            return $responseBody;
        }

        return array(
            'header' => array(
                'status' => $responseInfo['http_code'],
                'reason' => null,
            ),
            'body' => $responseBody,
        );
    }

    protected function curlExec($curl)
    {
        return curl_exec($curl);
    }

    protected function curlInfo($curl)
    {
        return curl_getinfo($curl);
    }

    protected function curlError($curl)
    {
        return curl_errno($curl);
    }
}