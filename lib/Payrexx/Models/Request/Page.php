<?php

/**
 * The Page request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.0
 */

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;
use Payrexx\Models\Response\Page as ResponsePage;

/**
 * Class Page
 *
 * @package Payrexx\Models\Request
 */
class Page extends Base
{
    public const CURRENCY_CHF = 'CHF';
    public const CURRENCY_EUR = 'EUR';
    public const CURRENCY_USD = 'USD';
    public const CURRENCY_GBP = 'GBP';

    // mandatory
    protected string $title = '';
    protected string $description = '';
    protected array $psp = [];

    // optional
    protected ?string $name = '';
    protected string $purpose = '';
    protected int $amount = 0;
    protected string $currency = '';

    protected bool $subscriptionState = false;
    protected string $subscriptionInterval = '';
    protected string $subscriptionPeriod = '';
    protected string $subscriptionPeriodMinAmount = '';
    protected string $subscriptionCancellationInterval = '';

    protected bool $preAuthorization = false;
    protected bool $reservation = false;

    protected array $fields = [];

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the description text which will be displayed
     * above the payment form
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPsp(): array
    {
        return $this->psp;
    }

    /**
     * Set the payment service provider to use, a
     * list of available payment service providers (short psp)
     * can be found here: https://docs.payrexx.com/developer/general-info/payment-provider
     */
    public function setPsp(array|int $psp): void
    {
        if (is_int($psp)) {
           $this->psp = [$psp];
        } else {
            $this->psp = $psp;
        }
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the internal name of the form which will be generated.
     * This name will only be shown to administrator of the Payrexx site.
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getPurpose(): string
    {
        return $this->purpose;
    }

    /**
     * Set the payment purpose which will be inserted automatically.
     * This field won't be editable anymore for the client if you predefine it.
     */
    public function setPurpose(string $purpose): void
    {
        $this->purpose = $purpose;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Set the payment amount. Make sure the amount is multiplied
     * with 100!
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Set the corresponding payment currency for the amount.
     * You can use the ISO Code.
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function isSubscriptionState(): bool
    {
        return $this->subscriptionState;
    }

    /**
     * Set whether the payment should be a recurring payment (subscription)
     * If you set to TRUE, you should provide a
     * subscription interval, period and cancellation interval
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

    public function getPreAuthorization(): bool
    {
        return $this->preAuthorization;
    }

    /** Whether charge payment manually at a later date (type authorization). */
    public function setPreAuthorization(bool $preAuthorization): void
    {
        $this->preAuthorization = $preAuthorization;
    }

    public function getReservation(): bool
    {
        return $this->reservation;
    }

    /** Whether charge payment manually at a later date (type reservation). */
    public function setReservation(bool $reservation): void
    {
        $this->reservation = $reservation;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * Define a new field of the payment page
     *
     * Reference link: https://developers.payrexx.com/reference/create-a-gateway -> fields
     */
    public function addField(string $type, bool $mandatory, ?string $defaultValue = '', string $name = ''): void
    {
        $this->fields[$type] = [
            'name' => $name,
            'mandatory' => $mandatory,
            'defaultValue' => $defaultValue,
        ];
    }

    public function getResponseModel(): ResponsePage
    {
        return new ResponsePage();
    }
}
