<?php

namespace Payrexx;

class Communicator
{
    const VERSION = 'v1';
    const API_URL = 'https://%s.payrexx.com/api/%s/';

    protected $apiUrl;
    protected $apiSecret;
    protected $communicationHandler;
    protected static $methods = array(
//        'create' => 'POST',
        'cancel' => 'DELETE',
//        'update' => 'PUT',
//        'getAll' => 'GET',
//        'getOne' => 'GET',
    );

    public function __construct($instance, $apiSecret, $communicationHandler = '\Payrexx\Communication\CurlCommunication')
    {
        $this->apiUrl = sprintf(self::API_URL, $instance, self::VERSION);
        $this->apiSecret = $apiSecret;

        if (!class_exists($communicationHandler)) {
            throw new \Payrexx\PayrexxException('Communication handler class ' . $communicationHandler . ' not found');
        }
        $this->communicationHandler = new $communicationHandler();
    }

    public function getVersion()
    {
        return self::VERSION;
    }

    public function methodAvailable($method)
    {
        return array_key_exists($method, self::$methods);
    }

    public function performApiRequest($method, \Payrexx\Models\Request\Base $model)
    {
        $response = $this->communicationHandler->requestApi(
            $this->apiUrl,
            $this->apiSecret,
            $method,
            $model->toArray($method),
            $this->getHttpMethod($method)
        );

        $convertedResponse = array();
        if (!is_array($response['body']['data'])) {
            throw new \Payrexx\PayrexxException('Payrexx API Error Status: ' . $response['header']['status']);
        }

        foreach ($response['body']['data'] as $object) {
            $responseModel = $model->getResponseModel();
            $convertedResponse[] = $responseModel->fromArray($object);
        }
        if (strpos($method, 'One') !== false) {
            $convertedResponse = current($convertedResponse);
        }
        return $convertedResponse;
    }

    protected function getHttpMethod($method)
    {
        if (!$this->methodAvailable($method)) {
            throw new \Payrexx\PayrexxException('Method ' . $method . ' not implemented');
        }
        return self::$methods[$method];
    }
}