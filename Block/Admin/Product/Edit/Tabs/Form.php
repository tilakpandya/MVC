<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::getBlock('Block\Core\Edit');

class Form extends \Block\Core\Edit
{
    public function __construct() {
        parent::__construct();
        $this->setTemplate('./View/Admin/product/edit/tabs/form.php');
    }
    public function getBrand()
    {
        $brands=\Mage::getModel('Model\Brand')->fetchAll();
        return $brands;
    }
}

?>