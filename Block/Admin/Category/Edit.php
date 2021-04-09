<?php
namespace Block\Admin\Category;

class Edit extends \Block\Core\Edit
{
    protected $categoryOptions = null;
    protected $category=NULL;
    
    public function __construct() {
        parent::__construct();
        $this->setTab(\Mage::getBlock('Block\Admin\Category\Edit\Tabs')); 
        $this->setTabClass(\Mage::getBlock('Block\Admin\Category\Edit\Tabs'));
     }

     public function getId($id)
     {
        $id=$this->getController();
        $id->getRequest()->getGet('id');
        echo $id; 
     }
 
     public function getFormUrl()
     {
         return $this->getUrl->getUrl('save');
     }
     public function getTitle()
     {
        return 'Category Form';
     }
}

?>