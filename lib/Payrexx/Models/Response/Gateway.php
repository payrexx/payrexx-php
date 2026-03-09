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
    /** @var string */
    protected $hash;

    /** @var string */
    protected $link;

    /** @var string */
    protected $status;

    /** @var int */
    protected $createdAt;

    /** @var array $invoices */
    protected $invoices;

    /** @var int */
    protected $transactionId;

    /** @var string */
    protected $appLink;

    /** @var int */
    protected $applicationFee;

    /** @var int */
    protected int $requestId;

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $language = $this->getLanguage();
        if (!empty($language) && strpos($link, "/{$language}/") === false) {
            $link = str_replace('/?', "/{$language}/?", $link);
        }
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @param array $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return array
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    /**
     * @param array $invoices
     */
    public function setInvoices($invoices)
    {
        $this->invoices = $invoices;
    }

    /**
     * @return int|null
     */
    public function getTransactionId(): ?int
    {
        return $this->transactionId;
    }

    /**
     * @param int $transactionId
     */
    public function setTransactionId(int $transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return string|null
     */
    public function getAppLink(): ?string
    {
        return $this->appLink;
    }

    /**
     * @param string $appLink
     */
    public function setAppLink(string $appLink): void
    {
        $this->appLink = $appLink;
    }

    /**
     * @return int
     */
    public function getApplicationFee()
    {
        return $this->applicationFee;
    }

    /**
     * @param int $applicationFee
     */
    public function setApplicationFee($applicationFee)
    {
        $this->applicationFee = $applicationFee;
    }

    /**
     * @return int
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param int $requestId
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }
}
