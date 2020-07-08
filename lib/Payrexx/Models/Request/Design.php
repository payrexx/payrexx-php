<?php

namespace Payrexx\Models\Request;

use Payrexx\Models\Base;

/**
 * Design request class
 *
 * @copyright Payrexx AG
 * @author    Payrexx Development Team <info@payrexx.com>
 * @package   \Payrexx\Models\Request
 */
class Design extends Base
{
    /** @var bool $default */
    private $default = false;

    /** @var string $name */
    private $name;

    /** @var string $fontFamily */
    private $fontFamily;

    /** @var string $fontSize */
    private $fontSize;

    /** @var string $textColor */
    private $textColor;

    /** @var string $textColorVPOS */
    private $textColorVPOS;

    /** @var string $linkColor */
    private $linkColor;

    /** @var string $linkHoverColor */
    private $linkHoverColor;

    /** @var string $buttonColor */
    private $buttonColor;

    /** @var string $buttonHoverColor */
    private $buttonHoverColor;

    /** @var string $background */
    private $background;

    /** @var string $backgroundColor */
    private $backgroundColor;

    /** @var string $headerBackground */
    private $headerBackground;

    /** @var string $headerBackgroundColor */
    private $headerBackgroundColor;

    /** @var string $emailHeaderBackgroundColor */
    private $emailHeaderBackgroundColor;

    /** @var string $headerImageShape */
    private $headerImageShape;

    /** @var bool $useIndividualEmailLogo */
    private $useIndividualEmailLogo = false;

    /** @var string $logoBackgroundColor */
    private $logoBackgroundColor;

    /** @var string $logoBorderColor */
    private $logoBorderColor;

    /** @var string $VPOSGradientColor1 */
    private $VPOSGradientColor1;

    /** @var string $VPOSGradientColor2 */
    private $VPOSGradientColor2;

    /**
     * @var bool $enableRoundedCorners
     */
    private $enableRoundedCorners;

    /** @var string $headerImage */
    private $headerImage;

    /** @var string $backgroundImage */
    private $backgroundImage;

    /** @var string $headerBackgroundImage */
    private $headerBackgroundImage;

    /** @var string $emailHeaderImage */
    private $emailHeaderImage;

