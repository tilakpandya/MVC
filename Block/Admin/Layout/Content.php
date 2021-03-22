<?php
namespace Block\Admin\Layout;
\Mage::getBlock('Block\Core\Template');

class Content extends \Block\Core\Template
{
    public function __construct() 
    {
        //$this->setController($controller);
        $this->setTemplate('./View/admin/layout/content.php');
    }
}

?>