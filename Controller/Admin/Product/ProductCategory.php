<?php

namespace Controller\Admin\Product;
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
            $prod_cat = \Mage::getModel('Model\productCategory');
            $grid = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\Category');
            $right = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
            
            $content = $layout->getChild('content');
            $content->addChild($grid,'grid');

            $rightbar = $layout->getChild('rightbar');
            $rightbar->addChild($right,'edit');
            print_r($prod_cat);
            die;
            $grid->setTableRow($prod_cat); 
            echo $layout->toHtml();  
                  
       } catch (Exception $th) {
          echo $th->getMessage();
       }
       
    }

}