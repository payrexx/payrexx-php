<?php

/**
 * The SignatureCheck request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.5.0
 */

namespace Payrexx\Models\Request;

/**
 * Class SignatureCheck
 *
 * @package Payrexx\Models\Request
 */
class SignatureCheck extends \Payrexx\Models\Base
{
    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\SignatureCheck();
    }
}
