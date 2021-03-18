<?php
namespace Block\Admin;
\Mage::loadByClass('Block\Core\Layout');

class Layout extends \Block\Core\Layout
{
    public function __construct() {
        parent::__construct();
        $this->setTemplate('.\View\Admin\layout.php');
    }
    public function prepareChildren()
    {
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Content'),'content');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Header'),'header');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Footer'),'footer');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Leftbar'),'leftbar');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Rightbar'),'rightbar');
    }

}

?>