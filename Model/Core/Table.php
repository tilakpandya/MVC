<?php
namespace Model\Core;
class Table 
{
    protected $primaryKey = NULL;
    protected $tableName = null; 
    protected $originalData = [];
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

    /* public function __get($key)
    {   
        if (!array_key_exists($key,$this->data)) {
           return null;
        }
      return $this->data[$key];    
    }  */

    public function __get($key)
    {   
        if (array_key_exists($key,$this->data)) {
           return $this->data[$key];
        }
        if (array_key_exists($key,$this->originalData)) {
            return $this->originalData[$key];
        }
      return null;    
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

   /*  public function save()
    {
        $primaryKey =(int) $this->{$this->getPrimaryKey()};
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
     */
    public function delete($id=null)
    {
        
        if ($id == null) {
           if (!array_key_exists($this->getPrimaryKey(),
           $this->getOriginalData())) {
             return false;
           }
        }
       
        $id = $this->getOriginalData()[$this->getPrimaryKey()];
        $query = "DELETE FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`='$id'"; 
        //die;
        return $this->getAdapter()->delete($query);
    }
    
    public function load($value,$optional=null)
    {
       $value =(int) $value;
       $query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`='{$value}'";
       $row = $this->getAdapter()->fetchRow($query);
       if (!$row) {
           return false;
       }
       $this->setOriginalData($row);
       $this->resetData();
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
            $value =  $row->setOriginalData($value);
       }

       return $rows;
    }

    public function fetchRow($query)
    {
        $row = $this->getAdapter()->fetchRow($query);
       if (!$row) {
          return false;
       } 
       $this->setOriginalData($row); 
       $this->resetData();
       return $this;
    }


    public function getOriginalData()
    {
        if (!$this->originalData) {
            $this->setOriginalData();
        }
        return $this->originalData;
    }

    public function setOriginalData($originalData)
    {
        $this->originalData = $originalData;

        return $this;
    }

    public function save()
    {
        
        if(array_key_exists($this->getPrimaryKey(),$this->data)){
            unset($this->data[$this->getPrimaryKey()]);
        }
        
        $id =(int) $this->{$this->getPrimaryKey()};
        
        if (!$this->data) {
           return false;
        } 
       
        if(array_key_exists($this->getPrimaryKey(),$this->originalData)){
            
            $keys=[];
            foreach ($this->getData() as $key => $value) {
               $keys[] = "`".$key."` = '".$value."'";
            }
            //$id = array_shift($keys);
            
            $keys= implode(',',$keys); 
          
            //$id = $this->getData()[$this->getPrimaryKey()];
            
            $query = "UPDATE `{$this->getTableName()}` SET {$keys} WHERE `{$this->getPrimaryKey()}`='{$id}'"; 
            echo "<br>";
            
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

    public function resetData()
    {
        $this->data = [];
        return $this;
    }

}

?>