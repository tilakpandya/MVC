<?php
namespace Block\Home;
\Mage::loadByClass('Block\Core\Template');
class CategoryPage extends \Block\Core\Template
{
    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\home\categorypage.php');
    }

    public function getCategory()
    {
       $query="SELECT * FROM `Category` WHERE `parentId` = '0'";
       $brands=\Mage::getModel('Model\category')->fetchAll($query);
       return $brands;
    }
}  