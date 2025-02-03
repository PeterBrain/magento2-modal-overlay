<?php
namespace PeterBrain\ModalOverlay\Block;

use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Cms\Api\Data\BlockInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use PeterBrain\ModalOverlay\Helper\ModalOverlayHelper as ModalOverlayHelper;

/**
 * Class ModalOverlay
 * modal overlay block
 *
 * @author PeterBrain <peter.loecker@live.at>
 * @copyright Copyright (c) PeterBrain (https://peterbrain.com/)
 */
class ModalOverlay extends Template
{
    /**
     * @var BlockRepositoryInterface
     */
    private $_blockRepository;

    /**
     * @var ModalOverlayHelper
     */
    protected $_modalOverlayHelper;

    /**
     * Constructor
     *
     * @param Context $context
     * @param BlockRepositoryInterface $blockRepository
     * @param ModalOverlayHelper $modalOverlayHelper
     * @param array $data
     */
    public function __construct(
        Context $context,
        BlockRepositoryInterface $blockRepository,
        ModalOverlayHelper $modalOverlayHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_blockRepository = $blockRepository;
        $this->_modalOverlayHelper = $modalOverlayHelper;
    }

    /**
     * @return boolean
     */
    public function isEnabled(): bool
    {
        return $this->_modalOverlayHelper->isEnabled();
    }

    /**
     * @return int
     */
    public function getVisitedPagesThreshold(): int
    {
        return $this->_modalOverlayHelper->getVisitedPagesThreshold();
    }

    /**
     * Get modal overlay content
     *
     * @param $identifier
     *
     * @return bool|string
     */
    public function getContent($identifier)
    {
        try {
            /** @var BlockInterface $block */
            $block = $this->_blockRepository->getById($identifier);
            $content = $block->getContent();
        } catch (LocalizedException $e) {
            $content = false;
        }

        return $content;
    }
}
