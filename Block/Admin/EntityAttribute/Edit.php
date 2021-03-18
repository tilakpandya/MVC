<?php
namespace Block\Admin\EntityAttribute;
\Mage::getBlock('Block\Core\Template');

class Edit extends \Block\Core\Template
{
    protected $attribute=NULL;
    
    public function __construct() {
       $this->setTemplate("./View/Admin/entityattribute/edit.php");
    }
    
    public function getAttribute()
    {
        if (!$this->attribute) {
          $this->setAttribute(); 
         }
        return $this->attribute;
    }

    public function setAttribute($attribute=NULL)
    {
        if ($attribute) {
            $this->attribute = $attribute;
            return $this;
        } 
        $attribute = \Mage::getModel('Model\EntityAttribute'); 
                
        if ($id =$this->getRequest()->getGet('id'))
        {
            $attribute = $attribute->load($id);  
        } 
        $this->attribute = $attribute;
        return $this;
    }

    public function getId($id)
    {
       $id=$this->getController();
       $id->getRequest()->getGet('id');
       echo $id; 
    }

    
}

?>