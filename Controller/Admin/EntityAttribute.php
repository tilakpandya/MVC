<?php
namespace Controller\Admin;

class EntityAttribute extends \Controller\Core\Admin
{
  
    public function __construct() {
        parent::__construct();
    }
   
    public function gridAction()    //print all data in asso array 
    {       
       try {       
            $layout = $this->getLayout();
            $grid = \Mage::getModel('Block\Admin\EntityAttribute\Grid');
            
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

            $layout= $this->getLayout();
            $content = $layout->getChild('content');
            $edit = \Mage::getBlock('Block\Admin\EntityAttribute\Edit');

            $content->addChild($edit,'edit');
           
            echo $layout->toHtml();  
           
        } catch (Exception $e) {
            echo $e->getMessage();
        }
                
    }
    
    public function saveAction()
    {
        try {
               echo "<pre>";
               $attribute = \Mage::getModel('Model\EntityAttribute');
                if ($id = (int) $this->getRequest()->getGet("id")){
                     $attribute = $attribute->load($id);  
                     if (!$attribute) {
                         throw new Exception("Record not found");     
                     } 
                }
                
                $attributeData = $this->getRequest()->getPost('attribute');
                $attribute->setData($attributeData);

                if($attribute->save()){
                    $this->getMessage()->setSuccess('Record Set Successfully');
                }else {
                    $this->getMessage()->setFailure('Unable To Set Record');
                }       
        } catch (Exception $e) {
            echo $e->getMessage();
           
        }
        $this->redirect('grid',null,['id'=>null],true);
    }
    
    public function optionAction()
    {
        $id = $this->getRequest()->getGet('id');      
        $attribute = \Mage::getModel('Model\EntityAttribute')->load($id);  
        
        $layout= $this->getLayout(); 
        
        $edit = \Mage::getBlock('Block\Admin\EntityAttribute\Option')->setAttribute($attribute);
        $content = $layout->getChild('content');
        $content->addChild($edit,'edit');
    
           
        echo $layout->toHtml(); 
      
    }

    public function DeleteAction()
    {
        try {
            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new Exception('Id Invalid');
            }
            $attribute = \Mage::getModel('Model\EntityAttribute');
            $attributeRow = $attribute->load($id)->getData()['id'];
           
            if ($attribute->delete($attributeRow)) {
                $this->getMessage()->setSuccess('Record Deleted Successfully');
            }else{
                $this->getMessage()->setFailure('Unable To Delete Record');
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',null,['id'=>null],true);  
    }

    public function updateAction()
    {
        $i=0;
        echo "<pre>";
        $groupData=$this->getRequest()->getPost();
        $id = $this->getRequest()->getGet('id');
        /* print_r($groupData);
        die; */
        foreach ($groupData['Exist'] as $optionId => $value) {
            $query = "SELECT * FROM `attribute_option` 
            WHERE `attributeId` = '{$id}'
            AND `optionId` = '{$optionId}'";
            
            $attribute = \Mage::getModel('Model\Attribute\Option');
            $attribute->fetchRow($query);
            $attribute->name= $value['name'];
            $attribute->sortOrder= $value['sortOrder'];
           
           if($attribute->save()){
                $this->getMessage()->setSuccess('Record Updated Successfully');
            }else{
                $this->getMessage()->setFailure('Unable To Update Record');
            }
        }
        

        if (array_key_exists('New', $groupData)) {
            $newOptions = $this->getRequest()->getPost('new');
            $name = $groupData['New']['Name'];
            $sortOrder = $groupData['New']['sortOrder'];
            $optionArray = [];
            
            for ($i = 0; $i < count($name); $i++) {
                $optionArray[$i] = ['name' => $name[$i], 'sortOrder' => $sortOrder[$i], 'attributeId' => $id];
            }
           
            foreach ($optionArray as $column) {

                $options = \Mage::getModel('Model\Attribute\Option');
                $options->name = $column['name'];
                $options->sortOrder = $column['sortOrder'];
                $options->attributeId = $column['attributeId'];

                if($options->save()){
                    $this->getMessage()->setSuccess('Record Updated Successfully');
                }else{
                    $this->getMessage()->setFailure('Unable To Update Record');
                }  
            }   
        } 
        $this->redirect('option','Admin_EntityAttribute',null,true);
    }


    public function removeAction()
    {
        try {
            $optionId = $this->getRequest()->getGet('optionId');
            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new Exception('Id Invalid');
            }
            $option = \Mage::getModel('Model\Attribute\Option');
            $optionRow = $option->load($optionId)->getData()['optionId'];
            
            if ($option->delete($attributeRow)) {
                $this->getMessage()->setSuccess('Record Deleted Successfully');
            }else{
                $this->getMessage()->setFailure('Unable To Delete Record');
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('option',null,['id'=>$id,'optionId'=>NULL],true);
    }

    public function filterAction()
    {
        $filter = \Mage::getModel('Model\Admin\Filter');
        $filterData = $this->getRequest()->getPost('filter');
        $filter->setFilter($filterData);
        $this->redirect('grid');

    }

    public function testAction()
    {
        echo"<pre>";
        $query = "SELECT * FROM `attribute` WHERE `entityTypeId` = 'product'";
        $attributes = \Mage::getModel('Model\entityAttribute')->fetchAll($query);

        foreach ($attributes as $key => $attribute) {
           print_r($attribute->getOptions());
        }
    }
}
?>