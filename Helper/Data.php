<?php

namespace PeterBrain\ModalOverlay\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const CONFIG_MODULE_PATH = 'pb_modaloverlay';

    /**
     * @param string $code
     * @param null $storeId
     *
     * @return mixed
     */
    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field, ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * @param string $code
     * @param null $storeId
     *
     * @return mixed
     */
    public function getConfigGeneral($code = '', $storeId = null)
    {
        $code = ($code !== '') ? '/' . $code : '';

        return $this->getConfigValue(static::CONFIG_MODULE_PATH . '/general' . $code, $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return bool
     */
    public function isEnabled($storeId = null)
    {
        return $this->getConfigGeneral('enable', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return bool
     */
    public function getVisitedPagesThreshold($storeId = null)
    {
        return $this->getConfigGeneral('visited_pages_threshold', $storeId);
    }

}
