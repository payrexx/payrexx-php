<?php

/**
 * The AuthToken response model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.1.0
 */

namespace Payrexx\Models\Response;

use DateTime;

/**
 * Class AuthToken
 *
 * @package Payrexx\Models\Response
 */
class AuthToken extends \Payrexx\Models\Request\Invoice
{
    protected string $authToken = '';
    protected ?DateTime $authTokenExpirationDate = null;
    protected string $link = '';

    public function getAuthToken(): string
    {
        return $this->authToken;
    }

    public function setAuthToken(string $authToken): void
    {
        $this->authToken = $authToken;
    }

    public function getAuthTokenExpirationDate(): string
    {
        return $this->authTokenExpirationDate;
    }

    public function setAuthTokenExpirationDate(?DateTime $authTokenExpirationDate): void
    {
        $this->authTokenExpirationDate = $authTokenExpirationDate;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function getSubscriptionPeriodMinAmount(): string
    {
        return $this->subscriptionPeriodMinAmount;
    }

    public function setSubscriptionPeriodMinAmount(string $subscriptionPeriodMinAmount): void
    {
        $this->subscriptionPeriodMinAmount = $subscriptionPeriodMinAmount;
    }
}
