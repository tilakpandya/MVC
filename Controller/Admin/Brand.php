<?php
namespace Controller\Admin;

class Brand extends \Controller\Core\Admin
{
  
    public function gridAction()    //print all data in asso array 
    {
        try { 

            $layout = $this->getLayout();
            $grid = \Mage::getBlock('Block\Admin\Brand\Grid');
            
            $content = $layout->getChild('content');
            $content->addChild($grid,'grid');

            echo $layout->toHtml();           
                   
        } catch (Exception $th) {
           echo $th->getMessage();
        }
        
    }
    
    public function formAction()
    {
        try {
            $layout = $this->getLayout();
            $edit = \Mage::getBlock('Block\Admin\Brand\Edit');
            
            $content = $layout->getChild('content');
            $content->addChild($edit,'edit');

            echo $layout->toHtml();  
       
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function saveAction()
    {
        try {
                $brand = \Mage::getModel('Model\Brand');
                $photo = $_FILES['image']['name'];
                $tmpName= $_FILES['image']['tmp_name'];
                $path = $brand->getImagePath();
                move_uploaded_file($tmpName,$path.$photo);
                $brand->image = $photo;
                
                if ($id = (int) $this->getRequest()->getGet("id")){
                    $brand = $brand->load($id);  
                    
                    if (!$brand) {
                        throw new Exception("Record not found");     
                    }     
                }
                $brandData = $this->getRequest()->getPost('brand');
                $brand->setData($brandData);

                echo "<pre>";
                print_r($brand);
               
                if($brand->save()){
                    $this->getMessage()->setSuccess('Record Set Successfully');
                }else {
                    $this->getMessage()->setFailure('Unable To Set Record');
                } 
       
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid','Admin_Brand',null,true);

    }
    
    public function _imageUploadAction()
    {    
        try {
                $image = \Mage::getModel('Model\Brand');
                $photo = $_FILES['image']['name'];
                $tmpName= $_FILES['image']['tmp_name'];
                $path = $image->getImagePath();
                move_uploaded_file($tmpName,$path.$photo);
                $image->image = $photo;
                echo "<pre>";
                print_r($_FILES);
                die;
                if($image->save()){
                    $this->getMessage()->setSuccess('Record Set Successfully');
                    
                }else {
                    $this->getMessage()->setFailure('Unable To Set Record');
                }  
            
            } catch (Exception $e) {
                echo $e->getMessage();
            
            }   
            $this->redirect('grid','Admin_Brand');
    }

    public function DeleteAction()
    {
        try {

            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new \Exception('Id Invalid');
            }            
            $brand = \Mage::getModel('Model\Brand'); 
            $brandRow = $brand->load($id)->getData()['id'];
            if ($brand->delete($brandRow)) {
                $this->getMessage()->setSuccess('Record Deleted Successfully');
            }else{
                $this->getMessage()->setFailure('Unable To Delete Record');
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid','Admin_Brand',null,true);
    }

    public function filterAction()
    {
        $filter = \Mage::getModel('Model\Admin\Filter');
        $filterData = $this->getRequest()->getPost('filter');
        $filter->setFilter($filterData);
        $this->redirect('grid');

    }

}

?>