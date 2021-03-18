<?php
namespace Block\Customer\Layout;
\Mage::getBlock('Block\Core\Template');

class Message extends \Block\Core\Template
{
    public function __construct($controller) 
    {
        $this->setTemplate('./View/Customer/layout/message.php');
    }
}
