<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class Brand extends \Model\Core\Table
{
    private $image= NULL;
   
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function __construct(Type $var = null) {

        parent::__construct();
        $this->setTableName('brand');
        $this->setPrimarykey('id');
    } 

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        if (!$image) {
            $id = $this->getRequest()->getGet('id');
            $image =  \Mage::getModel('Model\Brand');
            $query = "SELECT * FROM '{$image->getTableName()}'";
            $image = $image->fetchAll($query);
        }
        $this->image = $image;
        return $this;
    }
    
    public function getStatusOptions()
    {
        return  [
            self::STATUS_DISABLED=> "Disabled",
            self::STATUS_ENABLED=> "Enabled"
        ]; 
    }

    public function getImagePath($subPath=NULL)
    {
        return \Mage::getBaseDir('Skin\Images\Brand\\');
    }
   
}

?>