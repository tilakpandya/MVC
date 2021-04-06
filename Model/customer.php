<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class Customer extends \Model\Core\Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    
    public function __construct() {

        parent::__construct();
        $this->setTableName('customer');
        $this->setPrimarykey('id');
    }   
    
     public function getStatusOptions()
     {
        return  [
            self::STATUS_DISABLED=> "Disabled",
            self::STATUS_ENABLED=> "Enabled"
        ]; 
     }


    public function getCustomerType($query=NULL)
    {
        //$id = $this->getRequest()->getGet('id'); 
        if (!$query) {
            $query = "SELECT `Name`, `id` FROM `customer_group`";
        }  
        $rows = $this->getAdapter()->fetchAll($query);
        if (!$rows) {
           return false;
        } 
        foreach ($rows as $key => &$value) {
             $row = new $this;
             $value =  $row->setData($value);
        } 
        return $rows;
    }

    public function getBillingAddress()
    {
        $query="SELECT * FROM `customer_address` WHERE `addressType`='Billing' AND `customerId` = '{$this->id}'";
        $address = \Mage::getModel('Model\CustomerAddress')->fetchRow($query);
        return $address;
    }

    public function getShippingAddress()
    {
        $query="SELECT * FROM `customer_address` WHERE `addressType`='Shipping' AND `customerId` = '{$this->id}'";
        $address = \Mage::getModel('Model\CustomerAddress')->fetchRow($query);
        return $address;
    }

}

?>