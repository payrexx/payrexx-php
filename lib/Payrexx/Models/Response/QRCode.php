<?php

namespace Payrexx\Models\Response;

class QRCode extends \Payrexx\Models\Request\QRCode
{
    /** @var string */
    protected $qrCode;

    /**
     * @return string
     */
    public function getQrCode(): string
    {
        return $this->qrCode;
    }

    /**
     * @param string $qrCode
     */
    public function setQrCode(string $qrCode): void
    {
        $this->qrCode = $qrCode;
    }
}
