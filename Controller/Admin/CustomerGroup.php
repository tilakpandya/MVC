<?php

namespace Controller\Admin;

class CustomerGroup extends \Controller\Core\Admin
{
    
    public function gridAction()    //print all data in asso array 
    {       
       try {       
            $layout = $this->getLayout();
            $grid = \Mage::getModel('Block\Admin\CustomerGroup\Grid');
            
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
            $edit = \Mage::getBlock('Block\Admin\CustomerGroup\Edit');
            
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
               $customer = \Mage::getModel('Model\CustomerGroup');
               
                if ($id = (int) $this->getRequest()->getGet("id")){
                     $customer = $customer->load($id);  
                     if (!$customer) {
                         throw new Exception("Record not found");     
                     } 
                }else {
                    $customer->createdat = date('Y-m-d H:i:s');   
                }
                
                $customerData = $this->getRequest()->getPost('customergroup');
                $customer->setData($customerData);
                if( $customer->save()){
                    $this->getMessage()->setSuccess('Record Set Successfully');
                }else {
                    $this->getMessage()->setFailure('Unable To Set Record');
                } 
                   
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $this->redirect('grid','Admin_CustomerGroup',null,true);
    }
    
    public function DeleteAction()
    {
        try {
            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new Exception('Id Invalid');
            }
            $customer = \Mage::getModel('Model\CustomerGroup');
            $customerRow = $customer->load($id)->getData()['id'];

           /*  print_r($customerRow);
            die;    */ 
            if ($customer->delete($customerRow)) {
                $this->getMessage()->setSuccess('Record Deleted Successfully');
            }else{
                $this->getMessage()->setFailure('Unable To Delete Record');
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid','Admin_customerGroup',null,true);  
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