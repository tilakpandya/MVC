<?php
namespace Block\Admin\Category\Edit\Tabs;

class Configuration extends \Block\Admin\Config_Group\Edit
{
    public function __construct() {
        $this->setTemplate('./View/Admin/config_group/edit/tabs/form.php');
    }


}


?>