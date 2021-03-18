<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class productCategory extends \Model\Core\Table
{
    protected $primaryKey = 'id';
    protected $tableName = 'product_category'; 
    protected $data=[];
    protected $adapter = NULL;
    
     public function __construct(Type $var = null) {
        parent::__construct();
        $this->setTableName('product_category');
        $this->setPrimarykey('id');
    } 

    public function getCategory($query=null)
    {
        if (!$query) {
            $query = "SELECT * FROM `category`";
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

   
}

?>