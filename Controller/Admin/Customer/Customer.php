<?php
namespace Controller\Admin\Customer;
\Mage::loadByClass("Controller\Core\Admin");

class Customer extends \Controller\Core\Admin
{
    public function __construct() {
        parent::__construct();
    }
    
    public function gridAction()    //print all data in asso array 
    {       
       try {       

            $layout = $this->getLayout();
            $grid = \Mage::getModel('Block\Admin\Customer\Grid');
            
            $content = $layout->getChild('content');
            $content->addChild($grid,'grid');
        
            echo $layout->toHtml();  
                  
       } catch (\Exception $th) {
          echo $th->getMessage();
       }
       
    }

    
    public function formAction()
    {
        try {

            $layout = $this->getLayout();
            $customer= \Mage::getModel('Model\Customer');
            $edit = \Mage::getBlock('Block\Admin\Customer\Edit');
            
            $content = $layout->getChild('content');
            $content->addChild($edit,'edit');

            if ($id=$this->getRequest()->getGet('id')) {
                $customer = $customer->load($id);
                if (!$customer) {
                   throw new \Exception("Unable to receive Data");
                   
                }
            }

            $edit->setTableRow($customer); 
            echo $layout->toHtml(); 
             
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
                
    }
    
    public function saveAction()
    {
        try {
               echo "<pre>";
               $customer = \Mage::getModel('Model\Customer');
                if ($id = (int) $this->getRequest()->getGet("id")){
                     $customer = $customer->load($id);  
                     if (!$customer) {
                         throw new \Exception("Record not found");     
                     } 
                     $customer->updatedat = date('Y-m-d H:i:s');
                }else {
                    $customer->createdat = date('Y-m-d H:i:s');   
                }
                
                $customerData = $this->getRequest()->getPost('customer');
                $customer->setData($customerData);
            
                if( $customer->save()){
                    $this->getMessage()->setSuccess('Record Set Successfully');
                }else {
                    $this->getMessage()->setFailure('Unable To Set Record');
                }       
        } catch (Exception $e) {
            echo $e->getMessage();
           
        }
        $this->redirect('grid',NULL,['id'=>null],true);
    }
    
    public function DeleteAction()
    {
        try {
                $id = $this->getRequest()->getGet('id');
                if (!$id) {
                    throw new Exception('Id Invalid');
                }
                $customer = \Mage::getModel('Model\Customer');
                $customerRow = $customer->load($id)->getData()['id'];
                /* print_r($customerRow);
                die(); */
                if ($customer->delete($customerRow)) {
                    $this->getMessage()->setSuccess('Record Deleted Successfully');
                }else{
                    $this->getMessage()->setFailure('Unable To Delete Record');
                }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',null,['id'=>null],true);  
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