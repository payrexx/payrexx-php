<?php

namespace Payrexx\Communication;

abstract class CommunicationAbstract
{
    abstract public function requestApi($apiUrl, $apiSecret, $action = '', $params = array(), $method = 'POST');
}