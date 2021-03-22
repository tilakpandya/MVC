<?php
namespace Block\Admin\Brand;
\Mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $brand=NULL;

    public function __construct() {
        $this->setTemplate("./View/Admin/brand/grid.php");
    }
    
    public function getBrand()
    {
        if (!$this->brand) {
           $this->setBrand();
        }
        return $this->brand;
    }

    public function setBrand($brand=NULL)
    {
        if (!$brand){
            $brand = \Mage::getModel('Model\Brand'); 
            $brand=$brand->fetchAll();   
        }
        $this->brand = $brand;

        return $this;
    }
}

?>