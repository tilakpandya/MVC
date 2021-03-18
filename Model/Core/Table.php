<?php
namespace Model\Core;
class Table 
{
    protected $primaryKey = NULL;
    protected $tableName = null; 
    protected $data=[];
    protected $adapter = NULL;
    
    public function __construct() {}

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
        return $this;
    }

    public function getTableName()
    {
        return $this->tableName;
    }
 
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function __set($key,$value) //to capture undefine variables
    {   
       $this->data[$key] = $value;
       return $this; 
    } 

    public function __get($key)
    {   
        if (!array_key_exists($key,$this->data)) {
           return null;
        }
      return $this->data[$key];    
    } 

    public function getAdapter()
    {
        if (!$this->adapter) {
           $this->setAdapter();
        }
        return $this->adapter;
    }

    public function setAdapter($adapter=NULL)
    {
        if (!$adapter) {
            $adapter = \Mage::getModel('Model\Core\Adapter');
        } 
        $this->adapter = $adapter;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }
 
    public function setData(array $data)
    {
        $this->data=array_merge($this->data,$data);
        return $this;
    }

    public function save()
    {
    
        if(array_key_exists($this->getPrimaryKey(),$this->data)){
            $keys=[];
            foreach ($this->getData() as $key => $value) {
               $keys[] = "`".$key."` = '".$value."'";
            }
            $id = array_shift($keys);
            
            $keys= implode(',',$keys); 
          
            $id = $this->getData()[$this->getPrimaryKey()];
         
            $query = "UPDATE `{$this->getTableName()}` SET {$keys}
            WHERE `{$this->getPrimaryKey()}`='{$id}'";
        
            
            $adapter = \Mage::getModel('Model\Core\Adapter');
            $adapter->update($query);
          
        }else {
 
            $keys = array_keys($this->getData());
            $values = array_values($this->getData());
          
            $keys= implode('`,`',$keys); 
            $values = implode("','",$values); 
           
            $query = "INSERT INTO `{$this->getTableName()}`(`{$keys}`) VALUES ('{$values}')";
            
            $adapter = \Mage::getModel('Model\Core\Adapter');;
            $id=$adapter->insert($query);
        }
        $this->load($id);
        return $this;
        
    }
    
    public function delete($id=null)
    {
        if ($id == null) {
           if (!array_key_exists($this->getPrimaryKey(),
           $this->getData())) {
             return false;
           }
           $id = $this->getData()[$this->getPrimaryKey()];
        }
       $query = "DELETE FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`='$id'"; 
       return $this->getAdapter()->delete($query);
    }
    
    public function load($value)
    {
       $value =(int) $value;
       $query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`='{$value}'";
       return $this->fetchRow($query);
    }

    public function fetchRow($query)
    {
        $row = $this->getAdapter()->fetchRow($query);
       if (!$row) {
          return false;
       } 
       $this->data= $row; 
       return $this;
    }

    public function fetchAll($query=NULL,$column=null,$order='DESC')
    {
        if (!$column) {
            $column = $this->getPrimaryKey();
        }
        if (!$query) {
            $query = "SELECT * FROM `{$this->getTableName()}` order by `{$column}` {$order}"; 
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

    public function fetchAll1($query=NULL)
    {
        if (!$query) {
            $query = "SELECT * FROM `{$this->getTableName()}`"; 
        }  
       $rows = $this->getAdapter()->fetchAll($query);
       if (!$rows) {
          return false;
       } 
       foreach ($rows as $key => &$value) {
            $row = new $this;
            $value =  $row->setData($value);
       }

       $collectionClassName = get_class($this).'_Collection';
       $collection = Mage::getModel($collectionClassName);
       $collection->setData($rows);
       unset($rows);
       return $rows;
    }
    
}

?>