<?php
namespace PeterBrain\ModalOverlay\Block;

use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Cms\Api\Data\BlockInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class ModalOverlay
 *
 * @author PeterBrain <peter.loecker@live.at>
 * @copyright Copyright (c) PeterBrain (https://peterbrain.com/)
 * @package PeterBrain\ModalOverlay\Block
 */
class ModalOverlay extends Template
{
    /**
     * @var BlockRepositoryInterface
     */
    private $blockRepository;

    /**
     * Constructor
     *
     * @param Context $context
     * @param BlockRepositoryInterface $blockRepository
     * @param array $data
     */
    public function __construct(
        Context $context,
        BlockRepositoryInterface $blockRepository,
        array $data = []
    ) {
        $this->blockRepository = $blockRepository;
        parent::__construct($context, $data);
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
            $block = $this->blockRepository->getById($identifier);
            $content = $block->getContent();
        } catch (LocalizedException $e) {
            $content = false;
        }

        return $content;
    }
}
