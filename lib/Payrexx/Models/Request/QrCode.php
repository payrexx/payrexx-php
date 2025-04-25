<?php

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;

/**
 * QrCode request class
 *
 * @copyright   Payrexx AG
 * @author      Payrexx Development Team <info@payrexx.com>
 * @package     \Payrexx\Models\Request
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

    public function getResponseModel(): \Payrexx\Models\Response\QrCode
    {
        return new \Payrexx\Models\Response\QrCode();
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid($uuid): void
    {
        $this->uuid = $uuid;
    }
}
