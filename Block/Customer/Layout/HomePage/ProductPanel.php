<?php
namespace Block\Customer\Layout\HomePage;
\Mage::loadByClass('Block\Core\Template');
class ProductPanel extends \Block\Core\Template
{

    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\homepage\productpanel.php');
    }

    public function getProducts()
    {
      $query="SELECT * FROM `product` 
      INNER JOIN `media` ON `product`.`id` = `media`.`id`";
      return \Mage::getModel('Model\product')->fetchAll($query);
      
    }

}
?>