<?php
namespace Block\Admin\Config_Group\Edit\Tabs;

class Configuration extends \Block\Admin\Config_Group\Edit
{
    public function __construct() {
        $this->setTemplate('./View/Admin/config_group/edit/tabs/configuration.php');
    }


    public function getConfiguration()
    {
       $groupId=$this->getRequest()->getGet('id');
       $query = "SELECT * FROM `config` WHERE `groupId` = '{$groupId}'";
       return \Mage::getModel('Model\ConfigGroup')->fetchAll($query);
    }
}


?>