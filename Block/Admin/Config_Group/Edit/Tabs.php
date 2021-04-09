<?php
namespace Block\Admin\Config_Group\Edit;

class Tabs extends \Block\Core\Edit\Tabs
{
    
    public function prepareTabs()
    {
       parent::prepareTabs();
       $this->addTabs('information',['lable'=>'Information','block'=>'Block\Admin\Config_Group\Edit\Tabs\Form']);
       $this->addTabs('configuration',['lable'=>'Configuration','block'=> 'Block\Admin\Config_Group\Edit\Tabs\Configuration']);
       $this->setDefaultTab('information');

       return $this;
    }
}

?>
