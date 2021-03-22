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
    
    public function getShippingAddress()
    {
        $id = $this->getRequest()->getGet('id');
        $query = "SELECT * FROM `customer_address` WHERE `customerId`='{$id}' AND `addressType`='Shipping'";
        $customerAddress = \Mage::getModel('Model\CustomerAddress')->fetchAll($query);
        return $customerAddress;
    }

    public function getBilllingAddress()
    {
        $id = $this->getRequest()->getGet('id');
        $query = "SELECT * FROM `customer_address` WHERE `customerId`='{$id}' AND `addressType`='Billing'";
        $customerAddress = \Mage::getModel('Model\CustomerAddress')->fetchAll($query);
        return $customerAddress;
    }

    public function getId($id)
    {
       $id=$this->getController();
       $id->getRequest()->getGet('id');
       echo $id; 
    }
}

?>