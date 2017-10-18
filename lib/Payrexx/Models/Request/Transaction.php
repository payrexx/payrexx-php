<?php

/**
 * Transaction request model
 *
 * @copyright   Payrexx AG
 * @author      Payrexx Development Team <info@payrexx.com>
 */
namespace Payrexx\Models\Request;

/**
 * Transaction class
 *
 * @package Payrexx\Models\Request
 */
class Transaction extends \Payrexx\Models\Base
{
    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\Transaction();
    }
}
