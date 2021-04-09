<?php

namespace Controller\Admin\Product;
\Mage::loadByClass("Controller\Core\Admin");

class Media extends \Controller\Core\Admin
{
    
    public function __construct() {
       
        parent::__construct();
    }
    
    public function gridAction()    //print all data in asso array 
    {       
       try {       
            
            $layout = $this->getLayout();
            $grid = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\Media');
            $right = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
            
            $content = $layout->getChild('content');
            $content->addChild($grid,'grid');

            $rightbar = $layout->getChild('rightbar');
            $rightbar->addChild($right,'edit');
        
            echo $layout->toHtml();  
                  
       } catch (Exception $th) {
          echo $th->getMessage();
       }
       
    }

    public function saveAction()
    {
        try {
           
            if ($this->getRequest()->getGet('tab') == 'media') {
                echo "<pre>";
                $media = \Mage::getModel('Model\Media');
                $label = $this->getRequest()->getPost('label');
                $small = $this->getRequest()->getPost('small');
                $thumbnail = $this->getRequest()->getPost('thumbnail');
                $base = $this->getRequest()->getPost('base');
                $gallery = $this->getRequest()->getPost('gallery'); 

               
                foreach ($label as $key => $value) {
                    $media->load($key);
                    $media->label = $value;
                   
                    if ($key == $small) {
                        $media->small = 1;
                    }else {
                        $media->small = 0;
                    }

                    if ($key == $thumbnail) {
                        $media->thumbnail = 1;
                    }else {
                        $media->thumbnail = 0;
                    }

                    if ($key == $base) {
                        $media->base = 1;
                    }else {
                        $media->base = 0;
                    }

                    if (array_key_exists($key,$gallery)) {
                        $media->gallery = 1;
                    }else {
                        $media->gallery = 0;
                    }
                    
                    if($media->save()){
                        $this->getMessage()->setSuccess('Record Set Successfully');
                    }else{
                        $this->getMessage()->setFailure('Unable to Set Record');
                    }  
                   
                }
               
            }
            
            $this->redirect('grid','Admin_Product_Media');
                 
        }
        catch (Exception $e) {
            echo $e->getMessage();
           
        }
    }

    public function _imageUploadAction()
    {    
        try {
                $image = \Mage::getModel('Model\Media');
                $photo = $_FILES['image']['name'];
                $tmpName= $_FILES['image']['tmp_name'];
                $path = $image->getImagePath();
                move_uploaded_file($tmpName,$path.$photo);
                $image->image = $photo;
                $image->productId= $this->getRequest()->getGet('id');
                echo "<pre>";
                print_r($image);
                
                if($image->save()){
                    $this->getMessage()->setSuccess('Record Set Successfully');
                    
                }else {
                    $this->getMessage()->setFailure('Unable To Set Record');
                }  
            
            } catch (Exception $e) {
                echo $e->getMessage();
            
            }   
            $this->redirect('grid','Admin_Product_Media');
    }

    public function DeleteAction()
    {
        try {
            $image = \Mage::getModel('Model\Media');
          
            $mediaData = $this->getRequest()->getPost('media');
            
            foreach ($mediaData as $key => $value) {
                foreach ($value as $id => $remove) {
                  
                   if ($image->delete($remove['remove'])) {
                        $this->getMessage()->setSuccess('Record Deleted Successfully');
                    }
                }
            }
            
            
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid','Admin_Product_Media');  
    }

    
    
    
}

?>