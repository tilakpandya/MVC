<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::getBlock('Block\Admin\Category\Edit');

class Attribute extends \Block\Admin\Category\Edit
{
    public function __construct() {
        $this->setTemplate('./View/Admin/category/edit/tabs/attribute.php');
    }

    public function getAttribute()
    {  
        $query="SELECT * FROM attribute where `entityTypeId`='category'"; 
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