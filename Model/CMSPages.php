<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class CMSPages extends \Model\Core\Table
{
    protected $primaryKey = 'id';
    protected $tableName = 'cms_page'; 
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
        $this->setTableName('cms_page');
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