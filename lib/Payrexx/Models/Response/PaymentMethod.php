<?php

/**
 * PaymentMethod response model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.7.5
 */

namespace Payrexx\Models\Response;

/**
 * PaymentMethod class
 *
 * @package Payrexx\Models\Response
 */
class PaymentMethod extends \Payrexx\Models\Request\PaymentMethod
{
    protected string $name;

    protected array $label;

    protected array $logo;

    protected array $options_by_psp;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLabel(): array
    {
        return $this->label;
    }

    public function setLabel(array $label): void
    {
        $this->label = $label;
    }

    public function getLogo(): array
    {
        return $this->logo;
    }

    public function setLogo(array $logo): void
    {
        $this->logo = $logo;
    }

    public function getoptions_by_psp(): array
    {
        return $this->options_by_psp;
    }

    public function setoptions_by_psp(array $options_by_psp): void
    {
        $this->options_by_psp = $options_by_psp;
    }
}
