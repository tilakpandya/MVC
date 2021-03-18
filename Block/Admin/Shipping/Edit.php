<?php
namespace Block\Admin\Shipping;
\Mage::getBlock('Block\Core\Template');

class Edit extends \Block\Core\Template
{
    protected $shipping=NULL;

    public function __construct() {
       $this->setTemplate("./View/Admin/shipping/edit.php");
    }
    public function getShipping()
    {
        if (!$this->shipping) {
          $this->setShipping(); 
         }
        return $this->shipping;
    }

    public function setShipping($shipping=NULL)
    {
        if ($shipping) {
            $this->shipping = $shipping;
            return $this;
        }
        
        $shipping = \Mage::getModel("Model\Shipping");
            
        if ($id =$this->getRequest()->getGet('id'))
        {
            $shipping = $shipping->load($id);  
        } 
           
        
        $this->shipping = $shipping;
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