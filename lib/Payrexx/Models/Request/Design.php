<?php

/**
 * The Design request model
 *
 * @author    Payrexx Development <info@payrexx.com>
 * @copyright Payrexx AG
 * @since     v1.7.0
 */

namespace Payrexx\Models\Request;

use CURLFile;
use Payrexx\Models\Base;
use Payrexx\Models\Response\Design as ResponseDesign;

/**
 * Design request class
 *
 * @package Payrexx\Models\Request
 */
class Design extends Base
{
    protected int $default = 0;

    protected string $name;

    protected string $fontFamily;

    protected string $fontSize;

    protected string $textColor;

    protected string $textColorVPOS;

    protected string $linkColor;

    protected string $linkHoverColor;

    protected string $buttonColor;

    protected string $buttonHoverColor;

    protected string $background;

    protected string $backgroundColor;

    protected string $headerBackground;

    protected string $headerBackgroundColor;

    protected string $emailHeaderBackgroundColor;

    protected string $headerImageShape;

    protected array $headerImageCustomLink;

    protected int $useIndividualEmailLogo = 0;

    protected string $logoBackgroundColor;

    protected string $logoBorderColor;

    protected string $VPOSGradientColor1;

    protected string $VPOSGradientColor2;

    protected int $enableRoundedCorners;

    protected string $VPOSBackground;

    protected string|CURLFile $headerImage;

    protected string|CURLFile $backgroundImage;

    protected string|CURLFile $headerBackgroundImage;

    protected string|CURLFile $emailHeaderImage;

    protected int $offset;

    protected int $limit;

    protected string|CURLFile $VPOSBackgroundImage;

    public function isDefault(): bool
    {
        return (bool)$this->default;
    }

