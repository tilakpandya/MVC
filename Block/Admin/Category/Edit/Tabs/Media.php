<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::getBlock('Block\Admin\Category\Edit');

class Media extends \Block\Admin\Category\Edit
{
    protected $media=NULL;
    public function __construct() {
        $this->setTemplate('./View/Admin/category/edit/tabs/media.php');
    }
    
    public function getMedia()
    {
        if (!$this->media) {
          $this->setMedia(); 
        }
        return $this->media;
    }

    public function setMedia($media=NULL)
    { 
        if (!$media){
            $id = $this->getRequest()->getGet('id'); 
            $query = "SELECT * FROM `category_media` where `categoryId` = '{$id}'";
            $media = \Mage::getModel('Model\CategoryMedia')->fetchAll($query);
        }   
        $this->media = $media;
        return $this;
    }
    
    public function getStatusOptions()
     {
        return  [
            1=> "YES",
            0=> "NO"
        ]; 
     }

}


?>