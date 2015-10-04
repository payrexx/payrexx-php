<?php
/**
 * The invoice request model
 * @author    Ueli Kramer <ueli.kramer@payrexx.com>
 * @copyright 2015 Payrexx AG
 * @since     v2.0
 */
namespace Payrexx\Models\Request;

/**
 * Class Invoice
 * @package Payrexx\Models\Request
 */
class Invoice extends \Payrexx\Models\Request\Base
{
    // page settings
    protected $titles = array();
    protected $descriptions = array();
    protected $purposes = array();
    protected $amount = 0;
    protected $currency = '';
    protected $psp = 0;
    protected $displayTerms = false;
    // for subscription (only possible if psp = stripe || psp = paymill)
    protected $useSubscription = false;
    protected $subscriptionInterval = null;
    protected $subscriptionPeriod = null;
    protected $subscriptionPeriodMinAmount = null;
    protected $subscriptionCancellationInterval = null;
    // redirection after payment
    protected $successRedirectUrl = '';
    protected $failedRedirectUrl = '';
    // setting for the mail (successful payment)
    protected $emailSenderAddress = '';
    protected $emailSenderName = '';
    protected $additionalEmailRecipients = array();
    protected $additionalEmailContents = array();

    // form elements
    protected $formElements = array();

    /**
     * @return array
     */
    public function getTitles()
    {
        return $this->titles;
    }

    /**
     * @param string $title
     * @param string $lang the ISO of the lang , possible values: DE, EN, FR, IT
     */
    public function addTitle($title, $lang = \Payrexx\Models\Request\Base::LANG_EN)
    {
        $this->titles[$lang] = $title;
    }

    /**
     * @return array
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     * @param string $description
     * @param string $lang the ISO of the lang , possible values: DE, EN, FR, IT
     */
    public function addDescription($description, $lang = \Payrexx\Models\Request\Base::LANG_EN)
    {
        $this->descriptions[$lang] = $description;
    }

    /**
     * @return array
     */
    public function getPurposes()
    {
        return $this->purposes;
    }

