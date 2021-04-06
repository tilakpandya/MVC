<?php
namespace Block\Admin\Config_Group;

class Grid extends \Block\Core\Edit
{
    
    public function __construct() {
        
        $this->setTemplate('./View/Admin/config_group/grid.php');
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
        return \Mage::getModel('Model\ConfigGroup')->fetchAll();
     }
}

?>