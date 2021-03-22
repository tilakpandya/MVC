<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::getBlock('Block\Admin\Product\Edit');

class Media extends \Block\Admin\Product\Edit
{
    protected $media=NULL;
    public function __construct() {
        parent::__construct();
        $this->setTemplate('./View/Admin/product/edit/tabs/media.php');
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
            $media = \Mage::getModel('Model\Media');
            $id = $this->getRequest()->getGet('id'); 
            $query = "SELECT * FROM `media` where `productId` = '{$id}'";
            $media=$media->fetchAll($query);
        }   
        
        $this->media = $media;
        return $this;
    }
}

?>