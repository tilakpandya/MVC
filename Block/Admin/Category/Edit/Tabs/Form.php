<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::getBlock('Block\Core\Edit');

class Form extends \Block\Core\Edit
{
    protected $categoryOptions = null;
    protected $category=NULL;

    public function __construct() {
        parent::__construct();
        $this->setTemplate('./View/Admin/category/edit/tabs/form.php');
    }

    public function getId($id)
    {
       $id=$this->getController();
       $id->getRequest()->getGet('id');
       echo $id; 
    }
    
    public function getTitle()
    {
       return 'Category Add/Edit';
    }

    public function getParentOptions()
    {
       $categories = \Mage::getModel("Model\Category")->fetchAll();
       return $categories;
    }

    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }


    public function getCategoriesOptions()
    {
        if ($this->categoryOptions) {
            return $this->categoryOptions;
        }

        $query = "SELECT `id`,`name`,`pathId` FROM `category`";
        $this->categoryOptions = $this->getTableRow()->getAdapter()->fetchPairs($query);            

        return $this->categoryOptions;
    }

    
    public function getFeatured()
    {
       return [
           1=>"YES",
           2=>"NO"
       ];
    }

}

?>