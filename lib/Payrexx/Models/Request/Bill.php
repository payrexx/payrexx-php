<?php

/**
 * The Bill request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v2.0.0
 */

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;
use Payrexx\Models\Response\Bill as ResponseBill;

/**
 * Bill request class
 *
 * @package \Payrexx\Models\Request
 */
class Bill extends Base
{
    /** Mandatory */
    protected string $language;
    protected string $currency;
    protected int $dueAfterDays;
    protected array $positions;
    protected array $recipient;

    /** Optional */
    protected string $date = 'TODAY';
    protected array $servicePeriod;
    protected array $discount;
    protected array $cashDiscounts;
    protected int $shippingCost;
    protected int $applicationFee;
    protected string $note;
    protected string $terms;
    protected array $attachments;
    protected array $bankInformation;
    protected ?string $payoutDescriptor;
    protected array $psp;
    protected array $pm;
    protected array $reminders;
    protected string $reference;
    protected string $design;
    protected bool $send = false;
    protected array $additionalRecipients;
    protected bool $complete = false;
    protected int $offset;
    protected int $limit;

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setDueAfterDays(int $dueAfterDays): void
    {
        $this->dueAfterDays = $dueAfterDays;
    }

    public function getDueAfterDays(): int
    {
        return $this->dueAfterDays;
    }

    public function setPositions(array $positions): void
    {
        $this->positions = $positions;
    }

    public function getPositions(): array
    {
        return $this->positions;
    }

    public function setRecipient(array $recipient): void
    {
        $this->recipient = $recipient;
    }

    public function getRecipient(): array
    {
        return $this->recipient;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setServicePeriod(array $servicePeriod): void
    {
        $this->servicePeriod = $servicePeriod;
    }

    public function getServicePeriod(): array
    {
        return $this->servicePeriod;
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

    public function setShippingCost(int $shippingCost): void
    {
        $this->shippingCost = $shippingCost;
    }

    public function getShippingCost(): int
    {
        return $this->shippingCost;
    }

    public function setApplicationFee(int $applicationFee): void
    {
        $this->applicationFee = $applicationFee;
    }

    public function getApplicationFee(): int
    {
        return $this->applicationFee;
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

    public function setAttachments(array $attachments): void
    {
        $this->attachments = $attachments;
    }

    public function getAttachments(): array
    {
        return $this->attachments;
    }

    public function setBankInformation(array $bankInfo): void
    {
        $this->bankInformation = $bankInfo;
    }

    public function getBankInformation(): array
    {
        return $this->bankInformation;
    }

    public function setPayoutDescriptor(?string $payoutDescriptor): void
    {
        $this->payoutDescriptor = $payoutDescriptor;
    }

    public function getPayoutDescriptor(): ?string
    {
        return $this->payoutDescriptor;
    }

    /**
     * Set payment service providers to use.
     * A list of available payment service providers
     * can be found here: https://docs.payrexx.com/developer/general-info/payment-provider
     * All available psp will be used on payment page if none have been defined.
     */
    public function setPsp(array $psp): void
    {
        $this->psp = $psp;
    }

    public function getPsp(): array
    {
        return $this->psp;
    }

    public function setPm(array $pm): void
    {
        $this->pm = $pm;
    }

    public function getPm(): array
    {
        return $this->pm;
    }

    public function setReminders(array $reminders): void
    {
        $this->reminders = $reminders;
    }

    public function getReminders(): array
    {
        return $this->reminders;
    }

    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setDesign(string $design): void
    {
        $this->design = $design;
    }

    public function getDesign(): string
    {
        return $this->design;
    }

    public function setSend(bool $send): void
    {
        $this->send = $send;
    }

    public function getSend(): bool
    {
        return $this->send;
    }

    public function setAdditionalRecipient(array $additionalRecipients): void
    {
        $this->additionalRecipients = $additionalRecipients;
    }

    public function getAdditionalRecipient(): array
    {
        return $this->additionalRecipients;
    }

    public function setComplete(bool $complete): void
    {
        $this->complete = $complete;
    }

    public function getComplete(): bool
    {
        return $this->complete;
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

    public function getResponseModel(): ResponseBill
    {
        return new ResponseBill();
    }
}
