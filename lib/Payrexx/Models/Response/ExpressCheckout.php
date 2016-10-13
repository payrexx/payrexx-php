<?php

namespace Payrexx\Models\Response;

/**
 * Express Checkout response class
 *
 * @copyright   Payrexx AG
 * @author      Payrexx Development Team <info@payrexx.com>
 * @package     \Payrexx\Models\Response
 */
class ExpressCheckout extends \Payrexx\Models\Request\ExpressCheckout
{

    /**
     * @access  protected
     * @var     string
     */
    protected $hash;

    /**
     * @access  protected
     * @var     string
     */
    protected $link;

    /**
     * @access  protected
     * @var     string
     */
    protected $status;

    /**
     * @access  protected
     * @var     integer
     */
    protected $createdAt;


    /**
     * @access  public
     * @return  string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @access  public
     * @param   string  $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @access  public
     * @return  string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @access  public
     * @param   string  $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @access  public
     * @return  string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @access  public
     * @param   string  $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @access  public
     * @return  integer
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @access  public
     * @param   integer $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @access  public
     * @param   array   $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

}
