<?php
namespace Block\Admin\Customer\Edit;
\Mage::getBlock('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{

    public function prepareTabs()
    {
       parent::prepareTabs();
       $this->addTabs('Form',['lable'=>'Form Information','block'=> 'Block\Admin\Customer\Edit\Tabs\Form']);
       $this->addTabs('Address',['lable'=>'Address Information','block'=> 'Block\Admin\Customer\Edit\Tabs\CustomerAddress\Edit']);
     
       $this->setDefaultTab('Form');
      
       return $this;
    }

}

?>