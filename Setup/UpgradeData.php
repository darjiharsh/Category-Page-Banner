<?php
 
namespace CWH\Category\Setup;
 
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
 
class UpgradeData implements UpgradeDataInterface
{
    private $eavSetupFactory;
 
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
 
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
 
        if ($context->getVersion() && version_compare($context->getVersion(), '1.0.1') < 0) {
 
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
 
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Category::ENTITY,
                'category_collection',
                [
                    'group' => '',
                    'type' => 'int',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Category Collection',
                    'input' => 'boolean',
                    'class' => '',
                    'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '0',
                ]
            );
        }
 
        $setup->endSetup();
    }
}