    /**
     * {@inheritdoc}
     */
    public function getResponseModel()
    {
        return new \Payrexx\Models\Response\Design();
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @param bool $default
     */
    public function setDefault(bool $default): void
    {
        $this->default = $default;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFontFamily(): string
    {
        return $this->fontFamily;
    }

    /**
     * @param string $fontFamily
     */
    public function setFontFamily(string $fontFamily): void
    {
        $this->fontFamily = $fontFamily;
    }

    /**
     * @return string
     */
    public function getFontSize(): string
    {
        return $this->fontSize;
    }

    /**
     * @param string $fontSize
     */
    public function setFontSize(string $fontSize): void
    {
        $this->fontSize = $fontSize;
    }

    /**
     * @return string
     */
    public function getTextColor(): string
    {
        return $this->textColor;
    }

    /**
     * @param string $textColor
     */
    public function setTextColor(string $textColor): void
    {
        $this->textColor = $textColor;
    }

    /**
     * @return string
     */
    public function getTextColorVPOS(): string
    {
        return $this->textColorVPOS;
    }

    /**
     * @param string $textColorVPOS
     */
    public function setTextColorVPOS(string $textColorVPOS): void
    {
        $this->textColorVPOS = $textColorVPOS;
    }

    /**
     * @return string
     */
    public function getLinkColor(): string
    {
        return $this->linkColor;
    }

    /**
     * @param string $linkColor
     */
    public function setLinkColor(string $linkColor): void
    {
        $this->linkColor = $linkColor;
    }

    /**
     * @return string
     */
    public function getLinkHoverColor(): string
    {
        return $this->linkHoverColor;
    }

    /**
     * @param string $linkHoverColor
     */
    public function setLinkHoverColor(string $linkHoverColor): void
    {
        $this->linkHoverColor = $linkHoverColor;
    }

    /**
     * @return string
     */
    public function getButtonColor(): string
    {
        return $this->buttonColor;
    }

    /**
     * @param string $buttonColor
     */
    public function setButtonColor(string $buttonColor): void
    {
        $this->buttonColor = $buttonColor;
    }

    /**
     * @return string
     */
    public function getButtonHoverColor(): string
    {
        return $this->buttonHoverColor;
    }

    /**
     * @param string $buttonHoverColor
     */
    public function setButtonHoverColor(string $buttonHoverColor): void
    {
        $this->buttonHoverColor = $buttonHoverColor;
    }

    /**
     * @return string
     */
    public function getBackground(): string
    {
        return $this->background;
    }

    /**
     * @param string $background
     */
    public function setBackground(string $background): void
    {
        $this->background = $background;
    }

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return string
     */
    public function getHeaderBackground(): string
    {
        return $this->headerBackground;
    }

    /**
     * @param string $headerBackground
     */
    public function setHeaderBackground(string $headerBackground): void
    {
        $this->headerBackground = $headerBackground;
    }

    /**
     * @return string
     */
    public function getHeaderBackgroundColor(): string
    {
        return $this->headerBackgroundColor;
    }

    /**
     * @param string $headerBackgroundColor
     */
    public function setHeaderBackgroundColor(string $headerBackgroundColor): void
    {
        $this->headerBackgroundColor = $headerBackgroundColor;
    }

    /**
     * @return string
     */
    public function getEmailHeaderBackgroundColor(): string
    {
        return $this->emailHeaderBackgroundColor;
    }

    /**
     * @param string $emailHeaderBackgroundColor
     */
    public function setEmailHeaderBackgroundColor(string $emailHeaderBackgroundColor): void
    {
        $this->emailHeaderBackgroundColor = $emailHeaderBackgroundColor;
    }

    /**
     * @return string
     */
    public function getHeaderImageShape(): string
    {
        return $this->headerImageShape;
    }

    /**
     * @param string $headerImageShape
     */
    public function setHeaderImageShape(string $headerImageShape): void
    {
        $this->headerImageShape = $headerImageShape;
    }

    /**
     * @return bool
     */
    public function isUseIndividualEmailLogo(): bool
    {
        return $this->useIndividualEmailLogo;
    }

    /**
     * @param bool $useIndividualEmailLogo
     */
    public function setUseIndividualEmailLogo(bool $useIndividualEmailLogo): void
    {
        $this->useIndividualEmailLogo = $useIndividualEmailLogo;
    }

    /**
     * @return string
     */
    public function getLogoBackgroundColor(): string
    {
        return $this->logoBackgroundColor;
    }

    /**
     * @param string $logoBackgroundColor
     */
    public function setLogoBackgroundColor(string $logoBackgroundColor): void
    {
        $this->logoBackgroundColor = $logoBackgroundColor;
    }

    /**
     * @return string
     */
    public function getLogoBorderColor(): string
    {
        return $this->logoBorderColor;
    }

    /**
     * @param string $logoBorderColor
     */
    public function setLogoBorderColor(string $logoBorderColor): void
    {
        $this->logoBorderColor = $logoBorderColor;
    }

    /**
     * @return string
     */
    public function getVPOSGradientColor1(): string
    {
        return $this->VPOSGradientColor1;
    }

    /**
     * @param string $VPOSGradientColor1
     */
    public function setVPOSGradientColor1(string $VPOSGradientColor1): void
    {
        $this->VPOSGradientColor1 = $VPOSGradientColor1;
    }

    /**
     * @return string
     */
    public function getVPOSGradientColor2(): string
    {
        return $this->VPOSGradientColor2;
    }

    /**
     * @param string $VPOSGradientColor2
     */
    public function setVPOSGradientColor2(string $VPOSGradientColor2): void
    {
        $this->VPOSGradientColor2 = $VPOSGradientColor2;
    }

    /**
     * @return bool
     */
    public function isEnableRoundedCorners(): bool
    {
        return $this->enableRoundedCorners;
    }

    /**
     * @param bool $enableRoundedCorners
     */
    public function setEnableRoundedCorners(bool $enableRoundedCorners): void
    {
        $this->enableRoundedCorners = $enableRoundedCorners;
    }
}
