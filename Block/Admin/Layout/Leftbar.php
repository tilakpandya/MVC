<?php
namespace Block\Admin\Layout;
\Mage::getBlock('Block\core\Template');

class Leftbar extends \Block\Core\Template
{
    public function __construct($controller) 
    {
        $this->setController($controller);
        $this->setTemplate('./View/admin/Layout/Leftbar.php');
    }
}