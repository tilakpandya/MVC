<?php
namespace Block\Customer\Layout;
\Mage::getBlock('Block\Core\Template');

class Leftbar extends \Block\Core\Template
{
    public function __construct($controller) 
    {
        $this->setController($controller);
        $this->setTemplate('./View/Customer/Layout/leftbar.php');
    }
}