<?php
namespace Controller\Admin;

class Admin extends \Controller\Core\Admin
{
    public function __construct() {
        parent::__construct();
    }

    public function gridAction()    //print all data in asso array 
    {       
       try {            
           
            $layout = $this->getLayout();
            $grid = \Mage::getModel('Block\Admin\Admin\Grid');
            
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
            $content = $layout->getChild('content');
            $edit = \Mage::getBlock('Block\Admin\Admin\Edit');
            $content->addChild($edit,'edit');
           
            echo $layout->toHtml();  
           
        } catch (Exception $e) {
            echo $e->getMessage();
        }
                
    }
    
    public function saveAction()
    {
        try {
               $admin = \Mage::getModel('Model\Admin');
               
                if ($id = (int) $this->getRequest()->getGet("id")){
                     $admin = $admin->load($id);  
                     if (!$admin) {
                         throw new Exception("Record not found");     
                     } 
                     $admin->updatedat = date('Y-m-d H:i:s');
                }else {
                    
                    $admin->createdat = date('Y-m-d H:i:s');   
                }
                
                $adminData = $this->getRequest()->getPost('admin');
                $admin->setData($adminData);
                
                if($admin->save()){
                    $this->getMessage()->setSuccess('Record Set Successfully');
                }else {
                    $this->getMessage()->setFailure('Unable To Set Record');
                }
                   
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }  
        $this->redirect('grid','Admin_Admin'); 
        
    }
    
    public function DeleteAction()
    {
        try {
                $id = $this->getRequest()->getGet('id');

                $customer = \Mage::getModel('Model\Admin');
                $customerRow = $customer->load($id)->getData()['id'];
                if ($customer->delete($customerRow)) 
                {
                    $this->getMessage()->setSuccess('Record Deleted Successfully');
                }else {
                    $this->getMessage()->setFailure('Unable To Delete Record');
                }
            } catch (Exception $e) {
                $this->getMessage()->setFailure($e->getMessage());
            }  
        
            $this->redirect('grid','Admin_Admin');
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