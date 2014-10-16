<?php
/**
 * The subscription request model
 * @author    Ueli Kramer <ueli.kramer@comvation.com>
 * @copyright 2014 Payrexx AG
 * @since     v1.0
 */
namespace Payrexx\Models\Request;

/**
 * Class Subscription
 * @package Payrexx\Models\Request
 */
class Subscription extends \Payrexx\Models\Request\Base
{
    /**
     * {@inheritdoc}
     */
    public function toArray($method)
    {
        return array(
            'model' => 'Subscription',
            'id' => $this->getId(),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\Subscription();
    }
}
