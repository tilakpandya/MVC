<?php
namespace Block\Customer\Layout\ProductDetailPage;
\Mage::loadByClass('Block\Core\Template');
class ProductDetailPanel extends \Block\Core\Template
{

    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\productdetailpage\productdetailpanel.php');
    }

    public function getProductDetail($id)
    {
        $query = "SELECT * FROM `product` 
        LEFT JOIN `media` ON `product`.`id` = `media`.`productId`
        WHERE `product`.`id` = '{$id}'";
        return \Mage::getModel('Model\Product')->fetchRow($query);
    }
}
?>