<?php
namespace Block\Customer\Layout;
\Mage::getBlock('Block\Core\Template');

class Footer extends \Block\Core\Template
{
    public function __construct() 
    {
        $this->setTemplate('./View/Customer/layout/footer.php');
    }
}