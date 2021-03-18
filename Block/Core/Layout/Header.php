<?php
namespace Block\Core\Layout;
\Mage::getBlock('Block\core\Template');
class Header extends \Block\Core\Template
{
    public function __construct() 
    {
        $this->setTemplate('./View/Core/layout/Header.php');
    }
}