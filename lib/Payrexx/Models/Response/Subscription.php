<?php

/**
 * The subscription response model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.0
 */

namespace Payrexx\Models\Response;

/**
 * Class Subscription
 *
 * @package Payrexx\Models\Response
 */
class Subscription extends \Payrexx\Models\Request\Subscription
{
    protected string $status = '';
    protected string $pspSubscriptionId = '';
    protected string $start = '';
    protected ?string $end = '';
    protected ?string $validUntil = '';
    protected int $cancelledDate = 0;
    protected int $firstCancelDate = 0;
    protected int $nextPayDate = 0;

    public function getCancelledDate(): int
    {
        return $this->cancelledDate;
    }

    public function setCancelledDate(int $cancelledDate): void
    {
        $this->cancelledDate = $cancelledDate;
    }

    public function getEnd(): ?string
    {
        return $this->end;
    }

    public function setEnd(?string $end): void
    {
        $this->end = $end;
    }

    public function getValidUntil(): ?string
    {
        return $this->validUntil;
    }

    public function setValidUntil(?string $validUntil): void
    {
        $this->validUntil = $validUntil;
    }

    public function getFirstCancelDate(): int
    {
        return $this->firstCancelDate;
    }

    public function setFirstCancelDate(int $firstCancelDate): void
    {
        $this->firstCancelDate = $firstCancelDate;
    }

    public function getNextPayDate(): int
    {
        return $this->nextPayDate;
    }

    public function setNextPayDate(int $nextPayDate): void
    {
        $this->nextPayDate = $nextPayDate;
    }

    public function getPspSubscriptionId(): string
    {
        return $this->pspSubscriptionId;
    }

    public function setPspSubscriptionId(string $pspSubscriptionId): void
    {
        $this->pspSubscriptionId = $pspSubscriptionId;
    }

    public function getStart(): string
    {
        return $this->start;
    }

    public function setStart(string $start): void
    {
        $this->start = $start;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
