<?php
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::getBlock('Block\Core\Edit');

class Form extends \Block\Core\Edit
{
    protected $customerType = null;

    public function __construct() {
        parent::__construct();
        $this->setTemplate('./View/Admin/customer/edit/tabs/form.php');
    }

    public function getCustomerType($query=NULL)
    {
        if ($this->customerType) {
            return $this->customerType;
        }  
        $query = "SELECT `Name`,`id` FROM `customer_group`;";
        $this->customerType = $this->getTableRow()->getAdapter()->fetchAll($query);
        return $this->customerType;
    }

}

?>