<?php

/**
 * PaymentMethod request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.7.5
 */

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;
use Payrexx\Models\Response\PaymentMethod as ResponsePaymentMethod;

/**
 * PaymentMethod class
 *
 * @package Payrexx\Models\Request
 */
class PaymentMethod extends Base
{
    protected string $filterCurrency;

    protected string $filterPaymentType;

    protected int $filterPsp;

    public function getFilterCurrency(): string
    {
        return $this->filterCurrency;
    }

    public function setFilterCurrency(string $filterCurrency): void
    {
        $this->filterCurrency = $filterCurrency;
    }

    public function getFilterPaymentType(): string
    {
        return $this->filterPaymentType;
    }

    public function setFilterPaymentType(string $filterPaymentType): void
    {
        $this->filterPaymentType = $filterPaymentType;
    }

    public function getFilterPsp(): int
    {
        return $this->filterPsp;
    }

    public function setFilterPsp(int $filterPsp): void
    {
        $this->filterPsp = $filterPsp;
    }

    public function getResponseModel(): ResponsePaymentMethod
    {
        return new ResponsePaymentMethod();
    }
}
