<?php

/**
 * The Bill response model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v2.0.0
 */

namespace Payrexx\Models\Response;

/**
 * Bill response class
 *
 * @package \Payrexx\Models\Response
 */
class Bill extends \Payrexx\Models\Request\Bill
{
    protected string $status;
    protected string $paymentStatus;
    protected string $number;
    protected int $total;
    protected array $transactions;
    protected string $paymentLink;
    protected array $purchaseOnInvoiceInformation;
    protected array $meta;

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setPaymentStatus(string $paymentStatus): void
    {
        $this->paymentStatus = $paymentStatus;
    }

    public function getPaymentStatus(): string
    {
        return $this->paymentStatus;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTransactions(array $transactions): void
    {
        $this->transactions = $transactions;
    }

    public function getTransactions(): array
    {
        return $this->transactions;
    }

    public function setPaymentLink(string $paymentLink): void
    {
        $this->paymentLink = $paymentLink;
    }

    public function getPaymentLink(): string
    {
        return $this->paymentLink;
    }

    public function setPurchaseOnInvoiceInformation(array $invoiceInformation): void
    {
        $this->purchaseOnInvoiceInformation = $invoiceInformation;
    }

    public function getPurchaseOnInvoiceInformation(): array
    {
        return $this->purchaseOnInvoiceInformation;
    }

    public function setMeta(array $meta): void
    {   
        $this->meta = $meta;
    }

    public function getMeta(): array
    {
        return $this->meta;
    }
}
