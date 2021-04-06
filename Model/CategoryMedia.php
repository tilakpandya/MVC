<?php
namespace Model;
\Mage::getModel('Model\Core\Table');

class CategoryMedia extends \Model\Core\Table
{
   
    private $image= NULL;
    
    public function __construct() {

        parent::__construct();
        $this->setTableName('category_media');
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
            $image =  \Mage::getModel('Model\CategoryMedia');
            $query = "SELECT * FROM '{$image->getTableName()}' WHERE 'categoryId'='$id'";
            $image = $image->fetchAll($query);
        }
        $this->image = $image;
        return $this;
    }

    public function getImagePath($subPath=NULL)
    {
        return \Mage::getBaseDir('Skin\Images\Category\\');
    }
}

?>