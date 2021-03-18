<?php
namespace Block\Admin\Customer;
\Mage::getBlock('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{
    public function __construct() {
        parent::__construct();
        $this->setTab(\Mage::getBlock('Block\Admin\Customer\Edit\Tabs'));
        $this->setTabClass(\Mage::getBlock('Block\Admin\Customer\Edit\Tabs'));
    }


    public function getId($id)
    {
       $id=$this->getController();
       $id->getRequest()->getGet('id');
       echo $id; 
    }

    public function getFormUrl()
    {
        return $this->getUrl->getUrl('save');
    }
    
    public function getTitle()
    {
       return 'Customer Add/Edit';
    }

    
}

?>