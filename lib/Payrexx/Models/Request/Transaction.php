<?php

declare(strict_types=1);

/**
 * Transaction request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.5.0
 */

namespace Payrexx\Models\Request;

use DateTime;
use DateTimeZone;
use Payrexx\Models\Base;
use Payrexx\Models\Response\Transaction as ResponseTransaction;

/**
 * Transaction class
 *
 * @package Payrexx\Models\Request
 */
class Transaction extends Base
{
    protected ?int $amount = null;
    protected ?string $currency = null;
    protected ?string $purpose = null;
    protected ?float $vatRate = null;
    protected array $fields = [];
    protected ?string $referenceId = null;
    protected ?string $payoutDescriptor = null;
    protected ?string $recipient = null;
    protected ?string $filterDatetimeUtcGreaterThan = null;
    protected ?string $filterDatetimeUtcLessThan = null;
    protected bool $filterMyTransactionsOnly = false;
    protected string $orderByTime = 'ASC';
    protected ?int $offset = null;
    protected ?int $limit = null;

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
        $this->currency = strtoupper($currency);
    }

    public function getPurpose(): ?string
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
        return $this->fields;
    }

    public function addField(string $type, ?string $value, array $name = []): void
    {
        $this->fields[$type] = [
            'value' => $value,
            'name'  => $name,
        ];
    }

    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    public function setReferenceId(string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    public function getPayoutDescriptor(): ?string
    {
        return $this->payoutDescriptor;
    }

    public function setPayoutDescriptor(string $payoutDescriptor): void
    {
        $this->payoutDescriptor = $payoutDescriptor;
    }

    public function getRecipient(): ?string
    {
        return $this->recipient;
    }

    public function setRecipient(string $recipient): void
    {
        $this->recipient = $recipient;
    }

    public function getFilterDatetimeUtcGreaterThan(): ?string
    {
        return $this->filterDatetimeUtcGreaterThan;
    }

    public function setFilterDatetimeUtcGreaterThan(DateTime $dateTime): void
    {
        $this->filterDatetimeUtcGreaterThan = 
            $dateTime
                ->setTimezone(new DateTimeZone('UTC'))
                ->format('Y-m-d H:i:s');
    }

    public function getFilterDatetimeUtcLessThan(): ?string
    {
        return $this->filterDatetimeUtcLessThan;
    }

    public function setFilterDatetimeUtcLessThan(DateTime $dateTime): void
    {
        $this->filterDatetimeUtcLessThan = 
            $dateTime
                ->setTimezone(new DateTimeZone('UTC'))
                ->format('Y-m-d H:i:s');
    }

    public function getFilterMyTransactionsOnly(): bool
    {
        return $this->filterMyTransactionsOnly;
    }

    public function setFilterMyTransactionsOnly(bool $value): void
    {
        $this->filterMyTransactionsOnly = $value;
    }

    public function getOrderByTime(): string
    {
        return $this->orderByTime;
    }

    public function setOrderByTime(string $orderByTime): void
    {
        $orderByTime = strtoupper($orderByTime);

        if (!in_array($orderByTime, ['ASC', 'DESC'], true)) {
            throw new \InvalidArgumentException('Order must be ASC or DESC');
        }

        $this->orderByTime = $orderByTime;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function setOffset(int $offset): void
    {
        $this->offset = max(0, $offset);
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = max(1, $limit);
    }

    public function getResponseModel(): ResponseTransaction
    {
        return new ResponseTransaction();
    }
}
