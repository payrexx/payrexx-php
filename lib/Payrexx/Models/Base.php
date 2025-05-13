<?php

/**
 * The Base model class for request and response models.
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.0
 */

namespace Payrexx\Models;

/**
 * Class Base
 *
 * @package Payrexx\Models
 */
abstract class Base
{
    protected string $uuid;
    protected int|string $id;

    /**
     * Converts array to response model
     */
    public function fromArray(array $data): static
    {
        foreach ($data as $param => $value) {
            if (!method_exists($this, 'set' . ucfirst($param))) {
                continue;
            }
            $this->{'set' . ucfirst($param)}($value);
        }

        return $this;
    }

    /**
     * Convert object to an associative array
     */
    public function toArray(): array
    {
        $vars = get_object_vars($this);
        $className = explode('\\', get_called_class());

        return $vars + ['model' => end($className)];
    }

    /**
     * Returns the corresponding response model object
     */
    public abstract function getResponseModel(): object;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }
}
