<?php

/**
 * The Ecr Response model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.0
 */

namespace Payrexx\Models\Response;

use Payrexx\Models\Base;

/**
 * Ecr Response Model
 *
 * @package Payrexx\Models\Response
 */
class Ecr extends Base
{
    /**
     * @var string|null Status of the request (e.g. 'waiting', 'confirmed')
     */
    protected ?string $status = null;

    /**
     * @var array|null Transaction details object
     */
    protected ?array $transaction = null;

    /**
     * @var string|null Payment method name (used in getTerminalPaymentMethods)
     */
    protected ?string $name = null;

    /**
     * @var string|null Payment method brand (used in getTerminalPaymentMethods)
     */
    protected ?string $brand = null;

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return array|null
     */
    public function getTransaction(): ?array
    {
        return $this->transaction;
    }

    /**
     * @param array $transaction
     */
    public function setTransaction(array $transaction): void
    {
        $this->transaction = $transaction;
    }

    /**
     * Helper to retrieve the inner Transaction ID
     * @return int|null
     */
    public function getTransactionId(): ?int
    {
        return isset($this->transaction['id']) ? (int)$this->transaction['id'] : null;
    }

    /**
     * Helper to retrieve the inner Transaction UUID
     * @return string|null
     */
    public function getTransactionUuid(): ?string
    {
        return $this->transaction['uuid'] ?? null;
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
     * @return string|null
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel(): object
    {
        return new self();
    }
}