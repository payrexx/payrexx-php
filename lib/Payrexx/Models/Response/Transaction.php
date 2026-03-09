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

    private $time;
    private $status;
    private $lang;
    private $psp;
    private $pspId;
    private $mode;
    private $payment;
    private $invoice;
    private $contact;
    private $pageUuid;
    private $payrexxFee;
    private $fee;
    private $refundable;
    private $partiallyRefundable;

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

    /**
     * @param string $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param string $psp
     */
    public function setPsp($psp)
    {
        $this->psp = $psp;
    }

    /**
     * @return string
     */
    public function getPsp()
    {
        return $this->psp;
    }

    /**
     * @return int
     */
    public function getPspId()
    {
        return $this->pspId;
    }

    /**
     * @param int $pspId
     */
    public function setPspId($pspId)
    {
        $this->pspId = $pspId;
    }

    /**
     * @return int
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param int $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * @param array $payment
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
    }

    /**
     * @return array
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @return array
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param array $invoice
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @return array
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param array $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return string
     */
    public function getPageUuid()
    {
        return $this->pageUuid;
    }

    /**
     * @param string $pageUuid
     */
    public function setPageUuid($pageUuid)
    {
        $this->pageUuid = $pageUuid;
    }

    /**
     * @return int
     */
    public function getPayrexxFee()
    {
        return $this->payrexxFee;
    }

    /**
     * @param int $payrexxFee
     */
    public function setPayrexxFee(int $payrexxFee)
    {
        $this->payrexxFee = $payrexxFee;
    }

    /**
     * @return int
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param int $fee
     */
    public function setFee(int $fee)
    {
        $this->fee = $fee;
    }

    /**
     * Supported since version 1.2
     * @return bool|null
     */
    public function getRefundable()
    {
        return $this->refundable;
    }

    /**
     * @param bool|null $refundable
     */
    public function setRefundable($refundable)
    {
        $this->refundable = $refundable;
    }

    /**
     * Supported since version 1.2
     * @return bool|null
     */
    public function getPartiallyRefundable()
    {
        return $this->partiallyRefundable;
    }

    /**
     * @param bool|null $partiallyRefundable
     */
    public function setPartiallyRefundable($partiallyRefundable)
    {
        $this->partiallyRefundable = $partiallyRefundable;
    }
}
