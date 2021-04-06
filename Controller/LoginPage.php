<?php
namespace Controller;

class LoginPage extends \Controller\Core\Customer
{
    public function indexAction()
    {
      try {            
            $layout = $this->getLayout();
            $grid = \Mage::getBlock('Block\Home\LoginPage');
           
            $content = $layout->getChild('content');

            $content->addChild($grid,'grid'); 
            
            echo $layout->toHtml();  
                  
       } catch (Exception $th) {
          echo $th->getMessage();
       }
    }

    public function RegisterAction()
    {
        try {
           
            $customerData = $this->getRequest()->getPost('Register');
            $customer = \Mage::getModel('Model\Customer');

            $customer->createdat = date('Y-m-d H:i:s');   
            $customer->status = "Enabled";    
            $customer->setData($customerData);
            
            if($customer->save()){
                $this->getMessage()->setSuccess('Record Set Successfully');
            }else {
                $this->getMessage()->setFailure('Unable To Set Record');
            }    
            
        } catch (Exception $e) {
            echo $e->getMessage();
           
        }
        $this->redirect('index','Home');
    }
    
    public function loginAction()
    {
        try {
            echo"<pre>";
            $email = $this->getRequest()->getPost('email');
            $password = $this->getRequest()->getPost('password');
            $query = "SELECT * FROM `customer` WHERE `email` = '{$email}' AND `password` = '{$password}'";
            $customer = \Mage::getModel('Model\Customer')->fetchRow($query);
            $session = \Mage::getModel('Model\customer\Session');

            if ($customer) {
                $session->customerId = $customer->id;
            }
            print_r($session->customerId);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->redirect('index','Home');

    }

    public function pageAction()
    {
        $pager = \Mage::getController('Controller\Core\Pager');
        $query = "SELECT * FROM Product";
        $productCount = \mage::getModel('Model\Product')->getAdapter()->fetchOne($query);
        $pager->setTotalRecords($productCount);
        $pager->setRecordsPerPage(10);
        $pager->setCurrentPage($_GET['p']);
        $pager->calculate();
       /*  echo"<pre>";
        print_r($pager); */
    }
}

?>