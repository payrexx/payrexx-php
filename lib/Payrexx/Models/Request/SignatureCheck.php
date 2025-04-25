<?php

/**
 * The SignatureCheck request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.5.0
 */

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;

/**
 * Class SignatureCheck
 *
 * @package Payrexx\Models\Request
 */
class SignatureCheck extends Base
{
    public function getResponseModel(): \Payrexx\Models\Response\SignatureCheck
    {
        return new \Payrexx\Models\Response\SignatureCheck();
    }
}
