<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class CustomerGroup extends \Model\Core\Table
{
    const ENABLED = 1;
    const DISABLED = 0;
    
    public function __construct() {

        parent::__construct();
        $this->setTableName('customer_group');
        $this->setPrimarykey('id');
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