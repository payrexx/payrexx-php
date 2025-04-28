<?php

/**
 * The invoice response model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.0
 */

namespace Payrexx\Models\Response;

/**
 * Class Invoice
 *
 * @package Payrexx\Models\Response
 */
class Invoice extends \Payrexx\Models\Request\Invoice
{
    protected string $hash = '';

    protected string $link = '';

    protected string $status = '';

    protected int $createdAt = 0;

    protected array $invoices = [];

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getInvoices(): array
    {
        return $this->invoices;
    }

    public function setInvoices(array $invoices): void
    {
        $this->invoices = $invoices;
    }
}
