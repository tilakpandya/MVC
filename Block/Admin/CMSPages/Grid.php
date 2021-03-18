<?php
namespace Block\Admin\CMSPages;
\Mage::getBlock('Block\core\Template');

class Grid extends \Block\Core\Template
{
    protected $cmsPages=NULL;
    
    public function __construct() {
       $this->setTemplate("./View/Admin/cmsPages/grid.php");
    }

    public function getCmsPages()
    {
        if (!$this->cmsPages) {
            $this->setCmsPages(); 
           }
          return $this->cmsPages;
    } 
    public function setCmsPages($cmsPages=NULL)
    {
        if (!$cmsPages){
            $cmsPages = \Mage::getModel('Model\CMSPages'); 
            $cmsPages=$cmsPages->fetchAll();   
        }
        $this->cmsPages = $cmsPages;
        return $this;
    }
   
}

?>