<?php
namespace Block\Admin\Brand;
\Mage::getBlock('Block\Core\Template');

class Edit extends \Block\Core\Template
{
    protected $brand=NULL;
    
    public function __construct() {
       $this->setTemplate("./View/Admin/brand/form.php");
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
        if ($brand) {
            $this->brand = $brand;
            return $this;
        }
        
        $brand = \Mage::getModel('Model\Brand');    
            
        if ($id =$this->getRequest()->getGet('id'))
        {
            $brand = $brand->load($id);  
        } 
        
        $this->brand = $brand;
        return $this;
    }

    public function getId($id)
    {
       $id=$this->getController();
       $id->getRequest()->getGet('id');
       echo $id; 
    }
}

?>