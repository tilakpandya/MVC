<?php
namespace Controller\Admin;

class CMSPages extends \Controller\Core\Admin
{
    
    public function gridAction()  
    {   
       try {

            $layout = $this->getLayout();
            $grid = \Mage::getBlock('Block\Admin\CMSPages\Grid');
            
            $content = $layout->getChild('content');
            $content->addChild($grid,'grid');

            echo $layout->toHtml();
            /* $grid = Mage::getBlock('Block_Admin_CMSPages_Grid');
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
            $edit = \Mage::getBlock('Block\Admin\CMSPages\Edit');
            
            $content = $layout->getChild('content');
            $content->addChild($edit,'edit');

            echo $layout->toHtml();  
            /* $edit = Mage::getBlock('Block_Admin_CMSPages_Edit');
            $formHtml=$edit->toHtml();

            $response =[
                'status' => 'success',
                'message' => 'Excellent',
                'element' =>[
                    [
                        'selector' => '#contentHtml',
                        'html' =>  $formHtml
                    ],
                ]
            ];
            
            header("Content-type: application/json; charset=utf-8");
            echo json_encode($response);  */      
           
        } catch (Exception $e) {
            echo $e->getMessage();
        }
                
    }
    
    public function saveAction()
    {
       
        try {
               $cms = \Mage::getModel('Model\CMSPages');
                if ($id = (int) $this->getRequest()->getGet("id")){
                     $cms = $cms->load($id);  
                     if (!$cms) {
                         throw new Exception("Record not found");     
                     } 
                } else {
                    $cms->createdat = date('Y-m-d H:i:s');   
                }
                $cmsData = $this->getRequest()->getPost('cmsPages');
                $cms->setData($cmsData);
                if($cms->save()){
                    $this->getMessage()->setSuccess('Record Set Successfully');
                }else {
                    $this->getMessage()->setFailure('Unable to Set Record');
                } 
                
                /* $grid = Mage::getBlock('Block_CMSPages_Grid');
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
        $this->redirect('grid','Admin_CMSPages',null,true);
    }

    public function deleteAction()
    {
        try {

            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new Exception('Id Invalid');
            }
            $product = \Mage::getModel('Model\CMSPages');
            $productRow = $product->load($id)->getData()['id'];
            $product->delete($productRow);

            /* $grid = Mage::getBlock('Block_Admin_CMSPages_Grid');
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
        $this->redirect('grid','Admin_CMSPages',null,true);
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