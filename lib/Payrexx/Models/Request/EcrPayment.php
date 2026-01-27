<?php

/**
 * The ecrPayment request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v2.0.10
 */
declare(strict_types=1);

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;
use Payrexx\Models\Response\EcrPayment as EcrPaymentResponse;

class EcrPayment extends Base
{
    // --- Core Transaction Data ---
    protected ?int $amount = null;
    protected ?string $currency = null;
    protected ?string $serialNumber = null;

    // --- Optional Configuration ---
    protected ?string $paymentMethod = null;
    protected bool $printSlip = false;
    protected ?int $tipAmount = null;
    protected ?array $discount = null;
    protected ?string $purpose = null;
    protected ?string $paymentReference = null;
    protected array $shopItems = [];


    /**
     * @param string|null $serialNumber
     * @param int|null $amount Amount in cents
     * @param string|null $currency Currency code (CHF, EUR, etc.)
     */
    public function __construct(?string $serialNumber = null, ?int $amount = null, ?string $currency = null)
    {
        if ($serialNumber) {
            $this->setSerialNumber($serialNumber);
        }
        if ($amount) {
            $this->setAmount($amount);
        }
        if ($currency) {
            $this->setCurrency($currency);
        }
    }

    public function getSerialnumber(): ?string
    {
        return $this->serialNumber;
    }

    public function setSerialnumber(string $serialNumber): void
    {
        $this->serialNumber = $serialNumber;
    }

    /**
     * Sets the ID for Sub-Resource actions (GET status, CANCEL).
     * This creates a path like: .../ecr/{serial}/payment/{id}
     */
    public function setPaymentId($paymentId): void
    {
        $this->setId('payment/' . $paymentId);
    }


    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?string $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function isPrintSlip(): bool
    {
        return $this->printSlip;
    }

    public function setPrintSlip(bool $printSlip): void
    {
        $this->printSlip = $printSlip;
    }

    public function getTipAmount(): ?int
    {
        return $this->tipAmount;
    }

    public function setTipAmount(?int $tipAmount): void
    {
        $this->tipAmount = $tipAmount;
    }

    public function getDiscount(): ?array
    {
        return $this->discount;
    }

    public function setDiscount(?array $discount): void
    {
        $this->discount = $discount;
    }


    public function getPurpose(): ?string
    {
        return $this->purpose;
    }

    public function setPurpose(string $purpose): void
    {
        $this->purpose = $purpose;
    }

    public function getPaymentReference(): ?string
    {
        return $this->paymentReference;
    }

    public function setPaymentReference(string $paymentReference): void
    {
        $this->paymentReference = $paymentReference;
    }

    public function getShopItems(): array
    {
        return $this->shopItems;
    }

    /**
     * Helper to add a single item
     */
    public function addShopItem(string $name, int $price, string $quantity = '1', ?string $unit = 'pc', ?int $vat = null, ?int $discount = 0): void
    {
        $item = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'unit' => $unit,
            'vat' => $vat,
            'discount' => $discount
        ];

        $this->shopItems[] = $item;
    }

    /**
     * Override getPath to use the Serial Number as the main resource ID.
     */
    public function getPath(): string
    {
        $serialnumber = $this->getSerialnumber();
        if (empty($serialnumber)) {
            throw new \Exception('Serialnumber is required');
        }
        return 'ecr/' . $serialnumber;
    }

    public function getResponseModel(): object
    {
        return new EcrPaymentResponse();
    }
}