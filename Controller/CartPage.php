<?php
namespace Controller;
\Mage::loadByClass('Controller\Core\Customer');

class CartPage extends \Controller\Core\Customer
{
    public function viewAction()
    {
      try {            
            $layout = $this->getLayout();
            $grid = \Mage::getBlock('Block\Home\CartPage');
           
            $content = $layout->getChild('content');
            $content->addChild($grid,'grid'); 
            
            echo $layout->toHtml();  
                  
       } catch (Exception $th) {
          echo $th->getMessage();
       }
    }

    /* public function addItemToCartAction()
    {
      try {            
            $product = \Mage::getModel('Model\Product');
            if ($id = $this->getRequest()->getGet('id')) {
                $product = $this->getCart();
            }
            //$product = $product->load($id);
            print_r($product);      
       } catch (Exception $th) {
          echo $th->getMessage();
       }
    }

    public function getCart()
    {
        $session = \Mage::getModel('Model\Admin\Session')->getId();
        $cart = \Mage::getModel('Model\Cart');
        
        if($cart->sessionId) {
          return $cart;  
        }

        
        print_r($session);
    } */
    
    public function pageAction()
    {
        $pager = \Mage::getController('Controller\Core\Pager');
        $query = "SELECT * FROM Product";
        $productCount = \mage::getModel('Model\Product')->getAdapter()->fetchOne($query);
        $pager->setTotalRecords($productCount);
        $pager->setRecordsPerPage(10);
        $pager->setCurrentPage($_GET['p']);
        $pager->calculate();
        echo"<pre>";
        print_r($pager);
    }
}

?>