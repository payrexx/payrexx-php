<?php
/**
 * The AuthToken request model
 * @author    Ueli Kramer <ueli.kramer@payrexx.com>
 * @copyright 2015 Payrexx AG
 * @since     v2.0
 */
namespace Payrexx\Models\Request;

/**
 * Class AuthToken
 * @package Payrexx\Models\Request
 */
class AuthToken extends \Payrexx\Models\Request\Base
{
    protected $contactId = 0;

    /**
     * The user id of the contact you want an auth token for
     * 
     * @return int
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * Set the contact id you would like to get an auth token for
     * 
     * @param int $contactId
     */
    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\AuthToken();
    }
}
