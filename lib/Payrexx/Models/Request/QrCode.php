<?php

/**
 * The QrCode request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.7.5
 */

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;
use Payrexx\Models\Response\QrCode as ResponseQrCode;

/**
 * QrCode request class
 *
 * @package Payrexx\Models\Request
 */
class QrCode extends Base
{
    /** mandatory */
    protected string $webshopUrl;

    public function getWebshopUrl(): string
    {
        return $this->webshopUrl;
    }

    public function setWebshopUrl(string $webshopUrl): void
    {
        $this->webshopUrl = $webshopUrl;
    }

    public function getResponseModel(): ResponseQrCode
    {
        return new ResponseQrCode();
    }
}
