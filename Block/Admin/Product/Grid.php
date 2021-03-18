<?php
namespace Block\Admin\Product;
\Mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $product=NULL;

    public function __construct() {
        parent::__construct();
        $this->setTemplate("./View/Admin/product/grid.php");
    }
    public function getProducts()
    {
        if (!$this->product) {
            $this->setProducts();
        }
        return $this->product;
    } 
    
    public function setProducts($product=NULL)
    {
        if (!$product){
            $product =\ Mage::getModel('Model\Product');
            $query = "SELECT * FROM `product`";
            echo $productRecord = $product->getAdapter()->fetchOne($query);
            die; 
        }
        $this->product = $product;
        return $this;
    }
    
}

?>