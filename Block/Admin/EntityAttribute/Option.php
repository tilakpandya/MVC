<?php
namespace Block\Admin\EntityAttribute;
\Mage::getBlock('Block\Core\Template');

class Option extends \Block\Core\Template
{
    protected $option =[];
    protected $attribute=null;
    public function __construct() {
        parent::__construct();
        $this->setTemplate('./View/Admin/entityattribute/option.php');
    }

   public function getOption()
   {
       if (!$this->option) {
           $this->setOption();
       }
      return $this->option;
   }

   public function setOption($option=null)
   {
    if (!$option) {
        $option = \Mage::getModel('Model\Attribute\Option');
        $option=$option->fetchAll();
    }
      $this->option = $option;
      return $this;
   }

    public function getAttribute()
    {
        return $this->attribute;
    }
 
    public function setAttribute(\Model\EntityAttribute $attribute=null)
    {
        if (!$attribute) {
           $attribute= \Mage::getModel('Model\EntityAttribute')->fetchAll();
        }
        $this->attribute = $attribute;
        return $this;
    }
}

?>