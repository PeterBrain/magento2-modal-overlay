<?php

namespace PeterBrain\ModalOverlay\Setup;

use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $blockFactory;

    public function __construct(
        BlockFactory $blockFactory
    ) {
        $this->blockFactory = $blockFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $cmsBlockData = [
            'title' => 'Modal Overlay Content',
            'identifier' => 'modal-overlay_popup',
            'content' => 'This is a static block with the identifier: \'modal-overlay_popup\'. Edit it in \'Content > Blocks\'.',
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];

        $this->blockFactory->create()->setData($cmsBlockData)->save();
    }
}
