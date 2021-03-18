<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::getBlock('Block\Core\Edit');

class GroupPrice extends \Block\Core\Edit
{
    protected $groupPrice = null;
    protected $product =null;

    public function __construct() {
        parent::__construct();
        $this->setTemplate('./View/Admin/product/edit/tabs/groupprice.php');
    }

    public function getGroupPrice()
    {
        if (!$this->groupPrice) {
          $this->setGroupPrice(); 
         }
        return $this->groupPrice;
    }
    
    public function getCustomerGroup()
    {
        $id = $this->getRequest()->getGet('id'); 
       
        $query="SELECT cg.*, cgp.productId , cgp.entityId, cgp.price as groupPrice,
        if(p.price IS NULL, '{$this->getTableRow()->price}',p.price) as price
        FROM customer_group  cg
        LEFT JOIN product_customer_group_price cgp
            ON cgp.customerGroupId = cg.id 
                AND cgp.productID = '{$this->getTableRow()->id}'
        LEFT JOIN product p 
            ON cgp.productId = p.id"; 
        
        $customerGroup = \Mage::getModel('Model\CustomerGroup');
        $customerGroup=$customerGroup->fetchAll($query);
        return  $customerGroup;
    }
}

?>