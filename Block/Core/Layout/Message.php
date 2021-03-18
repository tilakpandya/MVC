<?php
namespace Block\Core\Layout;
\Mage::getBlock('Block\Core\Template');

class Message extends \Block\Core\Template
{
    public function __construct($controller) 
    {
        $this->setTemplate('./View/Core/layout/message.php');
    }
}
