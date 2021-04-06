<?php
namespace Block\Admin\Cart;
\Mage::getBlock('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
    protected $cart = null;
    public function __construct() {
        $this->setTemplate('./view/admin/cart/grid.php');
    }

    public function getCart()
    {
        if (!$this->cart) {
            throw new \Exception("Cart Is Not Set");
        }
        return $this->cart;
    }

    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }
    
    public function getId($id)
    {
       $id=$this->getController();
       $id->getRequest()->getGet('id');
       echo $id; 
    }

    public function getCustomers()
    {
       return \Mage::getModel('Model\Customer')->fetchAll();
    }
    
}

?>