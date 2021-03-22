<?php
namespace Block\Customer;
\Mage::loadByClass('Block\Core\Layout');

class Layout extends \Block\Core\Layout
{
    public function __construct() {
        parent::__construct();
        $this->setTemplate('.\View\customer\layout.php');
    }

    public function prepareChildren()
    {
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Content'),'content');
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Header'),'header');
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Footer'),'footer');
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Leftbar'),'leftbar');
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Rightbar'),'rightbar');
    }

    public function getContent()
    {
      return $this->getChild('content');
    }

    public function getLeft()
    {
      return $this->getChild('leftbar');
    }

    public function getRight()
    {
      return $this->getChild('rightbar');
    }

}

?>