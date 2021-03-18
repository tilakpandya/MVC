<?php
namespace Block\Admin\Customer\Edit\Tabs\CustomerAddress;
\Mage::getBlock('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{
    protected $customerAddress=NULL;
    
    public function __construct() {
        parent::__construct();
        $this->setTemplate("./View/Admin/customer/edit/tabs/customeraddress/edit.php");
        $this->setTab(\Mage::getBlock('Block\Admin\Customer\Edit\Tabs'));
        $this->setTabClass(\Mage::getBlock('Block\Admin\Customer\Edit\Tabs'));
    }
    
    /* public function getCustomerAddress()
    {
        if (!$this->customers) {
          $this->setCustomerAddress(); 
         }
        return $this->customers;
    }

    public function setCustomerAddress($customers=NULL)
    {
        if ($customers) {
            $this->customers = $customers;
            return $this;
        }
        $customers = \Mage::getModel('Model\CustomerAddress'); 
           
        if ($id = $this->getRequest()->getGet('id'))
        {
            $customers = $customers->load($id);  
        }else{
            return $this;
        } 
        
        $this->customers = $customers;
        return $this;
    } */

    public function getCustomerAddress()
    {
        if(!$this->customerAddress){
            $this->setCustomerAddress();
        }
        return $this->customerAddress;
    }

    public function setCustomerAddress($customerAddress=NULL)
    {
        $id = $this->getRequest()->getGet('id');
        if (!$customerAddress) {
            $query = "SELECT * FROM `customer_address` WHERE `customerId`='{$id}'";
            $customerAddress = \Mage::getModel('Model\CustomerAddress')->fetchAll($query);
        }
        $this->customerAddress = $customerAddress;
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