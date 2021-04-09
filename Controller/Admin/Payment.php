<?php
namespace Controller\Admin;

class Payment extends \Controller\Core\Admin
{
  
    public function __construct() {
        
        parent::__construct();
    }
    
    public function gridAction()    //print all data in asso array 
    {
        try { 

            $layout = $this->getLayout();
            $grid = \Mage::getBlock('Block\Admin\Payment\Grid');
            
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
            $edit = \Mage::getBlock('Block\Admin\Payment\Edit');
            
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
            
            $payment = \Mage::getModel('Model\Payment'); 
            if ($id = (int) $this->getRequest()->getGet("id")){
                 $payment = $payment->load($id);  
                 if (!$payment) {
                     throw new Exception("Record not found");     
                 } 
                 $payment->updatedat = date('Y-m-d H:i:s');
                 
            }else {
                
                $payment->createdat = date('Y-m-d H:i:s');
                
            }

            $paymentData = $this->getRequest()->getPost('payment');
            $payment->setData($paymentData);

                if($payment->save()){
                    $this->getMessage()->setSuccess('Record Set Successfully');
                }else {
                    $this->getMessage()->setFailure('Unable To Set Record');
                } 
       
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid','Admin_Payment',null,true);

    }
    
    public function DeleteAction()
    {
        try {

            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new Exception('Id Invalid');
            }            
            $payment = \Mage::getModel('Model\Payment'); 
            $paymentRow = $payment->load($id)->getData()['id'];
            if ($payment->delete($paymentRow)) {
                $this->getMessage()->setSuccess('Record Deleted Successfully');
            }else{
                $this->getMessage()->setFailure('Unable To Delete Record');
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid','Admin_Payment',null,true);
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