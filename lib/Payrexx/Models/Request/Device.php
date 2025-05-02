<?php

/**
 * The Device request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.8.12
 */

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;

/**
 * Device request class
 *
 * @package \Payrexx\Models\Request
 */
class Device extends Base
{
    protected string $deviceUrl;
    protected const APT_ACT = 'twint';

    public function setDeviceUrl(string $deviceUrl): void
    {
        $this->deviceUrl = $deviceUrl;
    }

    public function getDeviceUrl(): int
    {
        return $this->deviceUrl;
    }

    public function getApiAct(string $method): string
    {
        return self::APT_ACT;
    }

    public function getResponseModel(): \Payrexx\Models\Response\Device
    {
        return new \Payrexx\Models\Response\Device();
    }
}
