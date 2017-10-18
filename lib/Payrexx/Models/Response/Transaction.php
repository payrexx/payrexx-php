<?php

/**
 * Transaction response model
 *
 * @copyright   Payrexx AG
 * @author      Payrexx Development Team <info@payrexx.com>
 */
namespace Payrexx\Models\Response;

/**
 * Transaction class
 *
 * @package Payrexx\Models\Response
 */
class Transaction extends \Payrexx\Models\Request\Transaction
{

    private $uuid;
    private $time;
    private $status;
    private $lang;
    private $psp;


    /**
     * @access  public
     * @param   string  $uuid
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @access  pubic
     * @return  string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @access  public
     * @param   string  $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @access  pubic
     * @return  string
     */
    public function getTime()
    {
        return $this->time;
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
     * @access  pubic
     * @return  string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @access  public
     * @param   string  $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @access  pubic
     * @return  string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @access  public
     * @param   string  $psp
     */
    public function setPsp($psp)
    {
        $this->psp = $psp;
    }

    /**
     * @access  pubic
     * @return  string
     */
    public function getPsp()
    {
        return $this->psp;
    }
}
