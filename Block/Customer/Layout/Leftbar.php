<?php
namespace Block\Customer\Layout;
\Mage::getBlock('Block\core\Template');

class Leftbar extends \Block\Core\Template
{
    public function __construct($controller) 
    {
        $this->setController($controller);
        //$this->setTemplate('./View/customer/Layout/Leftbar.php');
    }
}