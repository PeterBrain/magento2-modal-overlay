<?php
namespace PeterBrain\ModalOverlay\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Class ModalOverlayHelper
 *
 * @author PeterBrain <peter.loecker@live.at>
 * @copyright Copyright (c) PeterBrain (https://peterbrain.com/)
 * @package PeterBrain\ModalOverlay\Helper
 */
class ModalOverlayHelper extends AbstractHelper
{
    const CONFIG_MODULE_PATH = 'pb_modaloverlay';

    /**
     * @param string $code
     * @param null $storeId
     *
     * @return mixed
     */
    public function getConfigGeneral(string $code = '', $storeId = null)
    {
        $code = ($code !== '') ? '/' . $code : '';

        return $this->getConfigValue(static::CONFIG_MODULE_PATH . '/general' . $code, $storeId);
    }

    /**
     * @param string $configPath
     * @param null $storeId
     *
     * @return string
     */
    public function getConfigValue(string $configPath, $storeId = null): string
    {
        return $this->scopeConfig->getValue(
            $configPath,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * @param null $storeId
     *
     * @return string
     */
    public function isEnabled($storeId = null): string
    {
        return $this->getConfigGeneral('enable', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return string
     */
    public function getVisitedPagesThreshold($storeId = null): string
    {
        return $this->getConfigGeneral('visited_pages_threshold', $storeId);
    }
}
