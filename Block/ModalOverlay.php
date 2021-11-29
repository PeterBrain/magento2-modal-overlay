<?php

namespace PeterBrain\ModalOverlay\Block;

//use PeterBrain\ModalOverlay\Helper\Data;

use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Cms\Api\Data\BlockInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class ModalOverlay
 *
 * @category    PeterBrain
 * @package     PeterBrain_ModalOverlay
 * @copyright   Copyright (c) PeterBrain (https://peterbrain.com/)
 */
class ModalOverlay extends Template
{
  /**
   * @var BlockRepositoryInterface
   */
  private $blockRepository;

  /**
   * @var Data
   */
  protected $helperData;

  /**
   * ModalOverlay constructor.
   *
   * @param BlockRepositoryInterface $blockRepository
   * @param Context $context
   * @param array $data
   */
  public function __construct(
    \PeterBrain\ModalOverlay\Helper\Data $helperData,
    BlockRepositoryInterface $blockRepository,
    Context $context,
    array $data = []
  ) {
    $this->helperData = $helperData;
    $this->blockRepository = $blockRepository;

    parent::__construct($context, $data);
  }

  /**
   * Retrieve modal overlay content
   *
   * @param $identifier
   * @return bool|string
   */
  public function getContent($identifier)
  {
    /*$enabled = $this->helperData->getGeneralConfig('enable');*/

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
