<?php
namespace Block\Admin\Customer;
\Mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $customers=NULL;
    
    public function __construct() {
       $this->setTemplate("./View/Admin/customer/grid.php");
    }

    public function getCustomer()
    {
        if (!$this->customers) {
          $this->setCustomer();
         }
        return $this->customers;
    }

    public function setCustomer($customers=NULL)
    {
        if (!$customers){
            $customers = \Mage::getModel('Model\Customer');
           
            $query = "SELECT customer.id ,customer.firstname, customer.lastname, customer.email,
            customer.status, customer.createdat, customer.updatedat, customer.group_id, customer_group.Name, 
            customer_address.address, customer_address.city, customer_address.state, 
            customer_address.zipcode, customer_address.country, customer_address.addressType 
            FROM `customer` LEFT JOIN `customer_address` ON `customer`.`id` = `customer_address`.`CustomerId` 
            LEFT JOIN `customer_group` ON `customer`.`group_id` = `customer_group`.`id`";
            
            $customers=$customers->fetchAll($query);     
        }
        $this->customers = $customers;
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