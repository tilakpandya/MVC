<?php
namespace Block\Customer\Layout\ProductDetailPage;
\Mage::loadByClass('Block\Core\Template');
class ProductPhotosPanel extends \Block\Core\Template
{

    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\productdetailpage\productphotospanel.php');
    }

    public function getThumbnailPhoto($id)
    {
        $query = "SELECT `image` FROM `product` 
        LEFT JOIN `media` ON `product`.`id` = `media`.`productId`
        WHERE `product`.`id` = '{$id}'";
        return \Mage::getModel('Model\Product')->fetchRow($query);
    }

    public function getPhotos($id)
    {
        $query = "SELECT `image` FROM `product` 
        LEFT JOIN `media` ON `product`.`id` = `media`.`productId`
        WHERE `product`.`id` = '{$id}'";
        return \Mage::getModel('Model\Product')->fetchAll($query);
    }

}
?>