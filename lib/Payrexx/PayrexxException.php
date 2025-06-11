<?php

/**
 * The Payrexx Exception for any exception occurred during the API process
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.0
 */

namespace Payrexx;

use Exception;

/**
 * Class PayrexxException
 *
 * @package Payrexx
 */
class PayrexxException extends Exception
{
    private string $reason = '';

    public function getReason(): string
    {
        return $this->reason;
    }

    public function setReason(string $reason = ''): void
    {
        $this->reason = $reason;
    }
}
