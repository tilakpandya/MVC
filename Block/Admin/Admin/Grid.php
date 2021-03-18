<?php
namespace Block\Admin\Admin;
\Mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $admin=NULL;
    
    public function __construct() {
       $this->setTemplate("./View/Admin/admin/grid.php");
    }
 
    public function getAdmin()
    {
        if (!$this->admin) {
          $this->setAdmin();
         }
        return $this->admin;
    }

    public function setAdmin($customers=NULL)
    {
        if (!$customers){
            $admin = \Mage::getModel('Model\Admin');
            $admin=$admin->fetchAll();     
        }
        $this->admin = $admin;
        return $this;
    }

    public function getId($id)
    {
       $id=$this->getController();
       $id->getRequest()->getGet('id');
       echo $id; 
    }
}

?>