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
       $this->prepareChildren();  
       //$this->setTemplate('./View/Core/layout/OneColumn.php');   
    }

    public function prepareChildren()
    {
        return $this;
    }

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