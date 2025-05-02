<?php

/**
 * The Bill request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.8.12
 */

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;

/**
 * Bill request class
 *
 * @package \Payrexx\Models\Request
 */
class Bill extends Base
{
    /** Mandatory */
    protected array $recipient;
    protected string $language;
    protected string $currency;
    protected int $dueAfterDays;
    protected array $positions;

    /** Optional */
    protected int $send;
    protected int $complete;
    protected string $amount;
    protected int $shippingCost;
    protected array $reminders;
    protected array $additionalRecipients;
    protected array $attachments;
    protected int $applicationFee;
    protected array $discount;
    protected array $cashDiscounts;
    protected array $bankInformation;
    protected string $payoutDescriptor;
    protected array $pm;
    protected array $psp;
    protected string $note;
    protected string $terms;
    protected array $servicePeriod;
    protected string $reference;
    protected string $date;
    protected bool $isPriceExclusiveVat;
    protected int $offset;
    protected int $limit;

    public function setSend(int $send): void
    {
        $this->send = $send;
    }

    public function getSend(): int
    {
        return $this->send;
    }

    public function setComplete(int $complete): void
    {
        $this->complete = $complete;
    }

    public function getComplete(): int
    {
        return $this->complete;
    }

    public function setRecipient(array $recipient): void
    {
        foreach ($recipient as $key => $value) {
            $this->recipient[$key] = $value;
        }
    }

    public function getRecipient(): array
    {
        return $this->recipient;
    }

    public function setDueAfterDays(int $dueAfterDays): void
    {
        $this->dueAfterDays = $dueAfterDays;
    }

    public function getDueAfterDays(): int
    {
        return $this->dueAfterDays;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setShippingCost(int $shippingCost): void
    {
        $this->shippingCost = $shippingCost;
    }

    public function getShippingCost(): int
    {
        return $this->shippingCost;
    }

    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function setTerms(string $terms): void
    {
        $this->terms = $terms;
    }

    public function getTerms(): string
    {
        return $this->terms;
    }

    public function setServicePeriod(array $servicePeriod): void
    {
        $this->servicePeriod = $servicePeriod;
    }

    public function getServicePeriod(): array
    {
        return $this->servicePeriod;
    }

    public function setPositions(array $positions): void
    {
        $this->positions = $positions;
    }
    public function getPositions(): array
    {
        return $this->positions;
    }

    public function setReminders(array $reminders): void
    {
        $this->reminders = $reminders;
    }
    public function getReminders(): array
    {
        return $this->reminders;
    }

    public function setAdditionalRecipient(array $additionalRecipients): void
    {
        $this->additionalRecipients = $additionalRecipients;
    }
    public function getAdditionalRecipient(): array
    {
        return $this->additionalRecipients;
    }

    public function setAttachments(array $attachments): void
    {
        $this->attachments = $attachments;
    }

    public function getAttachments(): array
    {
        return $this->attachments;
    }

    public function setApplicationFee(int $applicationFee): void
    {
        $this->applicationFee = $applicationFee;
    }

    public function setDiscount(array $discount): void
    {
        $this->discount = $discount;
    }

    public function getDiscount(): array
    {
        return $this->discount;
    }

    public function setCashDiscounts(array $cashDiscounts): void
    {
        $this->cashDiscounts = $cashDiscounts;
    }

    public function getCashDiscounts(): array
    {
        return $this->cashDiscounts;
    }

    public function setBankInformation(array $bankInfo): void
    {
        $this->bankInformation = $bankInfo;
    }

    public function getBankInformation(): array
    {
        return $this->bankInformation;
    }

    public function setPayoutDescriptor(string $payoutDescriptor): void
    {
        $this->payoutDescriptor = $payoutDescriptor;
    }

    public function getPayoutDescriptor(): string
    {
        return $this->payoutDescriptor;
    }

    public function getPsp(): array
    {
        return $this->psp;
    }

    /**
     * Set payment service providers to use.
     * A list of available payment service providers
     * can be found here: http://developers.payrexx.com/docs/miscellaneous
     * All available psp will be used on payment page if none have been defined.
     */
    public function setPsp(array $psp): void
    {
        $this->psp = $psp;
    }

    public function getPm(): array
    {
        return $this->pm;
    }

    /**
     * Set payment mean to use.
     */
    public function setPm(array $pm): void
    {
        $this->pm = $pm;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function setOffset(int $offset): void
    {
        $this->offset = $offset;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function setIsPriceExclusiveVat(bool $exclusiveVat): void
    {
        $this->isPriceExclusiveVat = $exclusiveVat;
    }

    public function getIsPriceExclusiveVat(): bool
    {
        return $this->isPriceExclusiveVat;
    }

    public function getResponseModel(): \Payrexx\Models\Response\Bill
    {
        return new \Payrexx\Models\Response\Bill();
    }
}
