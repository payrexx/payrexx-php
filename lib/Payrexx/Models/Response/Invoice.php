<?php
/**
 * The invoice response model
 * @author    Ueli Kramer <ueli.kramer@payrexx.com>
 * @copyright 2015 Payrexx AG
 * @since     v2.0
 */
namespace Payrexx\Models\Response;

/**
 * Class Invoice
 * @package Payrexx\Models\Response
 */
class Invoice extends \Payrexx\Models\Response\Base
{
    protected $hash = '';
    protected $link = '';
    protected $status;
    protected $createdAt = 0;

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
