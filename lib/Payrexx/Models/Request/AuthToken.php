<?php

/**
 * The AuthToken request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.1.0
 */

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;
use Payrexx\Models\Response\AuthToken as ResponseAuthToken;

/**
 * Class AuthToken
 *
 * @package Payrexx\Models\Request
 */
class AuthToken extends Base
{
    protected int $userId = 0;

    /**
     * The user id of the user you want an auth token for
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Set the user id you would like to get an auth token for
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getResponseModel(): ResponseAuthToken
    {
        return new ResponseAuthToken();
    }
}
