<?php

namespace Controller\Admin\Category;
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
            $grid = \Mage::getBlock('Block\Admin\Category\Edit\Tabs\Media');
            $right = \Mage::getBlock('Block\Admin\Category\Edit\Tabs');

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
           
                $media = \Mage::getModel('Model\CategoryMedia');
                print_r($label = $this->getRequest()->getPost('label'));
                print_r($icon = $this->getRequest()->getPost('icon'));
                print_r($active = $this->getRequest()->getPost('active'));
                print_r($base = $this->getRequest()->getPost('base'));
                print_r($banner = $this->getRequest()->getPost('banner')); 
                
                foreach ($label as $key => $value) {
                    $media->load($key);
                    $media->label = $value;
                    $media->active = $active;
                    if ($key == $icon) {
                        $media->icon = 1;
                    }else {
                        $media->icon = 0;
                    }

                    if ($key == $base) {
                        $media->base = 1;
                    }else {
                        $media->base = 0;
                    }

                    if (array_key_exists($key,$banner)) {
                        $media->banner = 1;
                    }else {
                        $media->banner = 0;
                    }
                    
                    if($media->save()){
                        $this->getMessage()->setSuccess('Record Set Successfully');
                    }  
                }
               
            
            $this->redirect('grid');
                  
        }
        catch (Exception $e) {
            echo $e->getMessage();
           
        }
    }

    public function _imageUploadAction()
    {    
        try {
                $image = \Mage::getModel('Model\CategoryMedia');
                $photo = $_FILES['image']['name'];
                $tmpName= $_FILES['image']['tmp_name'];
                $path = $image->getImagePath();
                move_uploaded_file($tmpName,$path.$photo);
                $image->image = $photo;
                $image->categoryId= $this->getRequest()->getGet('id');
                
                if($image->save()){
                    $this->getMessage()->setSuccess('Record Set Successfully');
                    
                }else {
                    $this->getMessage()->setFailure('Unable To Set Record');
                } 
            
            } catch (Exception $e) {
                echo $e->getMessage();
            
            }   
           $this->redirect('grid','Admin_Category_Media');
    }

    public function DeleteAction()
    {
        try {
            $image = \Mage::getModel('Model\CategoryMedia');
          
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
        $this->redirect('grid');  
    }
    
}

?>