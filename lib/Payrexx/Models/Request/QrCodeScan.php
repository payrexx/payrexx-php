<?php

/**
 * The QrCodeScan request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.7.5
 */

namespace Payrexx\Models\Request;

/**
 * QrCodeScan request class
 *
 * @package     \Payrexx\Models\Request
 */
class QrCodeScan extends \Payrexx\Models\Base
{
    /**
     * mandatory
     *
     * @access  protected
     * @var     string
     */
    protected $sessionId;

    /**
     * @access  public
     * @return  string
     */
    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    /**
     * @access  public
     * @param   string   $sessionId
     * @return  void
     */
    public function setSessionId(string $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\QrCodeScan();
    }
}
