<?php

/**
 * The QrCode request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.7.5
 */

namespace Payrexx\Models\Request;

/**
 * QrCode request class
 *
 * @package \Payrexx\Models\Request
 */
class QrCode extends \Payrexx\Models\Base
{
    /**
     * mandatory
     *
     * @access  protected
     * @var     string
     */
    protected $webshopUrl;

    /**
     * @access  protected
     * @var string
     */
    protected $uuid;

    /**
     * @access  public
     * @return  string
     */
    public function getWebshopUrl(): string
    {
        return $this->webshopUrl;
    }

    /**
     * @access  public
     * @param   string   $webshopUrl
     * @return  void
     */
    public function setWebshopUrl(string $webshopUrl): void
    {
        $this->webshopUrl = $webshopUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\QrCode();
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid($uuid): void
    {
        $this->uuid = $uuid;
    }
}
