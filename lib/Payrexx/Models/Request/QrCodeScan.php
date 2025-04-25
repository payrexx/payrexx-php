<?php

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;

/**
 * QrCodeScan request class
 *
 * @copyright   Payrexx AG
 * @author      Payrexx Development Team <info@payrexx.com>
 * @package     \Payrexx\Models\Request
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

    public function getResponseModel(): \Payrexx\Models\Response\QrCodeScan
    {
        return new \Payrexx\Models\Response\QrCodeScan();
    }
}
