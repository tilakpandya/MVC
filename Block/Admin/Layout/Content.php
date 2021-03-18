<?php
namespace Block\Core\Layout;
\Mage::getBlock('Block\Core\Template');

class Content extends \Block\Core\Template
{
    public function __construct() 
    {
        //$this->setController($controller);
        $this->setTemplate('./View/core/layout/content.php');
    }
}

?>