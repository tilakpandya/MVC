<?php
namespace Block\Customer\Layout\ProductDetailPage;
\Mage::loadByClass('Block\Core\Template');
class RelatedProductPanel extends \Block\Core\Template
{

    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\productdetailpage\relatedproductpanel.php');
    }

    public function getProducts()
    {
      $query="SELECT * FROM `product` 
      INNER JOIN `media` ON `product`.`id` = `media`.`id`";
      return \Mage::getModel('Model\product')->fetchAll($query);
      
    }
}
?>