<?php
namespace Controller\Admin;

class Shipping extends \Controller\Core\Admin
{
    
    public function gridAction()    
    {   
        try {  
                $layout =  $this->getLayout();
                $grid = \Mage::getBlock('Block\Admin\Shipping\Grid');
               
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
            $edit = \Mage::getBlock('Block\Admin\Shipping\Edit');
            
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
                $shippings = \Mage::getModel('Model\Shipping');
                if ($id = (int) $this->getRequest()->getGet("id")){
                    $shippings = $shippings->load($id);  
                    if (!$shippings) {
                        throw new Exception("Record not found");     
                    } 
                    $shippings->updatedat = date('Y-m-d H:i:s');
                    
                }else {
                    
                    $shippings->createdat = date('Y-m-d H:i:s');
                    
                }
                echo "<pre>";
                $ShippingData = $this->getRequest()->getPost('shipping');    
                $shippings->setData($ShippingData);
                
                    if($shippings->save()){
                        $this->getMessage()->setSuccess('Record Set Successfully');
                    }else {
                        $this->getMessage()->setFailure('Unable To Set Record');
                    }      
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid','Admin_Shipping',null,true);
    }
    
    public function DeleteAction()
    {
        try {
                $id = $this->getRequest()->getGet('id');
                if (!$id) {
                    throw new Exception('Id Invalid');
                }
                $shippings = \Mage::getModel('Model\Shipping');
                $shippingsRow = $shippings->load($id)->getData()['id'];
                
                if ($shippings->delete($shippingsRow)) {
                    $this->getMessage()->setSuccess('Record Deleted Successfully');
                }else {
                    $this->getMessage()->setFailure('Unable To Delete Record');
                }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',Null,['id'=>null],true);  
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