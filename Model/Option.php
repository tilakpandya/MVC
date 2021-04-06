<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class Option extends \Model\Core\Table
{
    protected $attribute = null;
    public function __construct() {

        parent::__construct();
        $this->setTableName('attribute_option');
        $this->setPrimarykey('optionId');
    }   
    
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;
        return $this;
    }

    public function getOptions()
    {
        if (!$this->getAttribute()->id) {
            return null;
        }
        $query = "SELECT * FROM `attribute_option` 
        WHERE `attributeId` = '{$this->getAttribute()->id}'
        ORDER BY `sortOrder` ASC";
        
        return $this->fetchAll($query);
    }

    public function getAttribute()
    {
        return $this->attribute;
    }
}

?>