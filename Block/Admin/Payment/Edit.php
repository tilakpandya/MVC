<?php
namespace Block\Admin\Payment;
\Mage::getBlock('Block\Core\Template');

class Edit extends \Block\Core\Template
{
    protected $payments=NULL;
    
    public function __construct() {
       $this->setTemplate("./View/Admin/payment/form.php");
    }

    
    public function getPayment()
    {
        if (!$this->payments) {
          $this->setPayment(); 
         }
        
        return $this->payments;
    }

    public function setPayment($payments=NULL)
    {
        if ($payments) {
            $this->payments = $payments;
            return $this;
        }
        
        $payments = \Mage::getModel('Model\Payment');    
            
        if ($id =$this->getRequest()->getGet('id'))
        {
            $payments = $payments->load($id);  
        } 
        
        $this->payments = $payments;
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