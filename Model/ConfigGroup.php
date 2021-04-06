<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class ConfigGroup extends \Model\Core\Table
{
    
    public function __construct() {

        parent::__construct();
        $this->setTableName('config_group');
        $this->setPrimarykey('groupId');
    } 
     
}

?>