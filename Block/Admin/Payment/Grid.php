<?php
namespace Block\Admin\Payment;
\Mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $payments=NULL;

    public function __construct() {
        $this->setTemplate("./View/Admin/payment/grid.php");
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
        if (!$payments){
            $payments = \Mage::getModel('Model\Payment'); 
            $payments=$payments->fetchAll();   
        }
        
        $this->payments = $payments;
        return $this;
    }
   
}

?>