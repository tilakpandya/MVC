<?php
namespace Block\Core;
\Mage::getBlock('Block\Core\Template');

class Edit extends \Block\Core\Template 
{
    protected $tab=NULL;
    protected $tableRow = NULL;
    protected $tabClass = Null;

    public function __construct() {
        $this->setTemplate("./View/Core/edit.php");
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
        $block->setTableRow($this->getTableRow());
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
            $tab = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
        }   
       
        $this->tab = $tab;
        return $this;
    }

    public function getTabHtml()
    {     
        if($this->getRequest()->getGet('id')){
            echo $this->getTab()->toHtml();
        }   
        else{
            return null;
        }
    }

    public function getTableRow()
    {
        //echo 111;
       return $this->tableRow;
    }

    public function setTableRow(\Model\Core\Table $tableRow)
    {
         $this->tableRow = $tableRow;
        return $this;
    }

    public function getFormUrl()
    {
       return $this->getUrl()->getUrl('save',null,null,true);
    }

    public function getTabClass()
    {
        return $this->tabClass;
    }
 
    public function setTabClass($tabClass)
    {
        $this->tabClass = $tabClass;

        return $this;
    }
}

?>