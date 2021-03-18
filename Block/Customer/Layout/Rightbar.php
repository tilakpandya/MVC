<?php
namespace Block\Customer\Layout;
\Mage::getBlock('Block\core\Template');

class Rightbar extends \Block\Core\Template
{
    public function __construct($controller) 
    {
        $this->setController($controller);
        $this->setTemplate('./View/Customer/layout/rightbar.php');
    }
}