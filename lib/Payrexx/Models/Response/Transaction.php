<?php

/**
 * Transaction response model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.5.0
 */

namespace Payrexx\Models\Response;

/**
 * Transaction class
 *
 * @package Payrexx\Models\Response
 */
class Transaction extends \Payrexx\Models\Request\Transaction
{
    private string $time;
    private string $status;
    private string $lang;
    private string $psp;
    private ?int $pspId;
    private string $mode;
    private array $payment;
    private array $invoice;
    private ?array $contact;
    private ?string $pageUuid;
    private ?int $payrexxFee;
    private int $fee;
    private ?bool $refundable;
    private ?bool $partiallyRefundable;

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

    public function setTime(string $time): void
    {
        $this->time = $time;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }

    public function getLang(): string
    {
        return $this->lang;
    }

    public function setPsp(string $psp): void
    {
        $this->psp = $psp;
    }

    public function getPsp(): string
    {
        return $this->psp;
    }

    public function getPspId(): ?int
    {
        return $this->pspId;
    }

    public function setPspId(?int $pspId): void
    {
        $this->pspId = $pspId;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function setMode(string $mode): void
    {
        $this->mode = $mode;
    }

    public function setPayment(array $payment): void
    {
        $this->payment = $payment;
    }

    public function getPayment(): array
    {
        return $this->payment;
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

    public function getFee(): int
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
