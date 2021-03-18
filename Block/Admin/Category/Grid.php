<?php
namespace Block\Admin\Category;
\Mage::loadByClass('Block\core\Template');

class Grid extends \Block\Core\Template
{
    protected $category=NULL;
    protected $categoryOptions = NULL;
    public function __construct() {
        parent::__construct();
        $this->setTemplate("./View/Admin/category/grid.php");
    }
    public function getCategory()
    {
        if (!$this->category) {
            $this->setCategory();
        }
        return $this->category;
    } 
     
    public function setCategory($category=NULL)
    {
        if (!$category){
            $category = \Mage::getModel('Model\Category')->fetchAll(null,'pathId','ASC');            
        }   
        $this->category = $category;
        return $this;
    }

    public function getCategoriesOptions()
    {
        if ($this->categoryOptions) {
            return $this->categoryOptions;
        }
        $query = "SELECT `id`,`name` FROM `category`";
        $category = \Mage::getModel('Model\Category')->fetchAll($query);

        if ($category) {
           foreach ($this->getCategory() as $key => $value) {
               $this->categoryOptions[$value->id] = $value->name;
           }
           $this->categoryOptions = ['-1'=>'select'] + $this->categoryOptions;
        } 
        return $this->categoryOptions;
    }

    public function getName($category)
    {

        $categoryModel = \Mage::getModel('Model\Category');
        
        if (!$this->categoryOptions) {
            echo $query = "SELECT `id`,`name` FROM `{$category->getTableName()}`";
            $this->categoryOptions = $this->getCategory()->getAdapter()->fetchPairs($query);      
        }      
        $pathIds = explode('=', $category->pathId);
        foreach ($pathIds as $key => &$id) {
            //print_r($id);
          if (array_key_exists($id,$this->categoryOptions)) {
                $id = $this->categoryOptions[$id];
            }
        }
        $name = implode('/',$pathIds);
        return $name;
        
    }
    
}

?>