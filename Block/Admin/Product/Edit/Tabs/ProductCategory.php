<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::getBlock('Block\Core\Edit');

class ProductCategory extends \Block\Core\Edit
{   
    protected $productCategory=null;
    public function __construct() {
        parent::__construct();
        $this->setTemplate('./View/Admin/product/edit/tabs/productcategory.php');
    }

    public function getCategory()
    {
        $id = $this->getRequest()->getGet('id'); 
        $query = "SELECT * FROM `category` WHERE `parentId` != '0' ";
        $media = \Mage::getModel('Model\Category')->fetchAll($query);
        return $media;    
            
    }


    public function getProductCategory()
    {
       if (!$this->productCategory) {
          $this->setProductCategory();
       }
        return $this->productCategory;
    }

    public function setProductCategory($productCategory=null)
    {
        $id = $this->getRequest()->getGet('id'); 
        if (!$productCategory) {
            $query = "SELECT * FROM `product_category` WHERE `productId`='{$id}'";
            $productCategory = \Mage::getModel('Model\ProductCategory')->fetchAll($query);
        }
        $this->productCategory = $productCategory;

        return $this;
    }
}

?>