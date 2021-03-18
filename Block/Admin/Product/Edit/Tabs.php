<?php
namespace Block\Admin\Product\Edit;
\Mage::getBlock('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
    
    public function prepareTabs()
    {
       //print_r($this->getTableRow());
       parent::prepareTabs();
       $this->addTabs('product',['lable'=>'Product Information','block'=>'Block\Admin\Product\Edit\Tabs\Form']);
       $this->addTabs('category',['lable'=>'Category','block'=>'Block\Admin\Product\Edit\Tabs\ProductCategory']);
       $this->addTabs('attribute',['lable'=>'Attribute','block'=> 'Block\Admin\Product\Edit\Tabs\Attribute']);
       $this->addTabs('media',['lable'=>'Media Information','block'=> 'Block\Admin\Product\Edit\Tabs\Media']);
       $this->addTabs('groupPrice',['lable'=>'Product Group Price','block'=> 'Block\Admin\Product\Edit\Tabs\GroupPrice']);

       $this->setDefaultTab('product');

       return $this;
    }


}

?>