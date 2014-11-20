<?php
/**
 * The form request model
 * @author    Ueli Kramer <ueli.kramer@comvation.com>
 * @copyright 2014 Payrexx AG
 * @since     v1.0
 */
namespace Payrexx\Models\Request;

/**
 * Class Form
 * @package Payrexx\Models\Request
 */
class Form extends \Payrexx\Models\Base
{
    const CURRENCY_CHF = 'CHF';
    const CURRENCY_EUR = 'EUR';
    const CURRENCY_USD = 'USD';
    const CURRENCY_GBP = 'GBP';

    protected $name = '';
    protected $title = '';
    protected $active = false;
    protected $number = '';
    protected $amount = 0;
    protected $currency = '';
    protected $description = '';
    protected $pspId = 0;
    protected $recurringPayment = false;
    protected $recurringPaymentInterval = '';
    protected $recurringPaymentPeriod = '';
    protected $recurringPaymentCancellationInterval = '';
    protected $fields = array();

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    public function addField($name, $defaultValue = '', $mandatory = false)
    {
        $this->fields[$name] = array();
        $this->fields[$name]['mandatory'] = $mandatory;
        $this->fields[$name]['defaultValue'] = $defaultValue;
    }

    /**
     * @param array $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function removeField($name)
    {
        if (!isset($this->fields[$name])) {
            return false;
        }
        unset($this->fields[$name]);
    }

    /**
     * @return boolean
     */
    public function isRecurringPayment()
    {
        return $this->recurringPayment;
    }

    /**
     * @param boolean $recurringPayment
     */
    public function setRecurringPayment($recurringPayment)
    {
        $this->recurringPayment = $recurringPayment;
    }

    /**
     * @return string
     */
    public function getRecurringPaymentCancellationInterval()
    {
        return $this->recurringPaymentCancellationInterval;
    }

    /**
     * @param string $recurringPaymentCancellationInterval
     */
    public function setRecurringPaymentCancellationInterval($recurringPaymentCancellationInterval)
    {
        $this->recurringPaymentCancellationInterval = $recurringPaymentCancellationInterval;
    }

    /**
     * @return string
     */
    public function getRecurringPaymentInterval()
    {
        return $this->recurringPaymentInterval;
    }

    /**
     * @param string $recurringPaymentInterval
     */
    public function setRecurringPaymentInterval($recurringPaymentInterval)
    {
        $this->recurringPaymentInterval = $recurringPaymentInterval;
    }

    /**
     * @return string
     */
    public function getRecurringPaymentPeriod()
    {
        return $this->recurringPaymentPeriod;
    }

    /**
     * @param string $recurringPaymentPeriod
     */
    public function setRecurringPaymentPeriod($recurringPaymentPeriod)
    {
        $this->recurringPaymentPeriod = $recurringPaymentPeriod;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\Form();
    }
}
