<?php
namespace Block\Admin\Category\Edit;

class Tabs extends \Block\Core\Edit\Tabs
{
    
    public function prepareTabs()
    {
       //print_r($this->getTableRow());
       parent::prepareTabs();
       $this->addTabs('category',['lable'=>'Category Information','block'=>'Block\Admin\Category\Edit\Tabs\Form']);
       $this->addTabs('attribute',['lable'=>'Attribute','block'=> 'Block\Admin\Category\Edit\Tabs\Attribute']);
       $this->addTabs('media',['lable'=>'Media','block'=> 'Block\Admin\Category\Edit\Tabs\Media']);      
       $this->setDefaultTab('category');

       return $this;
    }


}

?>