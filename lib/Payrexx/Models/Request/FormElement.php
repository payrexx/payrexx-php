<?php
/**
 * The form field request model
 * @author    Ueli Kramer <ueli.kramer@payrexx.com>
 * @copyright 2015 Payrexx AG
 * @since     v2.0
 */
namespace Payrexx\Models\Request;

/**
 * Class FormElement
 * @package Payrexx\Models\Request
 */
class FormElement extends \Payrexx\Models\Request\Base
{
    const TYPE_COMPANY = 'company';
    const TYPE_NAME = 'name';
    const TYPE_ADDRESS = 'address';
    const TYPE_COUNTRY = 'country';
    const TYPE_PHONE = 'phone';
    const TYPE_EMAIL = 'email';
    const TYPE_DATE_OF_BIRTH = 'date_of_birth';
    const TYPE_HEADLINE = 'header';
    const TYPE_TEXT = 'text';
    const TYPE_TEXTBOX = 'textbox';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_RADIOBOX = 'radiobox';
    const TYPE_SELECT = 'select';
    const TYPE_DATE = 'date';
    const TYPE_FILE = 'file';

    protected $type = self::TYPE_TEXT;
    protected $mandatory = false;
    protected $defaultValues = array();
    protected $labels = array();

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return boolean
     */
    public function isMandatory()
    {
        return $this->mandatory;
    }

    /**
     * @param boolean $mandatory
     */
    public function setMandatory($mandatory)
    {
        $this->mandatory = $mandatory;
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        return $this->defaultValues;
    }

    /**
     * @param string $defaultValue
     * @param string $lang the ISO of the lang , possible values: DE, EN, FR, IT
     */
    public function addDefaultValue($defaultValue, $lang = \Payrexx\Models\Request\Base::LANG_EN)
    {
        $this->defaultValues[$lang] = $defaultValue;
    }

    /**
     * @return array
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * This is only available for non core field types.
     * types supported: Headline, Text, Textbox, Checkbox, Radiobox, Select, Date, File
     * not supported: Company, Name, Address, Country, Phone, Email, Date of birth
     *
     * @param string $label
     * @param string $lang the ISO of the lang , possible values: DE, EN, FR, IT
     */
    public function addLabel($label, $lang = \Payrexx\Models\Request\Base::LANG_EN)
    {
        $this->labels[$lang] = $label;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\Invoice();
    }
}
