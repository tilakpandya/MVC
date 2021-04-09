<?php
namespace Block\Admin\Config_Group;

class Edit extends \Block\Core\Edit
{
    
    public function __construct() {
        parent::__construct();
        $this->setTab(\Mage::getBlock('Block\Admin\Config_Group\Edit\Tabs'));
        $this->setTabClass(\Mage::getBlock('Block\Admin\Config_Group\Edit\Tabs')); 
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

}

?>