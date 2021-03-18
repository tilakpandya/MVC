<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class Payment extends \Model\Core\Table
{
    protected $primaryKey = 'id';
    protected $tableName = 'payment'; 
    protected $data=[];
    protected $adapter = NULL;
   
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function __construct(Type $var = null) {

        parent::__construct();
        $this->setTableName('payment');
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