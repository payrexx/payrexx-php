<?php

/**
 * PaymentMethod request model
 *
 * @copyright   Payrexx AG
 * @author      Payrexx Development Team <info@payrexx.com>
 */
namespace Payrexx\Models\Request;

use Payrexx\Models\Base;

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

    public function getResponseModel(): \Payrexx\Models\Response\PaymentMethod
    {
        return new \Payrexx\Models\Response\PaymentMethod();
    }
}
