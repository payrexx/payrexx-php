<?php
/**
 * The payment request request model
 * @author    Ueli Kramer <ueli.kramer@comvation.com>
 * @copyright 2014 Payrexx AG
 * @since     v1.0
 */
namespace Payrexx\Models\Request;

/**
 * Class PaymentRequest
 * @package Payrexx\Models\Request
 */
class PaymentRequest extends \Payrexx\Models\Base
{
    const CURRENCY_CHF = 'CHF';
    const CURRENCY_EUR = 'EUR';
    const CURRENCY_USD = 'USD';
    const CURRENCY_GBP = 'GBP';

    protected $title = '';
    protected $number = '';
    protected $amount = 0;
    protected $currency = '';
    protected $referenceId = '';
    protected $formId = 0;
    protected $email = '';
    protected $contactTitle = '';
    protected $contactFirstName = '';
    protected $contactLastName = '';
    protected $contactCompany = '';
    protected $contactStreet = '';
    protected $contactZip = '';
    protected $contactPlace = '';
    protected $contactCountryISO = '';
    protected $contactPhone = '';
    protected $contactDateOfBirth = '';
    protected $contactCustomField1 = '';
    protected $contactCustomField2 = '';
    protected $contactCustomField3 = '';

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
    public function getContactCompany()
    {
        return $this->contactCompany;
    }

    /**
     * @param string $contactCompany
     */
    public function setContactCompany($contactCompany)
    {
        $this->contactCompany = $contactCompany;
    }

    /**
     * @return string
     */
    public function getContactCountryISO()
    {
        return $this->contactCountryISO;
    }

    /**
     * @param string $contactCountryISO
     */
    public function setContactCountryISO($contactCountryISO)
    {
        $this->contactCountryISO = $contactCountryISO;
    }

    /**
     * @return string
     */
    public function getContactCustomField1()
    {
        return $this->contactCustomField1;
    }

    /**
     * @param string $contactCustomField1
     */
    public function setContactCustomField1($contactCustomField1)
    {
        $this->contactCustomField1 = $contactCustomField1;
    }

    /**
     * @return string
     */
    public function getContactCustomField2()
    {
        return $this->contactCustomField2;
    }

    /**
     * @param string $contactCustomField2
     */
    public function setContactCustomField2($contactCustomField2)
    {
        $this->contactCustomField2 = $contactCustomField2;
    }

    /**
     * @return string
     */
    public function getContactCustomField3()
    {
        return $this->contactCustomField3;
    }

    /**
     * @param string $contactCustomField3
     */
    public function setContactCustomField3($contactCustomField3)
    {
        $this->contactCustomField3 = $contactCustomField3;
    }

    /**
     * @return string
     */
    public function getContactDateOfBirth()
    {
        return $this->contactDateOfBirth;
    }

    /**
     * @param string $contactDateOfBirth
     */
    public function setContactDateOfBirth($contactDateOfBirth)
    {
        $this->contactDateOfBirth = $contactDateOfBirth;
    }

    /**
     * @return string
     */
    public function getContactFirstName()
    {
        return $this->contactFirstName;
    }

    /**
     * @param string $contactFirstName
     */
    public function setContactFirstName($contactFirstName)
    {
        $this->contactFirstName = $contactFirstName;
    }

    /**
     * @return string
     */
    public function getContactLastName()
    {
        return $this->contactLastName;
    }

    /**
     * @param string $contactLastName
     */
    public function setContactLastName($contactLastName)
    {
        $this->contactLastName = $contactLastName;
    }

    /**
     * @return string
     */
    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    /**
     * @param string $contactPhone
     */
    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = $contactPhone;
    }

    /**
     * @return string
     */
    public function getContactPlace()
    {
        return $this->contactPlace;
    }

    /**
     * @param string $contactPlace
     */
    public function setContactPlace($contactPlace)
    {
        $this->contactPlace = $contactPlace;
    }

    /**
     * @return string
     */
    public function getContactStreet()
    {
        return $this->contactStreet;
    }

    /**
     * @param string $contactStreet
     */
    public function setContactStreet($contactStreet)
    {
        $this->contactStreet = $contactStreet;
    }

    /**
     * @return string
     */
    public function getContactTitle()
    {
        return $this->contactTitle;
    }

    /**
     * @param string $contactTitle
     */
    public function setContactTitle($contactTitle)
    {
        $this->contactTitle = $contactTitle;
    }

    /**
     * @return string
     */
    public function getContactZip()
    {
        return $this->contactZip;
    }

    /**
     * @param string $contactZip
     */
    public function setContactZip($contactZip)
    {
        $this->contactZip = $contactZip;
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
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * @param int $formId
     */
    public function setFormId($formId)
    {
        $this->formId = $formId;
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
     * @return string
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * @param string $referenceId
     */
    public function setReferenceId($referenceId)
    {
        $this->referenceId = $referenceId;
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
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\PaymentRequest();
    }
}
