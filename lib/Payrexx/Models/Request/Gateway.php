<?php

/**
 * The Gateway request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.3.0
 */

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;
use Payrexx\Models\Response\Gateway as ResponseGateway;

/**
 * Gateway request class
 *
 * @package Payrexx\Models\Request
 */
class Gateway extends Base
{

    /**
     * mandatory
     *
     * @var int
     */
    protected $amount;

    /**
     * optional
     *
     * @var float|null
     */
    protected $vatRate;

    /**
     * optional
     *
     * @var string|null
     */
    protected $sku;

    /**
     * mandatory
     *
     * @var string
     */
    protected $currency;

    /**
     * optional
     *
     * @var string|array
     */
    protected $purpose;

    /**
     * optional
     *
     * @var array
     */
    protected $psp;

    /**
     * optional
     *
     * @var array
     */
    protected $pm;

    /**
     * optional
     *
     * @var bool
     */
    protected $preAuthorization = false;

    /**
     * optional
     *
     * @var bool
     */
    protected $reservation = false;

    /**
     * optional
     *
     * @var string
     */
    protected $referenceId;

    /**
     * optional
     *
     * @var array
     */
    protected $fields;

    /**
     * optional
     *
     * @var string
     */
    protected $concardisOrderId;

    /**
     * mandatory
     *
     * @var string
     */
    protected $successRedirectUrl;

    /**
     * mandatory
     *
     * @var string
     */
    protected $failedRedirectUrl;

    /**
     * mandatory
     *
     * @var string
     */
    protected $cancelRedirectUrl;

    /**
     * optional
     *
     * @var bool
     */
    protected $skipResultPage;

    /**
     * optional
     *
     * @var bool
     */
    protected $chargeOnAuthorization;


    /**
     * optional
     *
     * @var bool
     */
    protected $reserveOnAuthorization;

    /**
     * optional: Only for Clearhaus transactions.
     *
     * @var string
     */
    protected $customerStatementDescriptor;

    /**
     * optional: Gateway validity in minutes.
     *
     * @var int
     */
    protected $validity;

    /**
     * optional
     *
     * @var bool
     */
    protected $subscriptionState = false;

    /**
     * optional
     *
     * @var string
     */
    protected $subscriptionInterval = '';

    /**
     * optional
     *
     * @var string
     */
    protected $subscriptionPeriod = '';

    /**
     * optional
     *
     * @var string
     */
    protected $subscriptionPeriodMinAmount = '';

    /**
     * optional
     *
     * @var string
     */
    protected $subscriptionCancellationInterval = '';

    /**
     * optional
     *
     * @var array $buttonText
     */
    protected $buttonText;

    /**
     * optional
     *
     * @var string|null $lookAndFeelProfile
     */
    protected $lookAndFeelProfile;

    /**
     * optional
     *
     * @var array $successMessage
     */
    protected $successMessage;

    /**
     * optional
     *
     * @var array $basket
     */
    protected $basket;

    /**
     * optional
     *
     * @var string $qrCodeSessionId
     */
    protected $qrCodeSessionId;

    /**
     * optional
     *
     * @var string $returnApp
     */
    protected $returnApp;

    /**
     * optional
     *
     * @var bool $spotlightStatus
     */
    protected $spotlightStatus;

    /**
     * optional
     *
     * @var string $spotlightOrderDetailsUrl
     */
    protected $spotlightOrderDetailsUrl;

    /**
     * @var string $language
     */
    protected $language = '';

    /**
     * @var bool $isPriceExclusiveVat
     */
    protected $isPriceExclusiveVat = false;

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the payment amount.
     * Make sure the amount is multiplied by 100!
     *
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return float|null
     */
    public function getVatRate()
    {
        return $this->vatRate;
    }

    /**
     * @param float|null $vatRate
     */
    public function setVatRate($vatRate)
    {
        $this->vatRate = $vatRate;
    }

    /**
     * @return string|null
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set the corresponding payment currency for the amount (use ISO codes).
     *
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string|array
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * Set the purpose of this gateway. Will be displayed as transaction purpose in merchant backend.
     * Use language ID as array key. Use key 0 as default purpose. Will be used for each activated frontend language.
     *
     * @param string|array $purpose
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;
    }

    /**
     * @return array
     */
    public function getPsp()
    {
        return $this->psp;
    }

    /**
     * Set payment service providers to use.
     * A list of available payment service providers
     * can be found here: https://docs.payrexx.com/developer/general-info/payment-provider
     * All available psp will be used on payment page if none have been defined.
     *
     * @param array $psp
     */
    public function setPsp($psp)
    {
        $this->psp = $psp;
    }

