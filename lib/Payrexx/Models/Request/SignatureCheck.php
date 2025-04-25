<?php
/**
 * The signatureCheck request model
 * @author    Remo Siegenthaler <remo.siegenthaler@payrexx.com>
 * @copyright 2017 Payrexx AG
 * @since     v1.0
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
