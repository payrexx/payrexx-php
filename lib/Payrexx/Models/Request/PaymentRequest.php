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
class PaymentRequest extends \Payrexx\Models\Request\Base
{
    const CURRENCY_CHF = 'CHF';
    const CURRENCY_EUR = 'EUR';
    const CURRENCY_USD = 'USD';
    const CURRENCY_GBP = 'GBP';
    
    protected $title;
    protected $number;
    protected $amount;
    protected $currency;
    protected $referenceId;
    protected $formId;

    protected $email;
    protected $contactTitle;
    protected $contactFirstName;
    protected $contactLastName;
    protected $contactCompany;
    protected $contactStreet;
    protected $contactZip;
    protected $contactPlace;
    protected $contactCountryISO;
    protected $contactPhone;
    protected $contactDateOfBirth;
    protected $contactCustomField1;
    protected $contactCustomField2;
    protected $contactCustomField3;
    
    
    /**
     * {@inheritdoc}
     */
    public function toArray($method)
    {
        return array(
            'model' => 'PaymentRequest',
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'number' => $this->getNumber(),
            'amount' => $this->getAmount() * 100,
            'currency' => $this->getCurrency(),
            'referenceId' => $this->getReferenceId(),
            'formId' => $this->getFormId(),
            'contactEmail' => $this->getEmail(),
            'contactTitle' => $this->getContactTitle(),
            'contactFirstName' => $this->getContactFirstName(),
            'contactLastName' => $this->getContactLastName(),
            'contactCompany' => $this->getContactCompany(),
            'contactStreet' => $this->getContactStreet(),
            'contactZip' => $this->getContactZip(),
            'contactPlace' => $this->getContactPlace(),
            'contactCountryISO' => $this->getContactCountryISO(),
            'contactPhone' => $this->getContactPhone(),
            'contactDateOfBirth' => $this->getContactDateOfBirth(),
            'contactCustomField1' => $this->getContactCustomField1(),
            'contactCustomField2' => $this->getContactCustomField2(),
            'contactCustomField3' => $this->getContactCustomField3(),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\PaymentRequest();
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getContactCompany()
    {
        return $this->contactCompany;
    }

    /**
     * @param mixed $contactCompany
     */
    public function setContactCompany($contactCompany)
    {
        $this->contactCompany = $contactCompany;
    }

    /**
     * @return mixed
     */
    public function getContactCountryISO()
    {
        return $this->contactCountryISO;
    }

    /**
     * @param mixed $contactCountryISO
     */
    public function setContactCountryISO($contactCountryISO)
    {
        $this->contactCountryISO = $contactCountryISO;
    }

    /**
     * @return mixed
     */
    public function getContactCustomField1()
    {
        return $this->contactCustomField1;
    }

    /**
     * @param mixed $contactCustomField1
     */
    public function setContactCustomField1($contactCustomField1)
    {
        $this->contactCustomField1 = $contactCustomField1;
    }

    /**
     * @return mixed
     */
    public function getContactCustomField2()
    {
        return $this->contactCustomField2;
    }

    /**
     * @param mixed $contactCustomField2
     */
    public function setContactCustomField2($contactCustomField2)
    {
        $this->contactCustomField2 = $contactCustomField2;
    }

    /**
     * @return mixed
     */
    public function getContactCustomField3()
    {
        return $this->contactCustomField3;
    }

    /**
     * @param mixed $contactCustomField3
     */
    public function setContactCustomField3($contactCustomField3)
    {
        $this->contactCustomField3 = $contactCustomField3;
    }

    /**
     * @return mixed
     */
    public function getContactDateOfBirth()
    {
        return $this->contactDateOfBirth;
    }

    /**
     * @param mixed $contactDateOfBirth
     */
    public function setContactDateOfBirth($contactDateOfBirth)
    {
        $this->contactDateOfBirth = $contactDateOfBirth;
    }

    /**
     * @return mixed
     */
    public function getContactFirstName()
    {
        return $this->contactFirstName;
    }

    /**
     * @param mixed $contactFirstName
     */
    public function setContactFirstName($contactFirstName)
    {
        $this->contactFirstName = $contactFirstName;
    }

    /**
     * @return mixed
     */
    public function getContactLastName()
    {
        return $this->contactLastName;
    }

    /**
     * @param mixed $contactLastName
     */
    public function setContactLastName($contactLastName)
    {
        $this->contactLastName = $contactLastName;
    }

    /**
     * @return mixed
     */
    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    /**
     * @param mixed $contactPhone
     */
    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = $contactPhone;
    }

    /**
     * @return mixed
     */
    public function getContactPlace()
    {
        return $this->contactPlace;
    }

    /**
     * @param mixed $contactPlace
     */
    public function setContactPlace($contactPlace)
    {
        $this->contactPlace = $contactPlace;
    }

    /**
     * @return mixed
     */
    public function getContactStreet()
    {
        return $this->contactStreet;
    }

    /**
     * @param mixed $contactStreet
     */
    public function setContactStreet($contactStreet)
    {
        $this->contactStreet = $contactStreet;
    }

    /**
     * @return mixed
     */
    public function getContactZip()
    {
        return $this->contactZip;
    }

    /**
     * @param mixed $contactZip
     */
    public function setContactZip($contactZip)
    {
        $this->contactZip = $contactZip;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * @param mixed $formId
     */
    public function setFormId($formId)
    {
        $this->formId = $formId;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * @param mixed $referenceId
     */
    public function setReferenceId($referenceId)
    {
        $this->referenceId = $referenceId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContactTitle()
    {
        return $this->contactTitle;
    }

    /**
     * @param mixed $contactTitle
     */
    public function setContactTitle($contactTitle)
    {
        $this->contactTitle = $contactTitle;
    }    
    
}
