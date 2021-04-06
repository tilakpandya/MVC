<?php
namespace Model\Order;

class Address extends \Model\Core\Table
{
    /* const ADDRESS_TYPE_BILLING = 'billing';
    const ADDRESS_TYPE_SHIPPING = 'shipping';
    protected $cart = null;
    protected $customerAddress = null; */

    public function __construct() {
        $this->setTableName('order_address');
        $this->setPrimaryKey('orderAddressId');
    }


    /* public function getCart()
    {
       if (!$this->cartId) {
            return false;
        }
        $cart = \Mage::getModel('Model\Cart')->load($this->cartId);
        $this->setCart($cart);
        return $this->cart;
    }

    public function setCart($cart)
    {
        $this->cart = $cart;

        return $this;
    }

    public function getCustomerBillingAddress()
    {
        if (!$this->addressId) {
            return false;
        }
        $address = \Mage :: getModel('Model\CustomerAddress')->load($this->addressId);
        $this->setCustomerBillingAddress($address);
        return $this->product;
    }
 
    public function setCustomerBillingAddress($customerAddress)
    {
        $this->customerAddress = $customerAddress;
        return $this;
    }

    public function getCustomerShppingAddress()
    {
        if (!$this->addressId) {
            return false;
        }
        $address = \Mage :: getModel('Model\CustomerAddress')->load($this->addressId);
        $this->setCustomerShppingAddress($address);
        return $this->product;
    }
 
    public function setCustomerShppingAddress($customerAddress)
    {
        $this->customerAddress = $customerAddress;

        return $this;
    } */
}
?>