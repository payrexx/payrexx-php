<?php

namespace Payrexx\Models\Request;

/**
 * QRCode request class
 *
 * @copyright   Payrexx AG
 * @author      Payrexx Development Team <info@payrexx.com>
 * @package     \Payrexx\Models\Request
 */
class QRCode extends \Payrexx\Models\Base
{
    /**
     * mandatory
     *
     * @access  protected
     * @var     integer
     */
    protected $amount;

    /**
     * mandatory
     *
     * @access  protected
     * @var     string
     */
    protected $currency;

    /**
     * optional
     *
     * @access  protected
     * @var     array
     */
    protected $purpose;

    /**
     * optional
     *
     * @access  protected
     * @var     array       $basket
     */
    protected $basket;

    /**
     * optional
     *
     * @access  protected
     * @var     string
     */
    protected $referenceId;

    /**
     * optional
     *
     * @access  protected
     * @var     string
     */
    protected $endpoint;

    /**
     * @access  public
     * @return  int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the payment amount.
     * Make sure the amount is multiplied by 100!
     *
     * @access  public
     * @param   integer $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @access  public
     * @return  string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set the corresponding payment currency for the amount (use ISO codes).
     *
     * @access  public
     * @param   string  $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @access  public
     * @return  array
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * Set the purpose for the Payment. Will be displayed as transaction purpose in payment page and merchant backend.
     * Use language ID as array key. Use key 0 as default purpose. Will be used for each activated frontend language.
     *
     * @access  public
     * @param   array   $purpose
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;
    }

    /**
     * @return array
     */
    public function getBasket(): array
    {
        return $this->basket;
    }

    /**
     * It is a multidimensional array to parse each product as an array
     *
     * @param array $basket         Available product values:
     *                              name => Can be an array with the key as language ID
     *                              description => Can be an array with the key as language ID
     *                              quantity => quantity of the product
     *                              amount => Product amount
     */
    public function setBasket(array $basket): void
    {
        $this->basket = $basket;
    }

    /**
     * @access  public
     * @return  string
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * Set the reference id which you will get in Webhook.
     * This reference id won't be shown to customers.
     *
     * @access  public
     * @param   string  $referenceId
     */
    public function setReferenceId($referenceId)
    {
        $this->referenceId = $referenceId;
    }

    /**
     * @access  public
     * @return  string
     */
    public function getEndPoint()
    {
        return $this->endpoint;
    }

    /**
     * Set the url to redirect to after QR scanned.
     *
     * @param   string  $endPoint
     */
    public function setEndPoint($endPoint)
    {
        $this->endpoint = $endPoint;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\QRCode();
    }

}
