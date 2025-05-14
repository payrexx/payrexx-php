<?php

/**
 * Transaction request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.5.0
 */

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;
use DateTime;
use DateTimeZone;
use Payrexx\Models\Response\Transaction as ResponseTransaction;

/**
 * Transaction class
 *
 * @package Payrexx\Models\Request
 */
class Transaction extends Base
{
    protected int $amount;
    protected string $currency;
    protected string $purpose;
    protected float $vatRate;
    protected array $fields;
    protected string $referenceId;
    protected string $recipient;
    protected string $filterDatetimeUtcGreaterThan;
    protected string $filterDatetimeUtcLessThan;
    protected bool $filterMyTransactionsOnly = false;
    protected string $orderByTime = 'ASC';
    protected int $offset;
    protected int $limit;

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getPurpose(): string
    {
        return $this->purpose;
    }

    public function setPurpose(string $purpose): void
    {
        $this->purpose = $purpose;
    }

    public function getVatRate(): ?float
    {
        return $this->vatRate;
    }

    public function setVatRate(float $vatRate): void
    {
        $this->vatRate = $vatRate;
    }

    public function getFields(): array
    {
        return $this->fields ?? [];
    }

    public function addField(string $type, string $value, array $name = []): void
    {
        $this->fields[$type] = [
            'value' => $value,
            'name' => $name,
        ];
    }

    public function getReferenceId(): string
    {
        return $this->referenceId;
    }

    public function setReferenceId(string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    public function getRecipient(): string
    {
        return $this->recipient;
    }

    public function setRecipient(string $recipient): void
    {
        $this->recipient = $recipient;
    }

    public function getFilterDatetimeUtcGreaterThan(): string
    {
        return $this->filterDatetimeUtcGreaterThan;
    }

    public function setFilterDatetimeUtcGreaterThan(DateTime $filterDatetimeUtcGreaterThan): void
    {
        $this->filterDatetimeUtcGreaterThan = $filterDatetimeUtcGreaterThan->setTimezone(new DateTimeZone('UTC'))->format('Y-m-d H:i:s');
    }

    public function getFilterDatetimeUtcLessThan(): string
    {
        return $this->filterDatetimeUtcLessThan;
    }

    public function setFilterDatetimeUtcLessThan(DateTime $filterDatetimeUtcLessThan): void
    {
        $this->filterDatetimeUtcLessThan = $filterDatetimeUtcLessThan->setTimezone(new DateTimeZone('UTC'))->format('Y-m-d H:i:s');
    }

    public function getFilterMyTransactionsOnly(): bool
    {
        return $this->filterMyTransactionsOnly;
    }

    public function setFilterMyTransactionsOnly(bool $filterMyTransactionsOnly): void
    {
        $this->filterMyTransactionsOnly = $filterMyTransactionsOnly;
    }

    public function getOrderByTime(): ?string
    {
        return $this->orderByTime;
    }

    public function setOrderByTime(string $orderByTime): void
    {
        $this->orderByTime = $orderByTime;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function setOffset(int $offset): void
    {
        $this->offset = $offset;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function getResponseModel(): ResponseTransaction
    {
        return new ResponseTransaction();
    }
}
