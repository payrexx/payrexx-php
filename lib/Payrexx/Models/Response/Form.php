<?php
/**
 * The Form response model
 * @author    Ueli Kramer <ueli.kramer@comvation.com>
 * @copyright 2014 Payrexx AG
 * @since     v1.0
 */
namespace Payrexx\Models\Response;

/**
 * Class Form
 * @package Payrexx\Models\Response
 */
class Form extends \Payrexx\Models\Response\Base
{
    protected $name;
    protected $title;
    protected $billingNumber;
    protected $billingAmount;
    protected $billingCurrency;

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
    public function getBillingAmount()
    {
        return $this->billingAmount;
    }

    /**
     * @param string $billingAmount
     */
    public function setBillingAmount($billingAmount)
    {
        $this->billingAmount = $billingAmount;
    }

    /**
     * @return string
     */
    public function getBillingCurrency()
    {
        return $this->billingCurrency;
    }

    /**
     * @param string $billingCurrency
     */
    public function setBillingCurrency($billingCurrency)
    {
        $this->billingCurrency = $billingCurrency;
    }

    /**
     * @return string
     */
    public function getBillingNumber()
    {
        return $this->billingNumber;
    }

    /**
     * @param string $billingNumber
     */
    public function setBillingNumber($billingNumber)
    {
        $this->billingNumber = $billingNumber;
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

}
