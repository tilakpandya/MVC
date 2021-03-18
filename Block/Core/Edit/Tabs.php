<?php 
namespace Block\Core\Edit;
\Mage::getBlock('Block\Core\Template');

class Tabs extends \Block\Core\Template
{
    protected $tableRow = NULL;
    protected $tabs=[];
    protected $defaultTab = null;
     
    public function __construct() {
        $this->setTemplate('View/Core/edit/tabs.php');
        $this->prepareTabs();
    }

    public function getTabs()
    {
        return $this->tabs;
    }

    public function setTabs($tabs)
    {
        $this->tabs = $tabs;
        return $this;
    }

    public function addTabs($key, $tab = [])
    {
       $this->tabs[$key] = $tab;
       return $this;
    }

    public function removeTabs()
    {
       if (array_key_exists($key,$this->tabs)) {
           unset($this->tabs[$key]);
       }
    }

    public function setTab($key,$value)
    {
       $this->tabs[$key] = $value;
       return $this;
    }
    
    public function getTab($key=NULL)
    {
        if (!array_key_exists($key,$this->tabs)) {
            return NULL;
        }
        return $this->tabs[$key];
    }

    public function getDefaultTab()
    {
        return $this->defaultTab;
    }

    public function setDefaultTab($defaultTab)
    {
        $this->defaultTab = $defaultTab;
        return $this;
    }

    public function getTableRow()
    {
        return $this->tableRow;
    }

    public function setTableRow(\Model\Core\Table $tableRow)
    {
        $this->tableRow = $tableRow;
        return $this;
    }

    public function prepareTabs()
    {
        return $this;
    }
}

?>