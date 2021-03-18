<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class GroupPrice extends \Model\Core\Table
{
    const ENABLED = 1;
    const DISABLED = 0;
    
    public function __construct() {

        parent::__construct();
        $this->setTableName('product_customer_group_price');
        $this->setPrimarykey('entityId');
    }   
    
     public function getDefaultOptions()
     {
        return  [
            self::DISABLED=> 0,
            self::ENABLED=> 1
        ]; 
     }
}

?>