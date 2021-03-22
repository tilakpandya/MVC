<?php
namespace Block\Admin\Layout;
\Mage::getBlock('Block\Core\Template');

class Message extends \Block\Core\Template
{
    public function __construct($controller) 
    {
        $this->setTemplate('./View/admin/layout/message.php');
    }
}
