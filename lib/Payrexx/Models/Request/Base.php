<?php

namespace Payrexx\Models\Request;

abstract class Base
{
    protected $id;

    public abstract function toArray($method);

    public abstract function getResponseModel();

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}