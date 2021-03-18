<?php
namespace Controller\Admin\Product;
\Mage::loadByClass("Controller\Core\Admin");

class GroupPrice extends \Controller\Core\Admin
{
    
    public function __construct() {
       
        parent::__construct();
    }
    
    public function gridAction()    //print all data in asso array 
    {       
       try {    
           $productId = $this->getRequest()->getGet('id');
           $product = \Mage::getModel("Model\Product")->load($productId);
           $right = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
         
           if (!$product) {
               throw new Exception("Record Not Found"); 
            }
            $layout = $this->getLayout();
            $grid = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\GroupPrice')->setTableRow($product);
            
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
            echo "<pre>";
            $groupData=$this->getRequest()->getPost('groupPrice');
            $productId = $this->getRequest()->getGet('id');
            

               foreach ($groupData['Exist'] as $groupId => $price) {
                    $productPrice = \Mage::getModel('Model\GroupPrice');
                    $query = "SELECT * FROM `product_customer_group_price`
                    WHERE `productId`='{$productId}' 
                    AND `customerGroupId` = '{$groupId}'"; 
                    
                    $productPrice->fetchRow($query);
                    $productPrice->price=$price;
                    if($productPrice->save()){
                        $this->getMessage()->setSuccess('Record Set Successfully');
                    }else {
                        $this->getMessage()->setFailure('Unable to Set Record');
                    } 
                }
         
                foreach ($groupData['New'] as $groupId => $price) {
                    $productPrice = \Mage::getModel('Model\GroupPrice');
                    $productPrice->customerGroupId = $groupId;
                    $productPrice->ProductId = $productId;
                    $productPrice->price = $price;
                    if($productPrice->save()){
                        $this->getMessage()->setSuccess('Record Set Successfully');
                    }else {
                        $this->getMessage()->setFailure('Unable to Set Record');
                    } 
                     
                } 
           /* print_r($productPrice);
           die;  */
        }
        catch (Exception $e) {
            echo $e->getMessage();   
        }
        $this->redirect('grid','Admin_Product_GroupPrice');        
    }
   
}

?>