<?php
namespace Block\Customer\Layout\CategoryPage;
\Mage::loadByClass('Block\Core\Template');
class ProductListPage extends \Block\Core\Template
{

    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\categorypage\productlistpage.php');
    }

    public function getProductDetails()
    {
        $id = $this->getRequest()->getGet('id');
        $query = "SELECT `product`.`id`,`product`.`name`, `product`.`price` FROM `product` 
        LEFT JOIN `product_category` ON `product`.`id` = `product_category`.`productId` 
        WHERE `product_category`.`categoryId` = '{$id}'";
        return \Mage::getModel('Model\Product')->fetchAll($query);
        
    }

    public function getThumbnailPhoto($id)
    {
        $query = "SELECT `image` FROM `product` 
        LEFT JOIN `media` ON `product`.`id` = `media`.`productId`
        WHERE `product`.`id` = '{$id}'";
        return \Mage::getModel('Model\Product')->fetchRow($query);
    }
}
?>