    /**
     * @return array
     */
    public function getPm()
    {
        return $this->pm;
    }

    /**
     * Set payment mean to use.
     *
     * @param array $pm
     */
    public function setPm($pm)
    {
        $this->pm = $pm;
    }

    /**
     * @return bool
     */
    public function getPreAuthorization()
    {
        return $this->preAuthorization;
    }

    /**
     *  Whether charge payment manually at a later date (type authorization).
     *
     * @param bool $preAuthorization
     */
    public function setPreAuthorization($preAuthorization)
    {
        $this->preAuthorization = $preAuthorization;
    }

    /**
     * @return bool
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     *  Whether charge payment manually at a later date (type reservation).
     *
     * @param bool $reservation
     */
    public function setReservation($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * @return string
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * Set the reference id which you will get in Webhook.
     * This reference id won't be shown to customers.
     *
     * @param string $referenceId
     */
    public function setReferenceId($referenceId)
    {
        $this->referenceId = $referenceId;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Add a new field of the payment page
     *
     * @param string $type Type of field
     *                     Available types: title, forename, surname, company, street,
     *                     postcode, place, country, phone, email, date_of_birth,
     *                     custom_field_1, custom_field_2, custom_field_3, custom_field_4, custom_field_5
     * @param string|null $value Value of field
     *                            For field of type "title" use value "mister" or "miss"
     *                            For field of type "country" pass the 2 letter ISO code
     * @param array|string $name Name of the field (only available for fields of type "custom_field_1-5"
     */
    public function addField($type, $value, $name = [])
    {
        $this->fields[$type] = [
            'value' => $value,
            'name' => $name,
        ];
    }

    /**
     * @return  string
     */
    public function getConcardisOrderId()
    {
        return $this->concardisOrderId;
    }

    /**
     * Set a custom order ID for the Concardis PSPs
     *
     * @param string $concardisOrderId
     */
    public function setConcardisOrderId($concardisOrderId)
    {
        $this->concardisOrderId = $concardisOrderId;
    }

    /**
     * @return string
     */
    public function getSuccessRedirectUrl()
    {
        return $this->successRedirectUrl;
    }

    /**
     * Set the URL to redirect to after a successful payment.
     *
     * @param string $successRedirectUrl
     */
    public function setSuccessRedirectUrl($successRedirectUrl)
    {
        $this->successRedirectUrl = $successRedirectUrl;
    }

    /**
     * @return  string
     */
    public function getFailedRedirectUrl()
    {
        return $this->failedRedirectUrl;
    }

    /**
     * Set the url to redirect to after a failed payment.
     *
     * @param string $failedRedirectUrl
     */
    public function setFailedRedirectUrl($failedRedirectUrl)
    {
        $this->failedRedirectUrl = $failedRedirectUrl;
    }

    /**
     * @return string
     */
    public function getCancelRedirectUrl()
    {
        return $this->cancelRedirectUrl;
    }

    /**
     * Set the url to redirect to after cancelled payment.
     *
     * @param string $cancelRedirectUrl
     */
    public function setCancelRedirectUrl($cancelRedirectUrl)
    {
        $this->cancelRedirectUrl = $cancelRedirectUrl;
    }

    /**
     * @return bool
     */
    public function isSkipResultPage()
    {
        return $this->skipResultPage;
    }

    /**
     * @param bool $skipResultPage
     */
    public function setSkipResultPage($skipResultPage)
    {
        $this->skipResultPage = $skipResultPage;
    }

    /**
     * @return bool
     */
    public function isChargeOnAuthorization()
    {
        return $this->chargeOnAuthorization;
    }

    /**
     * @param bool $chargeOnAuthorization
     */
    public function setChargeOnAuthorization($chargeOnAuthorization)
    {
        $this->chargeOnAuthorization = $chargeOnAuthorization;
    }

    /**
     * @return bool
     */
    public function isReserveOnAuthorization()
    {
        return $this->reserveOnAuthorization;
    }

    /**
     * @param bool $reserveOnAuthorization
     */
    public function setReserveOnAuthorization(bool $reserveOnAuthorization): void
    {
        $this->reserveOnAuthorization = $reserveOnAuthorization;
    }


    /**
     * @return string
     */
    public function getCustomerStatementDescriptor()
    {
        return $this->customerStatementDescriptor;
    }

    /**
     * @param string $customerStatementDescriptor
     */
    public function setCustomerStatementDescriptor(string $customerStatementDescriptor): void
    {
        $this->customerStatementDescriptor = $customerStatementDescriptor;
    }

    /**
     * @return int
     */
    public function getValidity()
    {
        return $this->validity;
    }

    /**
     * @param int $validity
     */
    public function setValidity($validity)
    {
        $this->validity = $validity;
    }


    /**
     * @return bool
     */
    public function isSubscriptionState()
    {
        return $this->subscriptionState;
    }

    /**
     * Set whether the payment should be a recurring payment (subscription)
     * If you set to TRUE, you should provide a
     * subscription interval, period and cancellation interval
     * Note: Subscription and pre-authorization can not be combined.
     *
     * @param bool $subscriptionState
     */
    public function setSubscriptionState($subscriptionState)
    {
        $this->subscriptionState = $subscriptionState;
    }

    /**
     * @return string
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
     * Set the cancellation interval, it means you can define how many days or months
     * the client has to cancel the subscription before the end of subscription period.
     *
     * This should be a string formatted like ISO 8601 (PnYnMnDTnHnMnS)
     *
     * Use case:
     * If you set this value to P1M the subscription has to be cancelled one month
     * before end of subscription period.
     *
     * It is possible to define XY months or days. Years are not supported here.
     *
     * For further information see http://php.net/manual/en/class.dateinterval.php
     *
     * @param string $subscriptionCancellationInterval
     */
    public function setSubscriptionCancellationInterval($subscriptionCancellationInterval)
    {
        $this->subscriptionCancellationInterval = $subscriptionCancellationInterval;
    }

    /**
     * @return array
     */
    public function getButtonText()
    {
        return $this->buttonText;
    }

    /**
     * Use language ID as array key. Use key 0 as default purpose. Will be used for each activated frontend language.
     *
     * @param array $buttonText
     */
    public function setButtonText($buttonText)
    {
        $this->buttonText = $buttonText;
    }

    /**
     * @return string
     */
    public function getLookAndFeelProfile()
    {
        return $this->lookAndFeelProfile;
    }

    /**
     * @param string $lookAndFeelProfile
     */
    public function setLookAndFeelProfile($lookAndFeelProfile)
    {
        $this->lookAndFeelProfile = $lookAndFeelProfile;
    }

    /**
     * @return array
     */
    public function getSuccessMessage()
    {
        return $this->successMessage;
    }

    /**
     * Use language ID as array key. Use key 0 as default purpose. Will be used for each activated frontend language.
     *
     * @param array $successMessage
     */
    public function setSuccessMessage($successMessage)
    {
        $this->successMessage = $successMessage;
    }

    /**
     * @return array
     */
    public function getBasket()
    {
        return $this->basket;
    }

    /**
     * It is a multidimensional array to parse each product as an array
     *
     * @param array $basket Available product values:
     *                      name => Can be an array with the key as language ID
     *                      description => Can be an array with the key as language ID
     *                      quantity => quantity of the product
     *                      amount => Product amount
     */
    public function setBasket($basket)
    {
        $this->basket = $basket;
    }


    public function getQrCodeSessionId()
    {
        return $this->qrCodeSessionId;
    }

    /**
     * @param string $qrCodeSessionId
     */
    public function setQrCodeSessionId(string $qrCodeSessionId)
    {
        $this->qrCodeSessionId = $qrCodeSessionId;
    }

    /**
     * @return string|null
     */
    public function getReturnApp()
    {
        return $this->returnApp;
    }

    /**
     * @param string $returnApp
     */
    public function setReturnApp($returnApp)
    {
        $this->returnApp = $returnApp;
    }

    /**
     * @return bool|null
     */
    public function getSpotlightStatus()
    {
        return $this->spotlightStatus;
    }

    /**
     * @param bool $spotlightStatus
     */
    public function setSpotlightStatus($spotlightStatus)
    {
        $this->spotlightStatus = $spotlightStatus;
    }

    /**
     * @return string|null
     */
    public function getSpotlightOrderDetailsUrl()
    {
        return $this->spotlightOrderDetailsUrl;
    }

    /**
     * @param string $spotlightOrderDetailsUrl
     */
    public function setSpotlightOrderDetailsUrl($spotlightOrderDetailsUrl)
    {
        $this->spotlightOrderDetailsUrl = $spotlightOrderDetailsUrl;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @retrun string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @var bool $isPriceExclusiveVat
     */
    public function setIsPriceExclusiveVat($isPriceExclusiveVat)
    {
        $this->isPriceExclusiveVat = $isPriceExclusiveVat;
    }

    /**
     * @return bool
     */
    public function getIsPriceExclusiveVat()
    {
        return $this->isPriceExclusiveVat;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel(): ResponseGateway
    {
        return new ResponseGateway();
    }
}
