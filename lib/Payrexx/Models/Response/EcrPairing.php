<?php

namespace Payrexx\Models\Response;

use Payrexx\Models\Base;

/**
 * EcrPairing Response Model
 *
 * @package Payrexx\Models\Response
 */
class EcrPairing extends Base
{
    protected ?string $status = null;

    protected ?string $cashierName = null;

    protected ?array $configuration = null;

    protected ?array $data = null;

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getCashierName(): ?string
    {
        return $this->cashierName;
    }

    public function setCashierName(?string $cashierName): void
    {
        $this->cashierName = $cashierName;
    }

    public function getConfiguration(): ?array
    {
        return $this->configuration;
    }

    public function setConfiguration(?array $configuration): void
    {
        $this->configuration = $configuration;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function setData($data): void
    {
        if (is_array($data)) {
            $this->data = $data;
        } else {
            $this->data = explode(',', $data);
        }
    }

    /**
     * Override fromArray to handle both Lists (Payment Methods)
     * and Object Properties (Pairing Data).
     */
    public function fromArray(array $data): self
    {
        $isList = !empty($data) && array_keys($data) === range(0, count($data) - 1);

        if ($isList) {
            $this->setData($data);
            return $this;
        }

        if (isset($data['pairingStatus'])) {
            $this->setStatus($data['pairingStatus']);
        } elseif (isset($data['status'])) {
            $this->setStatus($data['status']);
        }

        // Map 'cashierName'
        if (isset($data['cashierName'])) {
            $this->setCashierName($data['cashierName']);
        }

        // Map 'configuration'
        if (isset($data['configuration']) && is_array($data['configuration'])) {
            $this->setConfiguration($data['configuration']);
        }

        return $this;
    }

    public function getResponseModel(): object
    {
        return new self();
    }
}