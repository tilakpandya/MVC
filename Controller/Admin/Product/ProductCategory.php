<?php

namespace Controller\Admin\Product;

use Exception;

\Mage::loadByClass("Controller\Core\Admin");

class ProductCategory extends \Controller\Core\Admin
{
    public function __construct() 
    { 
        parent::__construct();
    }

    public function gridAction()    //print all data in asso array 
    {       
       try {       
            
            $layout = $this->getLayout();

            $grid = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\ProductCategory');
            
            $right = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
            
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
            $id = $this->getRequest()->getGet('id');
            $productCategory = $this->getRequest()->getPost('category');   
           
            
            foreach ($productCategory as $key) {
               $pro_cate = \Mage::getModel('Model\ProductCategory');
               $pro_cate->categoryId = $key;
               $pro_cate->productId = $id;

               if (array_key_exists($key,$productCategory)) {
                    $pro_cate->categoryId = $key;
               }
                if ($pro_cate->save()) {
                    $this->getMessage()->setSuccess('Record Set Successfully');
                }else{
                    $this->getMessage()->setFailure('Unable to Set Record');
                }   
               
            } 
           
        } catch (Exception $th) {
            echo $th->getMessage();
        }
        $this->redirect('grid');
    }

}