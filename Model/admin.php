<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class Admin extends \Model\Core\Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    
    public function __construct(Type $var = null) {

        parent::__construct();
        $this->setTableName('admin');
        $this->setPrimarykey('id');
    }   
    
     public function getStatusOptions()
     {
        return  [
            self::STATUS_DISABLED=> "Disabled",
            self::STATUS_ENABLED=> "Enabled"
        ]; 
     }
}

?>