    /**
     * @param string $purpose
     * @param string $lang the ISO of the lang , possible values: DE, EN, FR, IT
     */
    public function addPurpose($purpose, $lang = \Payrexx\Models\Request\Base::LANG_EN)
    {
        $this->purposes[$lang] = $purpose;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return number_format($this->amount / 100, 2);
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = number_format($amount, 2) * 100;
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
     * @return int
     */
    public function getPsp()
    {
        return $this->psp;
    }

    /**
     * @param int $psp
     */
    public function setPsp($psp)
    {
        $this->psp = $psp;
    }

    /**
     * @return boolean
     */
    public function getDisplayTerms()
    {
        return $this->displayTerms;
    }

    /**
     * @param boolean $displayTerms
     */
    public function setDisplayTerms($displayTerms)
    {
        $this->displayTerms = $displayTerms;
    }

    /**
     * @return boolean
     */
    public function getUseSubscription()
    {
        return $this->useSubscription;
    }

    /**
     * @param boolean $useSubscription
     */
    public function setUseSubscription($useSubscription)
    {
        $this->useSubscription = $useSubscription;
    }

    /**
     * @return null
     */
    public function getSubscriptionPeriodMinAmount()
    {
        return $this->subscriptionPeriodMinAmount;
    }

    /**
     * @param null $subscriptionPeriodMinAmount
     */
    public function setSubscriptionPeriodMinAmount($subscriptionPeriodMinAmount)
    {
        $this->subscriptionPeriodMinAmount = $subscriptionPeriodMinAmount;
    }

    /**
     * @return null
     */
    public function getSubscriptionInterval()
    {
        return $this->subscriptionInterval;
    }

    /**
     * Set the payment interval, this should be a string formatted like ISO 8601
     * (PnYnMnDTnHnMnS)
     *
     * Use case:
     * If you set this value to P6M the customer will pay every 6 months on this
     * subscription.
     *
     * It is possible to define XY years / months or days.
     *
     * For further information see http://php.net/manual/en/class.dateinterval.php
     *
     * @param string $subscriptionInterval
     */
    public function setSubscriptionInterval($subscriptionInterval)
    {
        $this->subscriptionInterval = $subscriptionInterval;
    }

    /**
     * @return string
     */
    public function getSubscriptionPeriod()
    {
        return $this->subscriptionPeriod;
    }

    /**
     * Set the subscription period after how many years / months or days the subscription
     * will get renewed.
     *
     * This should be a string formatted like ISO 8601 (PnYnMnDTnHnMnS)
     *
     * Use case:
     * If you set this value to P1Y the subscription will be renewed every year.
     *
     * It is possible to define XY years / months or days.
     *
     * For further information see http://php.net/manual/en/class.dateinterval.php
     *
     * @param string $subscriptionPeriod
     */
    public function setSubscriptionPeriod($subscriptionPeriod)
    {
        $this->subscriptionPeriod = $subscriptionPeriod;
    }

    /**
     * @return string
     */
    public function getSubscriptionCancellationInterval()
    {
        return $this->subscriptionCancellationInterval;
    }

    /**
     * @param null $subscriptionCancellationInterval
     */
    public function setSubscriptionCancellationInterval($subscriptionCancellationInterval)
    {
        $this->subscriptionCancellationInterval = $subscriptionCancellationInterval;
    }

    /**
     * @return string
     */
    public function getSuccessRedirectUrl()
    {
        return $this->successRedirectUrl;
    }

    /**
     * @param string $successRedirectUrl
     */
    public function setSuccessRedirectUrl($successRedirectUrl)
    {
        $this->successRedirectUrl = $successRedirectUrl;
    }

    /**
     * @return string
     */
    public function getFailedRedirectUrl()
    {
        return $this->failedRedirectUrl;
    }

    /**
     * @param string $failedRedirectUrl
     */
    public function setFailedRedirectUrl($failedRedirectUrl)
    {
        $this->failedRedirectUrl = $failedRedirectUrl;
    }

    /**
     * @return string
     */
    public function getEmailSenderAddress()
    {
        return $this->emailSenderAddress;
    }

    /**
     * @param string $emailSenderAddress
     */
    public function setEmailSenderAddress($emailSenderAddress)
    {
        $this->emailSenderAddress = $emailSenderAddress;
    }

    /**
     * @return string
     */
    public function getEmailSenderName()
    {
        return $this->emailSenderName;
    }

    /**
     * @param string $emailSenderName
     */
    public function setEmailSenderName($emailSenderName)
    {
        $this->emailSenderName = $emailSenderName;
    }

    /**
     * @return array
     */
    public function getAdditionalEmailRecipients()
    {
        return $this->additionalEmailRecipients;
    }

    /**
     * @param array $additionalEmailRecipients
     */
    public function setAdditionalEmailRecipients($additionalEmailRecipients)
    {
        $this->additionalEmailRecipients = $additionalEmailRecipients;
    }

    /**
     * @return array
     */
    public function getAdditionalEmailContents()
    {
        return $this->additionalEmailContents;
    }

    /**
     * @param string $additionalEmailContent
     * @param string $lang the ISO of the lang , possible values: DE, EN, FR, IT
     */
    public function setAdditionalEmailContent($additionalEmailContent, $lang = \Payrexx\Models\Request\Base::LANG_EN)
    {
        $this->additionalEmailContents[$lang] = $additionalEmailContent;
    }

    /**
     * @return \Payrexx\Models\Request\FormElement[]
     */
    public function getFormElements()
    {
        return $this->formElements;
    }

    /**
     * @param \Payrexx\Models\Request\FormElement $formElement
     */
    public function addFormElement(\Payrexx\Models\Request\FormElement $formElement)
    {
        $this->formElements[] = $formElement;
    }

    /**
     * @param \Payrexx\Models\Request\FormElement $formElement
     */
    public function removeFormElement(\Payrexx\Models\Request\FormElement $formElement)
    {
        if (in_array($formElement, $this->formElements)) {
            $index = array_search($formElement, $this->formElements);
            unset($this->formElements[$index]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\Invoice();
    }
}
