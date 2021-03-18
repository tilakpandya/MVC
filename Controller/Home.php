<?php
namespace Controller;
\Mage::loadByClass('Controller\Core\Customer');

class Home extends \Controller\Core\Customer
{
    public function indexAction()
    {
        try {            

            $layout = $this->getLayout();
            $grid = \Mage::getModel('Block\Home\Index');
            /*echo "<pre>";
            print_r($content);
            die; */
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
        $pager->setTotalRecords(80);
        $pager->setRecordsPerPage(10);
        $pager->setCurrentPage($_GET['p']);
        $pager->calculate();
        echo"<pre>";
        print_r($pager);
    
    }
}

?>