<?php
namespace Block\Core;
\Mage::loadByClass('Block\Core\Template');
\Mage::loadByClass('Block\core\layout\Content');

class Layout extends \Block\Core\Template
{
   protected $children=[];
   public function __construct()
   {
       $this->setTemplate('./View/Core/layout/threeColumn.php');     
       //$this->setTemplate('./View/Core/layout/OneColumn.php');   
       $this->prepareChildren(); 
    }

    /* public function prepareChildren()
    {
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Content'),'content');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Header'),'header');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Footer'),'footer');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Leftbar'),'leftbar');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Rightbar'),'rightbar');
    } */

    /* public function getContent()
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
    } */

}

?>