<?php
/**
 * The Form response model
 * @author    Ueli Kramer <ueli.kramer@comvation.com>
 * @copyright 2014 Payrexx AG
 * @since     v1.0
 */
namespace Payrexx\Models\Response;

/**
 * Class Form
 * @package Payrexx\Models\Response
 */
class Form extends \Payrexx\Models\Request\Form
{
    protected $createdDate = 0;

    /**
     * @return int
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param int $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }
}
