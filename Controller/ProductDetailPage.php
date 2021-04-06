<?php
namespace Controller;
\Mage::loadByClass('Controller\Core\Customer');

class ProductDetailPage extends \Controller\Core\Customer
{
    public function viewAction()
    {
      try {            
            $layout = $this->getLayout();
            $grid = \Mage::getBlock('Block\Home\ProductDetailPage');
           
            $content = $layout->getChild('content');
            $content->addChild($grid,'grid'); 
            
            echo $layout->toHtml();  
                  
       } catch (Exception $th) {
          echo $th->getMessage();
       }
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
        echo"<pre>";
        print_r($pager);
    }
}

?>