<?php
namespace Block\Core\Layout;
\Mage::getBlock('Block\Core\Template');

class Footer extends \Block\Core\Template
{
    public function __construct() 
    {
        $this->setTemplate('./View/Core/layout/Footer.php');
    }
}