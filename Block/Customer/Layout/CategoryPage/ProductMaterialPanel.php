<?php
namespace Block\Customer\Layout\CategoryPage;
\Mage::loadByClass('Block\Core\Template');
class ProductMaterialPanel extends \Block\Core\Template
{

    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\categorypage\productmaterialpanel.php');
    }

    public function getCategory()
    {
      $query="SELECT * FROM `Category` WHERE `parentId` = '0'";
      $brands=\Mage::getModel('Model\category')->fetchAll($query);
      return $brands;
    }
}
?>