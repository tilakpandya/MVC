<?php
namespace Block\Admin\Order;
\Mage::getBlock('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
    protected $cart = null;
    public function __construct() {
        $this->setTemplate('./view/admin/order/grid.php');
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

    public function getShippingAddress()
    {
       $query = "SELECT * FROM `cart_address` WHERE `cartId` = '{$this->getCart()->cartId}' AND `addressType` = 'Shipping'";
       $address = \Mage::getModel('Model\Cart\CartAddress')->fetchRow($query);   
       if ($address) {
           return $address;
       }
       $query = "SELECT * FROM `cart_address` WHERE `cartId` = '{$this->getCart()->cartId}' AND `sameAsBilling` = '1'";
       return \Mage::getModel('Model\Cart\CartAddress')->fetchRow($query);
    }
}

?>