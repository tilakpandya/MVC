<?php
namespace Block\Admin\Config_Group;

class Edit extends \Block\Core\Edit
{
    
    public function __construct() {
        parent::__construct();
        $this->setTemplate('./View/Admin/config_group/edit.php');
     }

     public function getId($id)
     {
        $id=$this->getController();
        $id->getRequest()->getGet('id');
        echo $id; 
     }
 
    public function getFormUrl()
    {
        return $this->getUrl->getUrl('save');
    }

    public function getTitle()
    {
        return 'Configuration Group Form';
    }

    public function getConfigGroup()
    {
        return \Mage::getModel('Model\ConfigGroup')->load($this->getRequest()->getGet('id'));    
        
    }
}

?>