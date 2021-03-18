<?php
namespace Block\Admin\Admin\Edit\Tabs;
\Mage::getBlock('Block\Core\Template');

class Form extends \Block\Core\Template
{
    protected $admin = null;

    public function __construct() {
        parent::__construct();
        $this->setTemplate('./View/Admin/admin/edit/tabs/form.php');
    }

    public function getAdmin()
    {
        if (!$this->admin) {
          $this->setAdmin(); 
         }
        return $this->admin;
    }

    public function setAdmin($admin=NULL)
    {
        if ($admin) {
            $this->admin = $admin;
            return $this;
        }
        
        $admin = \Mage::getModel('Model\Admin'); 
        
        if ($id =$this->getRequest()->getGet('id'))
        {
            $admin = $admin->load($id);  
        } 
        
        $this->admin = $admin;
        return $this;
    }
}

?>