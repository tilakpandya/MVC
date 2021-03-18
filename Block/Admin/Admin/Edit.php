<?php
namespace Block\Admin\Admin;
\Mage::getBlock('Block\core\Template');

class Edit extends \Block\Core\Template
{
    protected $admin=NULL;
    
    public function __construct() 
    {
       $this->setTemplate("./View/Admin/admin/edit.php");
    }
    
    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock('Block\Admin\Admin\Edit\Tabs');
        $tabs = $tabBlock->getTabs();
        //print_r($tabs);
        $tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if (!array_key_exists($tab,$tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];
        $block = \Mage::getBlock($blockClassName);
        
        return $block->toHtml();
    }

    public function getAdmin()
    {
        if (!$this->admin) {
          $this->setAdmin(); 
         }
        return $this->admin;
    }

    public function setAdmin($admin=NULL)
    {
        if ($admin) {
            $this->admin = $admin;
            return $this;
        }
        
        $admin = \Mage::getModel('Model\Admin'); 
        
        if ($id =$this->getRequest()->getGet('id'))
        {
            $admin = $admin->load($id);  
        } 
        
        $this->admin = $admin;
        return $this;
    }

    public function getId($id)
    {
       $id=$this->getController();
       $id->getRequest()->getGet('id');
       echo $id; 
    }
}

?>