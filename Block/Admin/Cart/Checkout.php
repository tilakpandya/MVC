<?php
namespace Block\Admin\Cart;
\Mage::getBlock('Block\Core\Grid');

class Checkout extends \Block\Core\Grid
{
    protected $cart = null;
    public function __construct() {
        $this->setTemplate('./view/admin/cart/checkout.php');
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
    
    public function getBillingAddress()
    {
       $cutomerId=$this->getCart()->getCustomer()->id;
       $cartBillingAddress = $this->getCart()->getBillingAddress();
       if ($cartBillingAddress) {
          return $cartBillingAddress;
       }

       $billingAddress = $this->getCart()->getCustomer()->getBillingAddress();
       if ($billingAddress) {
           $query = "SELECT * FROM `customer_address` WHERE `customerId` = '$cutomerId' AND `addressType`='Billing'";
           return \Mage::getModel('Model\Cart\CartAddress')->fetchRow($query); 
       }

       return Null; 
    }

    public function getShippingAddress()
    {
       $cartShippingAddress = $this->getCart()->getShippingAddress();
       $cutomerId=$this->getCart()->getCustomer()->id;

       if ($cartShippingAddress) {
          return $cartShippingAddress;
       }
       
       $shippingAddress = $this->getCart()->getCustomer()->getShippingAddress();
      
       if ($shippingAddress) {
            $query = "SELECT * FROM `customer_address` WHERE `customerId` = '$cutomerId' AND `addressType`='Shipping'";
            return \Mage::getModel('Model\Cart\CartAddress')->fetchRow($query);  
       }
       return Null;
    }

    public function getShippingMethod()
    {
       return \Mage::getModel('Model\Shipping')->fetchAll();
    }

    public function getPaymentMethod()
    {
        return \Mage::getModel('Model\Payment')->fetchAll();
    }
}

?>