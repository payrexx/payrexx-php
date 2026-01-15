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
    protected ?string $pairingCode = null;
    protected ?string $name = null;

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

    public function getPairingCode(): ?string
    {
        return $this->pairingCode;
    }

    /**
     * @param string $pairingCode
     */
    public function setPairingCode(string $pairingCode): void
    {
        $this->pairingCode = $pairingCode;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Override toArray to ensure keys match the API expectation
     */
    public function toArray(): array
    {
        $array = parent::toArray();
        $array['model'] = 'ecr';

        return $array;
    }

    public function getResponseModel(): object
    {
        return new EcrResponse();
    }
}