<?php
namespace Block\Admin\CMSPages;
\Mage::getBlock('Block\core\Template');

class Edit extends \Block\Core\Template
{
    protected $cmsPages=NULL;
    
    public function __construct() {
       $this->setTemplate("./View/Admin/cmsPages/edit.php");
    }

    public function getId($id)
    {
       $id=$this->getController();
       $id->getRequest()->getGet('id');
       echo $id; 
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
        if ($cmsPages) {
            $this->cmsPages = $cmsPages;
            return $this;
        }
        
        $cmsPages = \Mage::getModel('Model\CMSPages');    
            
        if ($id =$this->getRequest()->getGet('id'))
        {
            $cmsPages = $cmsPages->load($id);  
        }     
        $this->cmsPages = $cmsPages;
        return $this;
    }
}

?>