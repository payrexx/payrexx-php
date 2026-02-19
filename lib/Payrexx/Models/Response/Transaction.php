<?php

declare(strict_types=1);

/**
 * Transaction response model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.5.0
 */

namespace Payrexx\Models\Response;

use Payrexx\Models\Request\Transaction as RequestTransaction;

/**
 * Transaction class
 *
 * @package Payrexx\Models\Response
 */
class Transaction extends RequestTransaction
{
    private ?string $time = null;
    private ?string $status = null;
    private ?string $lang = null;
    private ?string $psp = null;
    private ?int $pspId = null;
    private ?string $mode = null;
    private array $payment = [];
    private array $invoice = [];
    private ?array $contact = null;
    private ?string $pageUuid = null;
    private ?int $payrexxFee = null;
    private ?int $fee = null;
    private ?bool $refundable = null;
    private ?bool $partiallyRefundable = null;

    public const CONFIRMED = 'confirmed';
    public const INITIATED = 'initiated';
    public const WAITING = 'waiting';
    public const AUTHORIZED = 'authorized';
    public const RESERVED = 'reserved';
    public const CANCELLED = 'cancelled';
    public const REFUNDED = 'refunded';
    public const DISPUTED = 'disputed';
    public const DECLINED = 'declined';
    public const ERROR = 'error';
    public const EXPIRED = 'expired';
    public const PARTIALLY_REFUNDED = 'partially-refunded';
    public const REFUND_PENDING = 'refund_pending';
    public const INSECURE = 'insecure';
    public const UNCAPTURED = 'uncaptured';

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): void
    {
        $this->time = $time;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }

    public function getPsp(): ?string
    {
        return $this->psp;
    }

    public function setPsp(string $psp): void
    {
        $this->psp = $psp;
    }

    public function getPspId(): ?int
    {
        return $this->pspId;
    }

    public function setPspId(?int $pspId): void
    {
        $this->pspId = $pspId;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(string $mode): void
    {
        $this->mode = $mode;
    }

    public function getPayment(): array
    {
        return $this->payment;
    }

    public function setPayment(array $payment): void
    {
        $this->payment = $payment;
    }

    public function getInvoice(): array
    {
        return $this->invoice;
    }

    public function setInvoice(array $invoice): void
    {
        $this->invoice = $invoice;
    }

    public function getContact(): ?array
    {
        return $this->contact;
    }

    public function setContact(?array $contact): void
    {
        $this->contact = $contact;
    }

    public function getPageUuid(): ?string
    {
        return $this->pageUuid;
    }

    public function setPageUuid(?string $pageUuid): void
    {
        $this->pageUuid = $pageUuid;
    }

    public function getPayrexxFee(): ?int
    {
        return $this->payrexxFee;
    }

    public function setPayrexxFee(?int $payrexxFee): void
    {
        $this->payrexxFee = $payrexxFee;
    }

    public function getFee(): ?int
    {
        return $this->fee;
    }

    public function setFee(int $fee): void
    {
        $this->fee = $fee;
    }

    /**
     * Supported since version 1.2
     */
    public function getRefundable(): ?bool
    {
        return $this->refundable;
    }

    public function setRefundable(?bool $refundable): void
    {
        $this->refundable = $refundable;
    }

    /**
     * Supported since version 1.2
     */
    public function getPartiallyRefundable(): ?bool
    {
        return $this->partiallyRefundable;
    }

    public function setPartiallyRefundable(?bool $partiallyRefundable): void
    {
        $this->partiallyRefundable = $partiallyRefundable;
    }
}
