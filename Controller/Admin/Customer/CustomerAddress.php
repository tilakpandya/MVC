<?php
namespace Controller\Admin\Customer;
\Mage::loadByClass("Controller\Core\Admin");

class CustomerAddress extends \Controller\Core\Admin
{
    public function __construct() {
        parent::__construct();
    }

    public function formAction()
    {
        try {
            
            $layout = $this->getLayout();
            $edit = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs\CustomerAddress\Edit');
            
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
                echo "<pre>";
                $customer = \Mage::getModel('Model\CustomerAddress');
               
                if ($id = (int) $this->getRequest()->getGet("id")){
                    //$customer = $customer->load($id);  
                    $customer->customerId = $id;
                    
                    if (!$customer) {
                        throw new Exception("Record not found");     
                    } 

                    $shipping = $this->getRequest()->getPost('shipping');
                    $billing = $this->getRequest()->getPost('billing');
                   
                    if($shipping == $billing){

                            $customer->addresstype = 'Both';
                            $customer->customerId = $id;
                            $customer->setData($shipping);
                            if($customer->save()){
                                $this->getMessage()->setSuccess('Record Set Successfully');
                            }else {
                                $this->getMessage()->setFailure('Unable To Set Record');
                            }
                        
                    }else{
                        if ($shipping) {
                            $customer = \Mage::getModel('Model\CustomerAddress');
                            $customer->customerId = $id;
                            $customer->addresstype = 'Shipping';
                            $customer->setData($shipping);
                            if( $customer->save()){
                                $this->getMessage()->setSuccess('Record Set Successfully');
                            }else {
                                $this->getMessage()->setFailure('Unable To Set Record');
                            }   
                        }
                        if ($billing) {
                            $customer = \Mage::getModel('Model\CustomerAddress');
                            $customer->customerId = $id;
                            $customer->addresstype = 'Billing';
                            $customer->setData($billing);

                            if( $customer->save()){
                                $this->getMessage()->setSuccess('Record Set Successfully');
                            }else {
                                $this->getMessage()->setFailure('Unable To Set Record');
                            } 
                        }
                    }
            }
         }catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->redirect('grid','Admin_Customer_Customer',null,true);
    }
    
    public function DeleteAction()
    {
        try {
            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new Exception('Id Invalid');
            }
            $customerRow = $customer->load($id)->getData()['id'];

            if ($customer->delete($customerRow)) {
                $this->getMessage()->setSuccess('Record Deleted Successfully');
            }else{
                $this->getMessage()->setFailure('Unable To Delete Record');
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid','Admin_Customer_customerAddress',null,true);  
    }

    
}

?>