<?php

namespace Controller\Admin\Category;

\Mage::loadByClass("Controller\Core\Admin");
\Mage::loadByClass("Block\Core\Layout");

class Category extends \Controller\Core\Admin
{ 
    public function __construct() {
       
        parent::__construct();
    }
 
    public function gridAction()   
    {       
       try {
           
            $layout = $this->getLayout();
            $grid = \Mage::getModel('Block\Admin\Category\Grid');
            
            $content = $layout->getChild('content');
            $content->addChild($grid,'grid');
        
            echo $layout->toHtml();  
            /* $grid = Mage::getBlock('Block_Admin_Category_Grid');
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
                   
       } catch (Exception $th) {
          echo $th->getMessage();
       }
       
    }

    
    public function formAction()
    {
        try {

            $layout = $this->getLayout();
            $category = \Mage::getModel('Model\Category');
            $edit  = \Mage::getBlock('Block\Admin\Category\Edit');

            $content = $layout->getChild('content');
            $content->addChild($edit,'edit');
            
            if($id=$this->getRequest()->getGet('id')){
                $category = $category->load($id);
                if (!$category) {
                   throw new Exception("Unable to receive Data");
                   
                }
            }
            $edit->setTableRow($category); 
            echo $layout->toHtml(); 

           /*  $edit = Mage::getBlock('Block_Category_Edit');
            $formHtml=$edit->toHtml();

            $tab = Mage::getBlock('Block_Category_Edit_Tabs');
            $tabHtml = $tab->toHtml(); */

           /*  $response =[
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
            echo json_encode($response); */
           
        } catch (Exception $e) {
            echo $e->getMessage();
        }         
    }
    
    public function DeleteAction()
    {
        try {

            $category = \Mage::getModel('Model\Category');
            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new Exception('Id Invalid');
            }
            $categoryRow = $category->load($id)->getData()['id'];
            $pathId = $category->pathId;
            $parentId = $category->parentId;
            $category->updateChildrenPathIds($pathId,$parentId);
            $category->delete($categoryRow);
 
                
        } catch (Exception $e) {
            echo $e->getMessage();
           
        }  
        $this->redirect('grid');
 
    }

    public function sessionCoreAction()
    {
        $message = \Mage::getModel('Model\Admin\Message');
        echo"<pre>";
        $message->setSuccess("I'm doing good code");
        $this->redirect('sessionAdmin');
        //$message->destroy();
    }

    public function sessionAdminAction()
    {
        $message = \Mage::getModel('Model\Admin\Message');
        echo"<pre>";
        echo $message->getSuccess();
        $message->clearSuccess();
        //$message->destroy();
    }

    public function saveAction()
    {
        try {
               $category = \Mage::getModel('Model\Category');
              
               if ($id = (int) $this->getRequest()->getGet("id")){
                        $category = $category->load($id);  
                        if (!$category) {
                            throw new Exception("Record not found");     
                        } 
                        $category->updatedat = date('Y-m-d H:i:s');
            
                }else{

                    $category->createdat = date('Y-m-d H:i:s'); 
                }

               $postData = $this->getRequest()->getPost('category');
               $category->setData($postData);
              
               $category->saveData();
        
        
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',null,['id'=>null],true);
    }

    public function editAction(){
        if ($id = (int) $this->getRequest()->getGet("id")){
            $category = $category->load($id);  

            if (!$category) {
                throw new Exception("Record not found");     
            } 
            $category->updatedat = date('Y-m-d H:i:s');

           if ($category->parentId) {
         
               $parent = \Mage::getModel('Model\category')->load($category->parentId);
               if ($parent->pathId) {
                   $category->pathId = $parent->pathId.'='.$category->id;
                   $category->saveData();
               }   
           }
            else
           {
               $category->pathId = $category->id; //add category id as PathId if parent Category not found 
               $category->saveData();
           } 

       }else{
           $category->createdat = date('Y-m-d H:i:s');   
       }
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