<?php
namespace Block\Admin\Layout;
\Mage::getBlock('Block\core\Template');
class Header extends \Block\Core\Template
{
    public function __construct() 
    {
        $this->setTemplate('./View/admin/layout/Header.php');
    }
}