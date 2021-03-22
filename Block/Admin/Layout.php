<?php
namespace Block\Admin;
\Mage::loadByClass('Block\Core\Layout');

class Layout extends \Block\Core\Layout
{
    public function __construct() {
        parent::__construct();
        $this->setTemplate('.\View\Admin\layout.php');
        $this->prepareChildren();
    }
    public function prepareChildren()
    {
        $this->addChild(\Mage::getBlock('Block\Admin\Layout\Content'),'content');
        $this->addChild(\Mage::getBlock('Block\Admin\Layout\Header'),'header');
        $this->addChild(\Mage::getBlock('Block\Admin\Layout\Footer'),'footer');
        $this->addChild(\Mage::getBlock('Block\Admin\Layout\Leftbar'),'leftbar');
        $this->addChild(\Mage::getBlock('Block\Admin\Layout\Rightbar'),'rightbar');
    }

}

?>