    public function setDefault(bool $default): void
    {
        $this->default = (int)$default;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getFontFamily(): string
    {
        return $this->fontFamily;
    }

    public function setFontFamily(string $fontFamily): void
    {
        $this->fontFamily = $fontFamily;
    }

    public function getFontSize(): string
    {
        return $this->fontSize;
    }

    public function setFontSize(string $fontSize): void
    {
        $this->fontSize = $fontSize;
    }

    public function getTextColor(): string
    {
        return $this->textColor;
    }

    public function setTextColor(string $textColor): void
    {
        $this->textColor = $textColor;
    }

    public function getTextColorVPOS(): string
    {
        return $this->textColorVPOS;
    }

    public function setTextColorVPOS(string $textColorVPOS): void
    {
        $this->textColorVPOS = $textColorVPOS;
    }

    public function getLinkColor(): string
    {
        return $this->linkColor;
    }

    public function setLinkColor(string $linkColor): void
    {
        $this->linkColor = $linkColor;
    }

    public function getLinkHoverColor(): string
    {
        return $this->linkHoverColor;
    }

    public function setLinkHoverColor(string $linkHoverColor): void
    {
        $this->linkHoverColor = $linkHoverColor;
    }

    public function getButtonColor(): string
    {
        return $this->buttonColor;
    }

    public function setButtonColor(string $buttonColor): void
    {
        $this->buttonColor = $buttonColor;
    }

    public function getButtonHoverColor(): string
    {
        return $this->buttonHoverColor;
    }

    public function setButtonHoverColor(string $buttonHoverColor): void
    {
        $this->buttonHoverColor = $buttonHoverColor;
    }

    public function getBackground(): string
    {
        return $this->background;
    }

    public function setBackground(string $background): void
    {
        $this->background = $background;
    }

    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    public function getHeaderBackground(): string
    {
        return $this->headerBackground;
    }

    public function setHeaderBackground(string $headerBackground): void
    {
        $this->headerBackground = $headerBackground;
    }

    public function getHeaderBackgroundColor(): string
    {
        return $this->headerBackgroundColor;
    }

    public function setHeaderBackgroundColor(string $headerBackgroundColor): void
    {
        $this->headerBackgroundColor = $headerBackgroundColor;
    }

    public function getEmailHeaderBackgroundColor(): string
    {
        return $this->emailHeaderBackgroundColor;
    }

    public function setEmailHeaderBackgroundColor(string $emailHeaderBackgroundColor): void
    {
        $this->emailHeaderBackgroundColor = $emailHeaderBackgroundColor;
    }

    public function getHeaderImageShape(): string
    {
        return $this->headerImageShape;
    }

    public function setHeaderImageShape(string $headerImageShape): void
    {
        $this->headerImageShape = $headerImageShape;
    }

    public function getHeaderImageCustomLink(): array
    {
        return $this->headerImageCustomLink;
    }

    /**
     * Use language ID as array key. Array key 0 or datatype 'string' will be handled as the default value (Will be used
     * for each activated frontend language).
     */
    public function setHeaderImageCustomLink(string|array $headerImageCustomLink): void
    {
        if (is_string($headerImageCustomLink)) {
            $this->headerImageCustomLink = [$headerImageCustomLink];
        } elseif (is_array($headerImageCustomLink)) {
            $this->headerImageCustomLink = $headerImageCustomLink;
        }
    }

    public function isUseIndividualEmailLogo(): bool
    {
        return (bool)$this->useIndividualEmailLogo;
    }

    public function setUseIndividualEmailLogo(bool $useIndividualEmailLogo): void
    {
        $this->useIndividualEmailLogo = (int)$useIndividualEmailLogo;
    }

    public function getLogoBackgroundColor(): string
    {
        return $this->logoBackgroundColor;
    }

    public function setLogoBackgroundColor(string $logoBackgroundColor): void
    {
        $this->logoBackgroundColor = $logoBackgroundColor;
    }

    public function getLogoBorderColor(): string
    {
        return $this->logoBorderColor;
    }

    public function setLogoBorderColor(string $logoBorderColor): void
    {
        $this->logoBorderColor = $logoBorderColor;
    }

    public function getVPOSGradientColor1(): string
    {
        return $this->VPOSGradientColor1;
    }

    public function setVPOSGradientColor1(string $VPOSGradientColor1): void
    {
        $this->VPOSGradientColor1 = $VPOSGradientColor1;
    }

    public function getVPOSGradientColor2(): string
    {
        return $this->VPOSGradientColor2;
    }

    public function setVPOSGradientColor2(string $VPOSGradientColor2): void
    {
        $this->VPOSGradientColor2 = $VPOSGradientColor2;
    }

    public function isEnableRoundedCorners(): bool
    {
        return (bool)$this->enableRoundedCorners;
    }

    public function setEnableRoundedCorners(bool $enableRoundedCorners): void
    {
        $this->enableRoundedCorners = (int)$enableRoundedCorners;
    }

    public function getHeaderImage(): string|CURLFile
    {
        return $this->headerImage;
    }

    public function setHeaderImage(string|CURLFile $headerImage): void
    {
        $this->headerImage = $headerImage;
    }

    public function getBackgroundImage(): string|CURLFile
    {
        return $this->backgroundImage;
    }

    public function setBackgroundImage(string|CURLFile $backgroundImage): void
    {
        $this->backgroundImage = $backgroundImage;
    }

    public function getHeaderBackgroundImage(): string|CURLFile
    {
        return $this->headerBackgroundImage;
    }

    public function setHeaderBackgroundImage(string|CURLFile $headerBackgroundImage): void
    {
        $this->headerBackgroundImage = $headerBackgroundImage;
    }

    public function getEmailHeaderImage(): string|CURLFile
    {
        return $this->emailHeaderImage;
    }

    public function setEmailHeaderImage(string|CURLFile $emailHeaderImage): void
    {
        $this->emailHeaderImage = $emailHeaderImage;
    }

    public function getVPOSBackground(): string
    {
        return $this->VPOSBackground;
    }

    public function setVPOSBackground(string $VPOSBackground): void
    {
        $this->VPOSBackground = $VPOSBackground;
    }

    public function getVPOSBackgroundImage(): string|CURLFile
    {
        return $this->VPOSBackgroundImage;
    }

    public function setVPOSBackgroundImage(string|CURLFile $VPOSBackgroundImage): void
    {
        $this->VPOSBackgroundImage = $VPOSBackgroundImage;
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

    public function getResponseModel(): ResponseDesign
    {
        return new ResponseDesign();
    }
}
