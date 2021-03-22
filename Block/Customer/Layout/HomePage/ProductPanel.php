<?php
namespace Block\Customer\Layout\HomePage;
\Mage::loadByClass('Block\Core\Template');
class ProductPanel extends \Block\Core\Template
{

    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\homepage\productpanel.php');
    }

    public function getCategory()
    {
      $query="SELECT * FROM `Category` WHERE `parentId` = '0'";
      $brands=\Mage::getModel('Model\category')->fetchAll($query);
      return $brands;
    }

}
?>