<?php

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;

/**
 * Ecr Request Model
 */
class Ecr extends Base
{
    protected $serialNumber;
    protected $pairingCode;
    protected $cashierName;
    protected $terminal;

    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }

    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    public function setPairingCode($pairingCode)
    {
        $this->pairingCode = $pairingCode;
    }

    public function getPairingCode()
    {
        return $this->pairingCode;
    }

    public function setCashierName($cashierName)
    {
        $this->cashierName = $cashierName;
    }

    public function getCashierName()
    {
        return $this->cashierName;
    }

    public function getResponseModel()
    {
        return new ResponseEcr();
    }
}