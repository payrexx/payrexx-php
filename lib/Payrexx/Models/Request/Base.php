<?php
/**
 * The Base model class for request models.
 * @author    Ueli Kramer <ueli.kramer@payrexx.com>
 * @copyright 2015 Payrexx AG
 * @since     v2.0
 */
namespace Payrexx\Models\Request;

/**
 * Class Base
 * @package Payrexx\Models\Request
 */
abstract class Base extends \Payrexx\Models\Base
{
    const LANG_DE = 'DE';
    const LANG_EN = 'EN';
    const LANG_FR = 'FR';
    const LANG_IT = 'IT';

    protected $id = 0;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Only used for toArray() function
     *
     * @param array|object|string $var
     * @param string|integer $index
     * @param string|null $method
     * @internal
     */
    private function remainingObjectsToArray(&$var, $index, $method = null) {
        if (is_object($var)) {
            $var = $var->toArray($method);
        }
        if (is_array($var)) {
            array_walk($var, array($this, 'remainingObjectsToArray'), $method);
        }
    }

    /**
     * Convert object to an associative array
     *
     * @param string|null $method
     * @return array
     */
    public function toArray($method = null)
    {
        $vars = get_object_vars($this);
        array_walk($vars, array($this, 'remainingObjectsToArray'), $method);
        if (!empty($method) && $method == 'create') {
            unset($vars['id']);
        }
        return $vars;
    }

    /**
     * Returns the name of the model endpoint
     *
     * @return string
     */
    public function getName()
    {
        $className = explode('\\', get_called_class());
        return end($className);
    }

    /**
     * Returns the corresponding response model object
     *
     * @return \Payrexx\Models\Response\Base
     */
    public abstract function getResponseModel();
}
