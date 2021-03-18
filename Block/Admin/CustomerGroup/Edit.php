<?php
namespace Block\Admin\CustomerGroup;
\Mage::getBlock('Block\Core\Template');

class Edit extends \Block\Core\Template
{
    protected $customer_group=NULL;
    public function __construct() 
    {
       $this->setTemplate("./View/Admin/customergroup/edit.php");
    }
    
    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock('Block\Admin\CustomerGroup\Grid');
        $tabs = $tabBlock->getTabs();
        //print_r($tabs);
        $tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if (!array_key_exists($tab,$tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];
        $block = Mage::getBlock($blockClassName);
        return $block->toHtml();
    }

    public function getCustomer_group()
    {
        if (!$this->customer_group) {
          $this->setCustomer_group(); 
         }
        return $this->customer_group;
    }

    public function setCustomer_group($customer_group=NULL)
    {
        if ($customer_group) {
            $this->customer_group = $customer_group;
            return $this;
        }
        $customer_group = \Mage::getModel('Model\CustomerGroup'); 
        $id =$this->getRequest()->getGet('id');
        if ($id)
        {
            $customer_group = $customer_group->load($id);  
        }   
        $this->customer_group = $customer_group;
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