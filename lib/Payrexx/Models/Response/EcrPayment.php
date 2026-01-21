<?php

namespace Payrexx\Models\Response;

use Payrexx\Models\Base;

class EcrPayment extends Base
{
    protected ?string $status = null;

    protected ?string $paymentId = null;

    protected ?array $slip = null;

    // --- Getters and Setters ---
    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    public function setPaymentId(string $transactionId): void
    {
        $this->paymentId = $transactionId;
    }


    public function getSlip(): ?array
    {
        return $this->slip;
    }

    public function setSlip(array $slip): void
    {
        $this->slip = $slip;
    }

    public function fromArray(array $data): Base
    {
        if (isset($data['payment_status'])) {
            $this->setStatus($data['payment_status']);
        }

        elseif (isset($data['status'])) {
            $this->setStatus($data['status']);
        }

        if (isset($data['payment_id'])) {
            $this->setPaymentId((string)$data['payment_id']);
        }

        if (isset($data['slip']) && is_array($data['slip'])) {
            $this->setSlip($data['slip']);
        }

        return parent::fromArray($data);
    }

    public function getResponseModel(): object
    {
        return new self();
    }
}