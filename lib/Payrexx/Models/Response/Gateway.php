<?php

/**
 * The Gateway response model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.3.0
 */

namespace Payrexx\Models\Response;

/**
 * Gateway response class
 *
 * @package Payrexx\Models\Response
 */
class Gateway extends \Payrexx\Models\Request\Gateway
{
    protected string $hash;

    protected string $link;

    protected string $status;

    protected int $createdAt;

    protected array $invoices;

    protected int $transactionId;

    protected string $appLink;

    protected int $applicationFee;

    protected int $requestId;

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
        $language = $this->getLanguage();
        if (!empty($language) && strpos($link, "/{$language}/") === false) {
            $link = str_replace('/?', "/{$language}/?", $link);
        }
        $this->link = $link;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
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

    public function getInvoices(): array
    {
        return $this->invoices;
    }

    public function setInvoices(array $invoices): void
    {
        $this->invoices = $invoices;
    }

    public function getTransactionId(): ?int
    {
        return $this->transactionId;
    }

    public function setTransactionId(int $transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    public function getAppLink(): ?string
    {
        return $this->appLink;
    }

    public function setAppLink(string $appLink): void
    {
        $this->appLink = $appLink;
    }

    public function getApplicationFee(): int
    {
        return $this->applicationFee;
    }

    public function setApplicationFee(int $applicationFee): void
    {
        $this->applicationFee = $applicationFee;
    }

    public function getRequestId(): int
    {
        return $this->requestId;
    }

    public function setRequestId(int $requestId): void
    {
        $this->requestId = $requestId;
    }
}
