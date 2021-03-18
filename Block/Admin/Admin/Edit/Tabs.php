<?php
namespace Block\Admin\Admin\Edit;
\Mage::getBlock('Block\Core\Template');

class Tabs extends \Block\Core\Template
{
    protected $tabs=[];
    protected $defaultTab = null;
    public function __construct() {

       $this->setTemplate('./View/Admin/admin/edit/tabs.php');
       $this->prepareTabs();
    }

    public function prepareTabs()
    {
       $this->addTabs('Form',['lable'=>'Form Information','block'=> '\Block\Admin\Admin\Edit\Tabs\Form']);
       $this->addTabs('List',['lable'=>'Customer Group','block'=> '\Block\Admin\Admin\Edit\Tabs\CustomerGroup\Grid']);
     
       $this->setDefaultTab('Form');
      
       return $this;
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
       if (array_key_exists($key,$this->tabs)){
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
}

?>