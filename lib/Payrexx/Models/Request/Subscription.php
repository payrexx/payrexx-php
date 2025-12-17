<?php

/**
 * The subscription request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.0
 */

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;
use Payrexx\Models\Response\Subscription as ResponseSubscription;

/**
 * Class Subscription
 *
 * @package Payrexx\Models\Request
 */
class Subscription extends Base
{
    public const CURRENCY_CHF = 'CHF';
    public const CURRENCY_EUR = 'EUR';
    public const CURRENCY_USD = 'USD';
    public const CURRENCY_GBP = 'GBP';

    // all fields mandatory
    protected int $userId = 0;
    protected int $psp = 0;

    protected string $purpose = '';
    protected int $amount = 0;
    protected string $currency = '';

    protected string $paymentInterval = '';
    protected string $period = '';
    protected string $cancellationInterval = '';

    // optional
    protected string $referenceId = '';
    protected string $orderByStartDate = 'ASC';
    protected int $offset;
    protected int $limit;

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getPsp(): int
    {
        return $this->psp;
    }

    public function setPsp(int $psp): void
    {
        $this->psp = $psp;
    }

    public function getPurpose(): string
    {
        return $this->purpose;
    }

    public function setPurpose(string $purpose): void
    {
        $this->purpose = $purpose;
    }

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

    public function getPaymentInterval(): string
    {
        return $this->paymentInterval;
    }

    public function setPaymentInterval(string $paymentInterval): void
    {
        $this->paymentInterval = $paymentInterval;
    }

    public function getPeriod(): string
    {
        return $this->period;
    }

    public function setPeriod(string $period): void
    {
        $this->period = $period;
    }

    public function getCancellationInterval(): string
    {
        return $this->cancellationInterval;
    }

    public function setCancellationInterval(string $cancellationInterval): void
    {
        $this->cancellationInterval = $cancellationInterval;
    }

    public function getReferenceId(): string
    {
        return $this->referenceId;
    }

    public function setReferenceId(string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    public function getOrderByStartDate(): string
    {
        return $this->orderByStartDate;
    }

    public function setOrderByStartDate(string $orderByStartDate): void
    {
        $this->orderByStartDate = $orderByStartDate;
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

    public function getResponseModel(): ResponseSubscription
    {
        return new ResponseSubscription();
    }
}
