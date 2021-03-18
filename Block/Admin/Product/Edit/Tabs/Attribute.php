<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::getBlock('Block\Admin\Product\Edit');

class Attribute extends \Block\Admin\Product\Edit
{
    public function __construct() {
        $this->setTemplate('./View/Admin/product/edit/tabs/attribute.php');
    }

    public function getAttribute()
    {  
        $query="SELECT * FROM attribute where `entityTypeId`='product'"; 
        $att = \Mage::getModel('Model\EntityAttribute');
        $att=$att->fetchAll($query);
        return $att;
    }

    public function getAttributeType($id=NULL)
    {  
        
        $query="SELECT * FROM attribute_option where `attributeId`='{$id}'"; 
        $att = \Mage::getModel('Model\EntityAttribute');
        $att=$att->fetchAll($query);
        return $att;
    }    

}


?>