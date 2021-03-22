<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class CustomerAddress extends \Model\Core\Table
{
    const TYPE_SHIPPING = 1;
    const TYPE_BILLING = 0;
    
    public function __construct() {

        parent::__construct();
        $this->setTableName('customer_address');
        $this->setPrimarykey('id');
    }   
    
     public function getAddressType()
     {
        return  [
            self::TYPE_SHIPPING=> "Shipping",
            self::TYPE_BILLING=> "Billing"
        ]; 
     }

     public function deleteAddress($id=null)
     {
         if ($id == null) {
            if (!array_key_exists($this->getPrimaryKey(),
            $this->getData())) {
              return false;
            }
            $id = $this->getData()[$this->getPrimaryKey()];
         }
        $query = "DELETE FROM `customer_address` WHERE `id`='$id'"; 
        return $this->getAdapter()->delete($query);
     } 
}

?>