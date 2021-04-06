<?php
namespace Block\Home;
\Mage::loadByClass('Block\Core\Template');
class ProductDetailPage extends \Block\Core\Template
{
    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\home\productdetailpage.php');
    }

    public function getProductDetails($id)
    {
        $query = "SELECT * FROM `product` 
        LEFT JOIN `media` ON `product`.`id` = `media`.`productId`
        WHERE `product`.`id` = '{$id}'";
        return \Mage::getModel('Model\Product')->fetchRow($query);
       
    }

}  