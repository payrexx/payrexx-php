<?php

declare(strict_types=1);

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
    protected ?string $uuid = null;
    protected int|string|null $id = null;

    /**
     * Converts array to response model
     */
    public function fromArray(array $data): static
    {
        foreach ($data as $param => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $param)));

            if (method_exists($this, $method)) {
                $this->{$method}($value);
            }
        }

        return $this;
    }

    /**
     * Convert object to an associative array
     */
    public function toArray(): array
    {
        $vars = get_object_vars($this);


        return $vars + ['model' => $this->getPath()];
    }

    public function getPath(): string
    {
        $className = explode('\\', get_called_class());
        return end($className);
    }

    /**
     * Returns the corresponding response model object
     */
    abstract public function getResponseModel(): object;

    public function getId(): int|string|null
    {
        return $this->id;
    }

    public function setId(int|string $id): void
    {
        $this->id = $id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }
}
