<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class Config extends \Model\Core\Table
{
    
    public function __construct() {

        parent::__construct();
        $this->setTableName('config');
        $this->setPrimarykey('configId');
    } 
     
}

?>