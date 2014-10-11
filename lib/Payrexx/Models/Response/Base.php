<?php

namespace Payrexx\Models\Response;

abstract class Base
{
    protected $id;

    public function fromArray($data)
    {
        foreach ($data as $param => $value) {
            if (method_exists($this, 'set' . ucfirst($param))) {
                $this->{'set' . ucfirst($param)}($value);
            }
        }
        return $this;
    }

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