<?php

/**
 * The Payout response model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.8.4
 */

namespace Payrexx\Models\Response;

/**
 * Class Payout
 *
 * @package Payrexx\Models\Response
 */
class Payout extends \Payrexx\Models\Request\Payout
{

    protected string $object = '';

    protected int $amount = 0;

    protected float $totalFees = 0;

    protected ?string $date = '';

    protected ?string $statement = '';

    protected ?string $status = '';

    protected ?array $destination = [];

    protected ?array $transfers = [];

    protected ?array $merchant = [];

    protected string $payer = '';

    protected bool $isManualPayout;

    public function getObject(): string
    {
        return $this->object;
    }

    public function setObject(string $object): void
    {
        $this->object = $object;
    }

    public function getTotalFees(): float
    {
        return $this->totalFees;
    }

    public function setTotalFees(float $totalFees): void
    {
        $this->totalFees = $totalFees;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    public function getStatement(): ?string
    {
        return $this->statement;
    }

    public function setStatement(?string $statement): void
    {
        $this->statement = $statement;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    public function getDestination(): ?array
    {
        return $this->destination;
    }

    public function setDestination(?array $destination): void
    {
        $this->destination = $destination;
    }

    public function getTransfers(): ?array
    {
        return $this->transfers;
    }

    public function setTransfers(?array $transfers): void
    {
        $this->transfers = $transfers;
    }

    public function getMerchant(): array
    {
        return $this->merchant;
    }

    public function setMerchant(?array $merchant): void
    {
        $this->merchant = $merchant;
    }

    public function setPayer(string $payer): void
    {
        $this->payer = $payer;
    }

    public function getPayer(): string
    {
        return $this->payer;
    }

    public function setIsManualPayout(bool $isManualPayout): void
    {
        $this->isManualPayout = $isManualPayout;
    }

    public function getIsManualPayout(): bool
    {
        return $this->isManualPayout;
    }
}
