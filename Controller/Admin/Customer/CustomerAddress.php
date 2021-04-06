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
                $id = (int) $this->getRequest()->getGet("id");
                
                if ($id){

                    $shipping = $this->getRequest()->getPost('shipping');
                    $billing = $this->getRequest()->getPost('billing');
                    
                        if ($shipping) {
                            $query = "SELECT * FROM `customer_address` WHERE `customerId`='{$id}' AND `addressType`='Shipping'";
                            $customer = \Mage::getModel('Model\CustomerAddress')->fetchAll($query);
                            $customer=$customer[0];
                            if (!$customer) {
                                $customer = \Mage::getModel('Model\CustomerAddress');
                            }
                            
                            
                            $customer->customerId = $id;
                            $customer->addresstype = 'Shipping';
                            $customer->setData($shipping);
                            
                            if($customer->save()){
                                $this->getMessage()->setSuccess('Record Set Successfully');
                            }else {
                                $this->getMessage()->setFailure('Unable To Set Record');
                            } 
                             
                        }
                        if ($billing) {
                            $query = "SELECT * FROM `customer_address` WHERE `customerId`='{$id}' AND `addressType`='Billing'";
                            $customer = \Mage::getModel('Model\CustomerAddress')->fetchAll($query);
                            $customer=$customer[0];
                            if (!$customer) {
                                $customer = \Mage::getModel('Model\CustomerAddress');
                            }
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
         }catch (\Exception $e) {
            $this->getMessage()->setFailure('Unable To Set Record');
        }
        $this->redirect('grid','Admin_Customer_Customer',null,true);
    }
    
    public function DeleteAction()
    {
        try {
            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new \Exception('Id Invalid');
            }
            $customer = \Mage::getModel('Model\CustomerAddress');
            $customerRow = $customer->load($id)->getData()['id'];

            if ($customer->delete($customerRow)) {
                $this->getMessage()->setSuccess('Record Deleted Successfully');
            }else{
                $this->getMessage()->setFailure('Unable To Delete Record');
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid','Admin_Customer_customerAddress',null,true);  
    }

    
}

?>