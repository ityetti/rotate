<?php
/**
 * Copyright © ITYetti
 * Open Software License (OSL 3.0)
 */

declare(strict_types=1);

namespace ITYetti\Rotate\Service;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    const XML_PATH_GENERAL_ENABLE = 'ityetti/rotate_view/enable';
    const XML_PATH_GENERAL_WIDTH = 'ityetti/rotate_view/width';
    const XML_PATH_GENERAL_HEIGHT = 'ityetti/rotate_view/height';
    const XML_PATH_GENERAL_FRAME_TIME = 'ityetti/rotate_view/frame_time';
    const XML_PATH_GENERAL_FRAMES = 'ityetti/rotate_view/frames';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Config constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return int
     */
    public function isEnabled(): int
    {
        return $this->getConfig(self::XML_PATH_GENERAL_ENABLE);
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->getConfig(self::XML_PATH_GENERAL_WIDTH);
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->getConfig(self::XML_PATH_GENERAL_HEIGHT);
    }

    /**
     * @return int
     */
    public function getFrameTime(): int
    {
        return $this->getConfig(self::XML_PATH_GENERAL_FRAME_TIME);
    }

    /**
     * @return int
     */
    public function getFrames(): int
    {
        return $this->getConfig(self::XML_PATH_GENERAL_FRAMES);
    }

    /**
     * Get config
     *
     * @param $configPath
     * @return mixed
     */
    private function getConfig($configPath)
    {
        return $this->scopeConfig->getValue($configPath, ScopeInterface::SCOPE_STORE);
    }
}
