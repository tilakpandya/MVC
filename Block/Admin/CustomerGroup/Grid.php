<?php
namespace Block\Admin\CustomerGroup;
\Mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $customer_group=NULL;

    public function __construct() {
        $this->setTemplate('./View/Admin/customergroup/grid.php');
    }

    public function getCustomer_group()
    {
        if (!$this->customer_group) {
          $this->setCustomer_group(); 
         }
        return $this->customer_group;
    }

    public function setCustomer_group($customer_group=NULL)
    {
        if (!$customer_group) {
            $customer_group = \Mage::getModel('Model\CustomerGroup');
            $customer_group=$customer_group->fetchAll();   
        }
        $this->customer_group = $customer_group;
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