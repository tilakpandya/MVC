<?php
namespace Block\Admin\Layout;
\Mage::getBlock('Block\Core\Template');

class Footer extends \Block\Core\Template
{
    public function __construct() 
    {
        $this->setTemplate('./View/admin/layout/Footer.php');
    }
}