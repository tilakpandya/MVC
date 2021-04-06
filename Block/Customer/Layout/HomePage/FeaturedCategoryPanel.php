<?php
namespace Block\Customer\Layout\HomePage;
\Mage::loadByClass('Block\Core\Template');
class FeaturedCategoryPanel extends \Block\Core\Template
{

    public function __construct() 
    {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\homepage\featuredcategorypanel.php');
    }

    public function getFeaturedCategory()
    {
      $query = "SELECT `name`,`base`,`image` FROM `category` 
      LEFT JOIN `category_media` ON `category`.`id` = `category_media`.`categoryId` 
      WHERE `featured`='YES'";
      $brands=\Mage::getModel('Model\category')->fetchAll($query);
      return $brands;
    }

}
?>