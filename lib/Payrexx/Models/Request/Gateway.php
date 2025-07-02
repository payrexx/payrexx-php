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
    /** mandatory */
    protected int $amount;

    /** optional */
    protected ?float $vatRate;

    /** optional */
    protected ?string $sku;

    /** mandatory */
    protected string $currency;

    /** optional */
    protected array $purpose;

    /** optional */
    protected array $psp;

    /** optional */
    protected array $pm;

    /** optional */
    protected bool $preAuthorization = false;

    /** optional */
    protected bool $reservation = false;

    /** optional */
    protected string $referenceId;

    /** optional */
    protected array $fields;

    /** optional */
    protected string $concardisOrderId;

    /** mandatory */
    protected string $successRedirectUrl;

    /** mandatory */
    protected string $failedRedirectUrl;

    /** mandatory */
    protected string $cancelRedirectUrl;

    /** optional */
    protected bool $skipResultPage;

    /** optional */
    protected bool $chargeOnAuthorization;

    /** optional: Only for Clearhaus transactions. */
    protected string $customerStatementDescriptor;

    /** optional: Gateway validity in minutes. */
    protected int $validity;

    /** optional */
    protected bool $subscriptionState = false;

    /** optional */
    protected string $subscriptionInterval = '';

    /** optional */
    protected string $subscriptionPeriod = '';

    /** optional */
    protected string $subscriptionPeriodMinAmount = '';

    /** optional */
    protected string $subscriptionCancellationInterval = '';

    /** optional */
    protected array $buttonText;

    /** optional */
    protected ?string $lookAndFeelProfile;

    /** optional */
    protected array $successMessage;

    /** optional */
    protected array $basket;

    /** optional */
    protected string $qrCodeSessionId;

    /** optional */
    protected string $returnApp;

    /** optional */
    protected bool $spotlightStatus;

    /** optional */
    protected string $spotlightOrderDetailsUrl;

    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Set the payment amount.
     * Make sure the amount is multiplied by 100!
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getVatRate(): ?float
    {
        return $this->vatRate;
    }

    public function setVatRate(?float $vatRate): void
    {
        $this->vatRate = $vatRate;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(?string $sku): void
    {
        $this->sku = $sku;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Set the corresponding payment currency for the amount (use ISO codes).
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getPurpose(): array
    {
        return $this->purpose;
    }

    /**
     * Set the purpose of this gateway. Will be displayed as transaction purpose in merchant backend.
     * Use language ID as array key. Use key 0 as default purpose. Will be used for each activated frontend language.
     */
    public function setPurpose(array $purpose): void
    {
        $this->purpose = $purpose;
    }

    public function getPsp(): array
    {
        return $this->psp;
    }

    /**
     * Set payment service providers to use.
     * A list of available payment service providers
     * can be found here: https://docs.payrexx.com/developer/general-info/payment-provider
     * All available psp will be used on payment page if none have been defined.
     */
    public function setPsp(array $psp): void
    {
        $this->psp = $psp;
    }

    public function getPm(): array
    {
        return $this->pm;
    }

    /**
     * Set payment mean to use.
     */
    public function setPm(array $pm): void
    {
        $this->pm = $pm;
    }

    public function getPreAuthorization(): bool
    {
        return $this->preAuthorization;
    }

    /**
     *  Whether charge payment manually at a later date (type authorization).
     */
    public function setPreAuthorization(bool $preAuthorization): void
    {
        $this->preAuthorization = $preAuthorization;
    }

    public function getReservation(): bool
    {
        return $this->reservation;
    }

    /**
     *  Whether charge payment manually at a later date (type reservation).
     */
    public function setReservation(bool $reservation): void
    {
        $this->reservation = $reservation;
    }

    public function getReferenceId(): string
    {
        return $this->referenceId;
    }

    /**
     * Set the reference id which you will get in Webhook.
     * This reference id won't be shown to customers.
     */
    public function setReferenceId(string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * Add a new field of the payment page
     */
    public function addField(string $type, string $value, array|string $name = []): void
    {
        $this->fields[$type] = [
            'value' => $value,
            'name' => $name,
        ];
    }

    public function getConcardisOrderId(): string
    {
        return $this->concardisOrderId;
    }

    /**
     * Set a custom order ID for the Concardis PSPs
     */
    public function setConcardisOrderId(string $concardisOrderId): void
    {
        $this->concardisOrderId = $concardisOrderId;
    }

    public function getSuccessRedirectUrl(): string
    {
        return $this->successRedirectUrl;
    }

    /**
     * Set the URL to redirect to after a successful payment.
     */
    public function setSuccessRedirectUrl(string $successRedirectUrl): void
    {
        $this->successRedirectUrl = $successRedirectUrl;
    }

    public function getFailedRedirectUrl(): string
    {
        return $this->failedRedirectUrl;
    }

    /**
     * Set the url to redirect to after a failed payment.
     */
    public function setFailedRedirectUrl(string $failedRedirectUrl): void
    {
        $this->failedRedirectUrl = $failedRedirectUrl;
    }

    public function getCancelRedirectUrl(): string
    {
        return $this->cancelRedirectUrl;
    }

    /**
     * Set the url to redirect to after cancelled payment.
     */
    public function setCancelRedirectUrl(string $cancelRedirectUrl): void
    {
        $this->cancelRedirectUrl = $cancelRedirectUrl;
    }

    public function isSkipResultPage(): bool
    {
        return $this->skipResultPage;
    }

    public function setSkipResultPage(bool $skipResultPage): void
    {
        $this->skipResultPage = $skipResultPage;
    }

    public function isChargeOnAuthorization(): bool
    {
        return $this->chargeOnAuthorization;
    }

    public function setChargeOnAuthorization(bool $chargeOnAuthorization): void
    {
        $this->chargeOnAuthorization = $chargeOnAuthorization;
    }

    public function getCustomerStatementDescriptor(): string
    {
        return $this->customerStatementDescriptor;
    }

    public function setCustomerStatementDescriptor(string $customerStatementDescriptor): void
    {
        $this->customerStatementDescriptor = $customerStatementDescriptor;
    }

    public function getValidity(): int
    {
        return $this->validity;
    }

    /** Validity in minutes. */
    public function setValidity(int $validity): void
    {
        $this->validity = $validity;
    }

    public function isSubscriptionState(): bool
    {
        return $this->subscriptionState;
    }

    /**
     * Set whether the payment should be a recurring payment (subscription)
     * If you set to TRUE, you should provide a
     * subscription interval, period and cancellation interval
     * Note: Subscription and pre-authorization can not be combined.
     */
    public function setSubscriptionState(bool $subscriptionState): void
    {
        $this->subscriptionState = $subscriptionState;
    }

    public function getSubscriptionInterval(): string
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
     */
    public function setSubscriptionInterval(string $subscriptionInterval): void
    {
        $this->subscriptionInterval = $subscriptionInterval;
    }

    public function getSubscriptionPeriod(): string
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
     */
    public function setSubscriptionPeriod(string $subscriptionPeriod): void
    {
        $this->subscriptionPeriod = $subscriptionPeriod;
    }

    public function getSubscriptionCancellationInterval(): string
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
     */
    public function setSubscriptionCancellationInterval(string $subscriptionCancellationInterval): void
    {
        $this->subscriptionCancellationInterval = $subscriptionCancellationInterval;
    }

    public function getButtonText(): array
    {
        return $this->buttonText;
    }

    /**
     * Use language ID as array key. Use key 0 as default purpose. Will be used for each activated frontend language.
     */
    public function setButtonText(array $buttonText): void
    {
        $this->buttonText = $buttonText;
    }

    public function getLookAndFeelProfile(): ?string
    {
        return $this->lookAndFeelProfile;
    }

    public function setLookAndFeelProfile(?string $lookAndFeelProfile): void
    {
        $this->lookAndFeelProfile = $lookAndFeelProfile;
    }

    public function getSuccessMessage(): array
    {
        return $this->successMessage;
    }

    /**
     * Use language ID as array key. Use key 0 as default purpose. Will be used for each activated frontend language.
     */
    public function setSuccessMessage(array $successMessage): void
    {
        $this->successMessage = $successMessage;
    }

    public function getBasket(): array
    {
        return $this->basket;
    }

    /**
     * It is a multidimensional array to parse each product as an array
     */
    public function setBasket(array $basket): void
    {
        $this->basket = $basket;
    }

    public function getQrCodeSessionId(): string
    {
        return $this->qrCodeSessionId;
    }

    public function setQrCodeSessionId(string $qrCodeSessionId): void
    {
        $this->qrCodeSessionId = $qrCodeSessionId;
    }

    public function getReturnApp(): ?string
    {
        return $this->returnApp;
    }

    public function setReturnApp(string $returnApp): void
    {
        $this->returnApp = $returnApp;
    }

    public function getSpotlightStatus(): ?bool
    {
        return $this->spotlightStatus;
    }

    public function setSpotlightStatus(bool $spotlightStatus): void
    {
        $this->spotlightStatus = $spotlightStatus;
    }

    public function getSpotlightOrderDetailsUrl(): ?string
    {
        return $this->spotlightOrderDetailsUrl;
    }

    public function setSpotlightOrderDetailsUrl(string $spotlightOrderDetailsUrl): void
    {
        $this->spotlightOrderDetailsUrl = $spotlightOrderDetailsUrl;
    }

    public function getResponseModel(): ResponseGateway
    {
        return new ResponseGateway();
    }
}
