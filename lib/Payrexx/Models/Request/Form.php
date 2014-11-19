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
    private $title = '';
    private $description = '';
    private $pspId = 0;
    private $name = '';
    private $number = '';
    private $amount = 0;
    private $currency = 0;
    private $fields = array();

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getPspId()
    {
        return $this->pspId;
    }

    /**
     * @param mixed $pspId
     */
    public function setPspId($pspId)
    {
        $this->pspId = $pspId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return array fields
     */
    public function getFields()
    {
        return $this->fields;
    }
    
    public function addField($name, $defaultValue = '', $mandatory = false)
    {
        $this->fields[$name] = array();
        $this->fields[$name]['mandatory'] = $mandatory;
        $this->fields[$name]['defaultValue'] = $defaultValue;
    }
    
    public function removeField($name)
    {
        if (!isset($this->fields[$name])) {
            return false;
        }
        unset($this->fields[$name]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function toArray($method)
    {
        return array(
            'model' => 'Form',
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'pspId' => $this->getPspId(),
            'name' => $this->getName(),
            'number' => $this->getNumber(),
            'amount' => $this->getAmount(),
            'currency' => $this->getCurrency(),
            'fields' => $this->getFields(),
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
