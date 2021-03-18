<?php
namespace Model\Attribute;
\Mage::getModel('Model\Core\Table');

class Option extends \Model\Core\Table
{
    const ENABLED = 1;
    const DISABLED = 0;
    
    public function __construct() {

        parent::__construct();
        $this->setTableName('attribute_option');
        $this->setPrimarykey('optionId');
    }   
    
     public function getDefaultOptions()
     {
        return  [
            self::DISABLED=> "Enabled",
            self::ENABLED=> "Disabled"
        ]; 
     }

     public function getBackEndTypeOption()
    {
        return [
            'varchar'=>'varchar',
            'int'=>'int',
            'decimal'=>'decimal',
            'text'=>'text'
        ];
    }

    public function getInputTypeOption()
    {
        return [
            'text'=>'Textbox',
            'textarea'=>'textarea',
            'select'=>'select',
            'checkbox'=>'checkbox',
            'radio'=>'radio'
        ];
    }

    public function getEntityIdOption()
    {
        return [
            'product'=>'product',
            'category'=>'category'
        ];
    }
}

?>