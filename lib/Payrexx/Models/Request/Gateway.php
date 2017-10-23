<?php

namespace Payrexx\Models\Request;

/**
 * Gateway request class
 *
 * @copyright   Payrexx AG
 * @author      Payrexx Development Team <info@payrexx.com>
 * @package     \Payrexx\Models\Request
 */
class Gateway extends \Payrexx\Models\Base
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
    protected $psp;

    /**
     * optional
     *
     * @access  protected
     * @var     array
     */
    protected $pm;

    /**
     * optional
     *
     * @access  protected
     * @var     bool
     */
    protected $preAuthorization = false;

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
     * @var     array
     */
    protected $fields;

    /**
     * optional
     *
     * @access  protected
     * @var     string
     */
    protected $concardisOrderId;

    /**
     * mandatory
     *
     * @access  protected
     * @var     string
     */
    protected $successRedirectUrl;

    /**
     * mandatory
     *
     * @access  protected
     * @var     string
     */
    protected $failedRedirectUrl;


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
    public function getPsp()
    {
        return $this->psp;
    }

    /**
     * Set payment service providers to use.
     * A list of available payment service providers
     * can be found here: http://developers.payrexx.com/docs/miscellaneous
     * All available psp will be used on payment page if none have been defined.
     *
     * @access  public
     * @param   array   $psp
     */
    public function setPsp($psp)
    {
        $this->psp = $psp;
    }

    /**
     * @access  public
     * @return  array
     */
    public function getPm()
    {
        return $this->pm;
    }

    /**
     * Set payment mean to use.
     *
     * @access  public
     * @param   array   $pm
     */
    public function setPm($pm)
    {
        $this->pm = $pm;
    }

    /**
     * @access  public
     * @return  bool
     */
    public function getPreAuthorization()
    {
        return $this->preAuthorization;
    }

    /**
     *  Whether charge payment manually at a later date.
     *
     * @access  public
     * @param   bool    $preAuthorization
     */
    public function setPreAuthorization($preAuthorization)
    {
        $this->preAuthorization = $preAuthorization;
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
     * @return  array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Add a new field of the payment page
     *
     * @access  public
     * @param   string  $type           Type of field
     *                                  Available types: title, forename, surname, company, street,
     *                                  postcode, place, country, phone, email, date_of_birth,
     *                                  custom_field_1, custom_field_2, custom_field_3, custom_field_4, custom_field_5
     * @param   string  $value          Value of field
     *                                  For field of type "title" use value "mister" or "miss"
     *                                  For field of type "country" pass the 2 letter ISO code
     * @param   array   $name           Name of the field (only available for fields of type "custom_field_1-5"
     */
    public function addField($type, $value, $name = array())
    {
        $this->fields[$type] = array(
            'value' => $value,
            'name' => $name,
        );
    }

    /**
     * @access  public
     * @return  string
     */
    public function getConcardisOrderId()
    {
        return $this->concardisOrderId;
    }

    /**
     * Set a custom order ID for the Concardis PSPs
     *
     * @access  public
     * @param   string  $concardisOrderId
     */
    public function setConcardisOrderId($concardisOrderId)
    {
        $this->concardisOrderId = $concardisOrderId;
    }

    /**
     * @access  public
     * @return  string
     */
    public function getSuccessRedirectUrl()
    {
        return $this->successRedirectUrl;
    }

    /**
     * Set the URL to redirect to after a successful payment.
     *
     * @access  public
     * @param   string  $successRedirectUrl
     */
    public function setSuccessRedirectUrl($successRedirectUrl)
    {
        $this->successRedirectUrl = $successRedirectUrl;
    }

    /**
     * @access  public
     * @return  string
     */
    public function getFailedRedirectUrl()
    {
        return $this->failedRedirectUrl;
    }

    /**
     * Set the url to redirect to after a failed payment.
     *
     * @param   string  $failedRedirectUrl
     */
    public function setFailedRedirectUrl($failedRedirectUrl)
    {
        $this->failedRedirectUrl = $failedRedirectUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\Gateway();
    }

}
