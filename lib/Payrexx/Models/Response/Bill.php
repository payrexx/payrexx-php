<?php

/**
 * The Bill response model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.8.12
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

    public function setStatus(string $status)
    {
        return $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setPaymentStatus(string $paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
    }

    public function getPaymentStatus(): string
    {
        return $this->paymentStatus;
    }

    public function setNumber(string $number)
    {
        $this->number = $number;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setTotal(int $total)
    {
        $this->total = $total;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTransactions(array $transactions)
    {
        $this->transactions = $transactions;
    }

    public function getTransactions(): array
    {
        return $this->transactions;
    }

    public function setPaymentLink(string $paymentLink)
    {
        $this->paymentLink = $paymentLink;
    }

    public function getPaymentLink(): string
    {
        return $this->paymentLink;
    }

    public function setPurchaseOnInvoiceInformation(array $invoiceInformation)
    {
        $this->purchaseOnInvoiceInformation = $invoiceInformation;
    }

    public function getPurchaseOnInvoiceInformation(): array
    {
        return $this->purchaseOnInvoiceInformation;
    }
}
