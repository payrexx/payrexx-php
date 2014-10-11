<?php

namespace Payrexx\Models\Request;

class Subscription extends \Payrexx\Models\Request\Base
{
    public function toArray($method)
    {
        return array(
            'model' => 'Subscription',
            'id' => $this->getId(),
        );
    }

    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\Subscription();
    }
}