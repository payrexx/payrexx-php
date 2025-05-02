<?php

/**
 * The DeviceTransaction request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.8.12
 */

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;

/**
 * DeviceTransaction request class
 *
 * @package \Payrexx\Models\Request
 */
class DeviceTransaction extends Base
{
    protected const API_MODEL_ENDPOINT = 'Device/Transaction';


    public function getResponseModel(): \Payrexx\Models\Response\DeviceTransaction
    {
        return new \Payrexx\Models\Response\DeviceTransaction();
    }

    public function getApiModelEndPoint(): string
    {
        return self::API_MODEL_ENDPOINT;
    }

    public function getApiAct(string $method): string
    {
        $method = strtolower($method);

        if (str_ends_with($method, 'cancel')) {
            return 'cancel';
        }

        if (str_ends_with($method, 'refund')) {
            return 'refund';
        }

        return '';
    }
}
