<?php
namespace Block\Admin\Config_Group\Edit;

class Tabs extends \Block\Core\Edit\Tabs
{
    
    public function prepareTabs()
    {
       //print_r($this->getTableRow());
       parent::prepareTabs();
       $this->addTabs('information',['lable'=>'Information','block'=>'Block\Admin\Config_Group\Edit']);
       $this->addTabs('configuration',['lable'=>'Configuration','block'=> 'Block\Admin\Config_Group\Edit\Tabs\Configuration']);
       $this->setDefaultTab('information');

       return $this;
    }

    public function getTabContent()
    {
        $tabBlock = $this->getTab();
        $tabs = $tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        
        if (!array_key_exists($tab,$tabs)) {
            return null;
        }
        
        $blockClassName = $tabs[$tab]['block'];
        $block = \Mage::getBlock($blockClassName);
        return $block->toHtml();
    }

    public function getTab()
    {
        if (!$this->tab) {
            $this->setTab();
        }
        return $this->tab;
    }

    public function setTab($tab=null)
    {
        if (!$tab) {
            $tab = \Mage::getBlock('Block\Admin\Config_Group\Edit\Tabs');
        }   
       
        $this->tab = $tab;
        return $this;
    }
}

?>