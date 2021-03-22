<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class Category extends \Model\Core\Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    
    public function __construct() {

        parent::__construct();
        $this->setTableName('category');
        $this->setPrimarykey('id');
    }   
    
     public function getStatusOptions()
     {
        return  [
            self::STATUS_DISABLED=> "Disabled",
            self::STATUS_ENABLED=> "Enabled"
        ]; 
     }

     public function updatePathId()
     {
        if (!$this->parentId) {
            $pathId = $this->id; //add category id as PathId if parent Category not found 
       }
       else
       {
            $parent = \Mage::getModel('Model\Category')->load($this->parentId);
            if (!$parent) {
                throw new Exception("Unable to load Parent.");
            }
           $pathId = $parent->pathId.'='.$this->id;     
       }     
       
       $this->pathId = $pathId;
       echo"<pre>";
       $this->save();
       return $this; 
     }

     public function updateChildrenPathIds($categorypathId,$parentId=Null)
     {
        
        $categorypathId = $categorypathId."=";
        $query = "SELECT * FROM `category` where `pathId` Like '{$categorypathId}%' ORDER BY `pathId` ASC";
        $categories = \Mage::getModel('Model\Category')->fetchAll($query);
         
        if ($categories) {
           foreach ($categories as $key => $row) {
             $row = \Mage::getModel('Model\Category')->load($row->id);
             if (!$parentId) {
                 $row->parentId = $parentId;
             }
             
            return $row->updatePathId();
           }
        } 
     }

     public function saveData()
     {   
        if (array_key_exists($this->getPrimaryKey(),$this->getData())) {
            $this->save();
           
            $this->updatePathId();
            $this->updateChildrenPathIds($this->pathId);
        }else{
            $this->save();
            $this->updatePathId();
        }
     }
    
}

?>