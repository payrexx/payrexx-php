<?php

/**
 * The QrCodeScan request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.7.5
 */

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;
use Payrexx\Models\Response\QrCodeScan as ResponseQrCodeScan;

/**
 * QrCodeScan request class
 *
 * @package Payrexx\Models\Request
 */
class QrCodeScan extends Base
{
    /** mandatory */
    protected string $sessionId;

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function setSessionId(string $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    public function getResponseModel(): ResponseQrCodeScan
    {
        return new ResponseQrCodeScan();
    }
}
