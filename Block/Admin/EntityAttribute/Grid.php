<?php
namespace Block\Admin\EntityAttribute;
\Mage::getBlock('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
   protected $attribute =[];
    public function __construct() {
        parent::__construct();
        $this->setTemplate('./View/Admin/entityattribute/grid.php');
    }

   public function getAttribute()
   {
       if (!$this->attribute) {
           $this->setAttribute();
       }
      return $this->attribute;
   }

   public function setAttribute($attribute=null)
   {
    if (!$attribute) {
        $attribute = \Mage::getModel('Model\EntityAttribute');
        $attribute=$attribute->fetchAll(); 
       
    }
      $this->attribute = $attribute;
      return $this;
   }
}

?>