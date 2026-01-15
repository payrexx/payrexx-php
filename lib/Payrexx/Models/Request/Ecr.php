<?php

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;
use Payrexx\Models\Response\Ecr as EcrResponse;

class Ecr extends Base
{
    protected ?int $amount = null;
    protected ?string $currency = null;
    protected ?string $purpose = null;
    protected ?string $referenceId = null;

    // Helper for nested IDs (optional, but recommended)
    public function setPaymentId(string $terminalSerialNumber, $paymentId): void
    {
        $this->setId($terminalSerialNumber . '/payment/' . $paymentId);
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getPurpose(): ?string
    {
        return $this->purpose;
    }

    public function setPurpose(string $purpose): void
    {
        $this->purpose = $purpose;
    }

    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    public function setReferenceId(string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    public function getResponseModel(): object
    {
        return new EcrResponse();
    }
}