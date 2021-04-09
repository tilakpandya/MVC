<?php
namespace Controller\Admin;

class Config extends \Controller\Core\Admin
{
  
    public function gridAction()    
    {
        try { 

            $layout = $this->getLayout();
            $grid = \Mage::getBlock('Block\Admin\Config_Group\Grid');
            
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
            $layout = $this->getLayout();
            $config = \Mage::getModel('Model\Config');
            $edit = \Mage::getBlock('Block\Admin\Config_Group\Edit');
            //$tabs = \Mage::getBlock('Block\Admin\Config_Group\Edit\Tabs');

            $content = $layout->getChild('content');
            //$content->addChild($tabs,'tabs');
            $content->addChild($edit,'edit');
            $edit->setTableRow($config);
            echo $layout->toHtml();  
       
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function configAction()
    {
        try {
            $layout = $this->getLayout();
            $config = \Mage::getModel('Model\ConfigGroup');
            $edit = \Mage::getBlock('Block\Admin\Config_Group\Edit\Tabs\Configuration');
            //$tabs = \Mage::getBlock('Block\Admin\Config_Group\Edit\Tabs');

            $content = $layout->getChild('content');
            $content->addChild($edit,'edit');
            $edit->setTableRow($config);
            //$content->addChild($tabs,'tabs');

            echo $layout->toHtml();  
       
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function updateAction()
    {
        $i=0;
        echo "<pre>";
        $groupData=$this->getRequest()->getPost();
        $id = $this->getRequest()->getGet('id');
      
        foreach ($groupData['Exist'] as $configId => $value) {
            $query = "SELECT * FROM `config` 
            WHERE `groupId` = '{$id}'
            AND `configId` = '{$configId}'";
            
            $attribute = \Mage::getModel('Model\Config')->fetchRow($query);
            $attribute->title= $value['title'];
            $attribute->code= $value['code'];
            $attribute->value= $value['value'];
           
           if($attribute->save()){
                $this->getMessage()->setSuccess('Record Updated Successfully');
            }else{
                $this->getMessage()->setFailure('Unable To Update Record');
            }
        }
        
        if (array_key_exists('New', $groupData)) {
            $newOptions = $this->getRequest()->getPost('new');
            $title = $groupData['New']['Title'];
            $code = $groupData['New']['Code'];
            $value = $groupData['New']['Value'];
            $optionArray = [];
            
            for ($i = 0; $i < count($title); $i++) {
                $optionArray[$i] = ['title' => $title[$i], 'code' => $code[$i], 'value'=>$value[$i], 'groupId' => $id];
            }
           
            foreach ($optionArray as $column) {

                $config = \Mage::getModel('Model\Config');
                $config->title = $column['title'];
                $config->code = $column['code'];
                $config->value = $column['value'];
                $config->groupId = $column['groupId'];
              
                if($config->save()){
                    $this->getMessage()->setSuccess('Record Updated Successfully');
                }else{
                    $this->getMessage()->setFailure('Unable To Update Record');
                }  
            }   
        } 
        $this->redirect('config',null,null,true);
    }

    public function saveAction()
    {
        try {
            
            $group = \Mage::getModel('Model\ConfigGroup'); 
            if ($id = (int) $this->getRequest()->getGet("id")){
                 $group = $group->load($id);  
                 if (!$group) {
                     throw new Exception("Record not found");     
                 } 
                 
            }else {
                
                $group->createdat = date('Y-m-d H:i:s');   
            }

            $groupData = $this->getRequest()->getPost('group');
            $group->setData($groupData);
            
                if($group->save()){
                    $this->getMessage()->setSuccess('Record Set Successfully');
                }else {
                    $this->getMessage()->setFailure('Unable To Set Record');
                } 
       
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',null,null,true);

    }
    
    public function DeleteAction()
    {
        try {

            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new Exception('Id Invalid');
            }            
            $group = \Mage::getModel('Model\ConfigGroup'); 
            $groupRow = $group->load($id)->getData()['groupId'];
            if ($group->delete($groupRow)) {
                $this->getMessage()->setSuccess('Record Deleted Successfully');
            }else{
                $this->getMessage()->setFailure('Unable To Delete Record');
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',null,null,true);
    }

    public function removeAction()
    {
        try {
                echo $configId = $this->getRequest()->getGet('configId');
                echo $id = $this->getRequest()->getGet('id');
                if (!$configId) {
                    throw new Exception('Id Invalid');
                }
                $config = \Mage::getModel('Model\Config');
                $configRow = $config->load($configId)->getData()['configId'];
                
                if ($config->delete($configRow)) {
                    $this->getMessage()->setSuccess('Record Deleted Successfully');
                }else{
                    $this->getMessage()->setFailure('Unable To Delete Record');
                }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('config',null,['id'=>$id],true);
    }
}

?>