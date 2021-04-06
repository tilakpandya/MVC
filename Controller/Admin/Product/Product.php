<?php

namespace Controller\Admin\Product;
\Mage::loadByClass("Controller\Core\Admin");

class Product extends \Controller\Core\Admin
{
    
    public function __construct() {
       
        parent::__construct();
    }

    public function gridAction()  
    {   
       try {
            $layout = $this->getLayout();
            $grid = \Mage::getBlock('Block\Admin\Product\Grid');
            
            $content = $layout->getChild('content');
            $content->addChild($grid,'grid');
           
            echo $layout->toHtml();

            /* $response=[
                'status' => 'message',
                'message' => 'hello',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $contentHtml,
                    ],
                ],
            ];
            header("Content-type:application/json; charset=utf-8");
            echo json_encode($response); */
                  
       } catch (Exception $th) {
          echo $th->getMessage();
       }
    }

    
    public function formAction()
    {
        try {

            $layout = $this->getLayout();
            $edit = \Mage::getBlock('Block\Admin\Product\Edit');
            $product = \Mage::getModel('Model\Product');

            $content = $layout->getChild('content');
            $content->addChild($edit,'edit');
            
            if ($id=$this->getRequest()->getGet('id')) {
                $product = $product->load($id);
                if (!$product) {
                   throw new Exception("Unable to receive Data");
                   
                }
            }
            $edit->setTableRow($product); 
            echo $layout->toHtml();
            
            /* $edit = Mage::getBlock('Block_Admin_Product_Edit');
            $formHtml=$edit->toHtml();
            $tab = Mage::getBlock('Block_Admin_Product_Edit_Tabs');
            $tabHtml = $tab->toHtml();

            $response =[
                'status' => 'success',
                'message' => 'Excellent',
                'element' =>[
                    [
                        'selector' => '#contentHtml',
                        'html' =>  $formHtml
                    ],
                    [
                        'selector' => '#rightHtml',
                        'tab' =>  $tabHtml
                    ]
                ]
            ];
            
            header("Content-type: application/json; charset=utf-8");
            echo json_encode($response);    */   
           
        } catch (Exception $e) {
            echo $e->getMessage();
        }
                
    }
    
    public function saveAction()
    {
       
        try {
               $product = \Mage::getModel('Model\Product');
                if ($id = (int) $this->getRequest()->getGet("id")){
                     $product = $product->load($id);  
                     if (!$product) {
                         throw new Exception("Record not found");     
                     } 
                     $product->updatedat = date('Y-m-d H:i:s');
                }else {
                    $product->createdat = date('Y-m-d H:i:s');   
                }

                $ProductData = $this->getRequest()->getPost('product');
                $product->setData($ProductData);
                if($product->save()){
                    $this->getMessage()->setSuccess('Record Set Successfully');
                }else{
                    $this->getMessage()->setFailure('Unable to Set Record');
                }  
                
                /* $grid = Mage::getBlock('Block_Admin_Product_Grid');
                $contentHtml=$grid->toHtml();
               
                $response=[
                    'status' => 'message',
                    'message' => 'hello',
                    'element' => [
                    [
                            'selector' => '#contentHtml',
                            'html' => $contentHtml,
                        ],
                    ],
                ];
                header("Content-type:application/json; charset=utf-8");
                echo json_encode($response); */
 
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid','Admin_Product_Product',null,true);
    }
    
    
    public function indexAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
        
        $response =[
            'status' => 'success',
            'message' => 'Excellent',
            'element' =>[
                [
                    'selector' => '#contentHtml',
                    'html' =>  $gridHtml
                ]
            ]
        ];
        
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);
    }

    public function deleteAction()
    {
        try {

                $id = $this->getRequest()->getGet('id');
                if (!$id) {
                    throw new Exception('Id Invalid');
                }
                $product = \Mage::getModel('Model\Product');
                $productRow = $product->load($id)->getData()['id'];
                if($product->delete($productRow)){

                }else {
                
            }
            /* $grid = Mage::getBlock('Block_Admin_Product_Grid');
            $gridHtml= $grid->toHtml();
            
            $response =[
                'status' => 'success',
                'message' => 'Delete Data',
                'element' =>[
                    [
                        'selector' => '#contentHtml',
                        'html' => $gridHtml
                    ],
                ]
            ];
            header("Content-type: application/json; charset=utf-8");
            echo json_encode($response); */
        } 
        catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid','Admin_Product_Product',null,true);
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