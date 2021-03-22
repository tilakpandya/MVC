<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class Media extends \Model\Core\Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    
    private $image= NULL;
    
    public function __construct(Type $var = null) {

        parent::__construct();
        $this->setTableName('media');
        $this->setPrimarykey('id');
    }   
    
     public function getStatusOptions()
     {
        return  [
            self::STATUS_DISABLED=> "Disabled",
            self::STATUS_ENABLED=> "Enabled"
        ]; 
     }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        if (!$image) {
            $id = $this->getRequest()->getGet('id');
            $image =  \Mage::getModel('Model\Media');
            echo $query = "SELECT * FROM '{$image->getTableName()}' WHERE 'productId'='$id'";
            $image = $image->fetchAll($query);
        }
        $this->image = $image;
        return $this;
    }

    public function getImagePath($subPath=NULL)
    {
        return \Mage::getBaseDir('Skin\Images\Product\\');
    }
}

?>