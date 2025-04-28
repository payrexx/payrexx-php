<?php

/**
 * The Page response model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.0
 */

namespace Payrexx\Models\Response;

/**
 * Class Page
 *
 * @package Payrexx\Models\Response
 */
class Page extends \Payrexx\Models\Request\Page
{
    protected int $createdAt = 0;

    public function getCreatedDate(): int
    {
        return $this->createdAt;
    }

    public function setCreatedDate(int $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }
}
