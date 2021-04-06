<?php
namespace Model\Brand;
\Mage::getModel('Model\option');

class Option extends \Model\Option
{
    public function getOptions()
    {
        
        $query = "SELECT `id`,`name`,'{$this->getAttribute()->id}' as attributeId FROM `brand`";
        $options = \Mage::getModel('Model\Brand')->fetchAll($query); 
        return $options;
    }
}

?>