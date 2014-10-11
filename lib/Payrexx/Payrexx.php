<?php

namespace Payrexx;

class Payrexx
{
    protected $communicator;

    public function __construct($instance, $apiSecret)
    {
        $this->communicator = new \Payrexx\Communicator($instance, $apiSecret);
    }

    public function getVersion()
    {
        return $this->communicator->getVersion();
    }

    public function __call($method, $args)
    {
        if ($this->communicator->methodAvailable($method)) {
            if (empty($args)) {
                throw new \Payrexx\PayrexxException('Argument model is missing');
            }
            $model = current($args);
            return $this->communicator->performApiRequest($method, $model);
        }
        throw new \Payrexx\PayrexxException('Method ' . $method . ' not implemented');
    }
}