<?php
namespace Block\Customer\Layout;
\Mage::loadByClass('Block\Core\Template');
class Head extends \Block\Core\Template
{
    public function __construct(Type $var = null) {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\head.php');
    }
}
