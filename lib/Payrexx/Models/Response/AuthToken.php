<?php
/**
 * The AuthToken response model
 * @author    Ueli Kramer <ueli.kramer@payrexx.com>
 * @copyright 2015 Payrexx AG
 * @since     v2.0
 */
namespace Payrexx\Models\Response;

/**
 * Class AuthToken
 * @package Payrexx\Models\Response
 */
class AuthToken extends \Payrexx\Models\Response\Base
{
    protected $contactId = 0;
    protected $authToken = '';
    protected $authTokenExpirationDate = null;
    protected $link = '';

    /**
     * @return int
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * @return string
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * @return null
     */
    public function getAuthTokenExpirationDate()
    {
        return $this->authTokenExpirationDate;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }
}
