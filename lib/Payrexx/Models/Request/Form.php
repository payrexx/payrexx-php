<?php
/**
 * The form request model
 * @author    Ueli Kramer <ueli.kramer@comvation.com>
 * @copyright 2014 Payrexx AG
 * @since     v1.0
 */
namespace Payrexx\Models\Request;

/**
 * Class Form
 * @package Payrexx\Models\Request
 */
class Form extends \Payrexx\Models\Request\Base
{
    /**
     * {@inheritdoc}
     */
    public function toArray($method)
    {
        return array(
            'model' => 'Form',
            'id' => $this->getId(),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\Form();
    }
}
