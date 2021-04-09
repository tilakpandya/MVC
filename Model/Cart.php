<?php
namespace Model;

class Cart extends \Model\Core\Table
{
    protected $customer = Null;
    protected $items = Null;
    protected $shippingAddress = null;
    protected $billingAddress = null;
    protected $paymentMethodId = null;
    protected $shippingMethodId = null;
    protected $shippingMethodAmount = null;
    protected $cart = null;

    public function __construct() {
        $this->setTableName('cart');
        $this->setPrimaryKey('cartId');
    }

    public function getCustomer()
    {
        if ($this->customer) {
           return $this->customer;
        }

        if (!$this->customerId) {
            return false;
        }

        $customer =  \Mage::getModel('Model\customer')->load($this->customerId);
        $this->setCustomer($customer);
        return $this->customer;
    }


    public function setCustomer(\Model\Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function getItems()
    {

        if (!$this->cartId) {
            return false;
        }
        $query = "SELECT * FROM `cart_item` WHERE `cartId` = '{$this->cartId}'";
        $items =  \Mage::getModel('Model\Cart\Item')->fetchAll($query);
        $this->setItems($items);
        return $items;
    }

    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }

    public function getBillingAddress()
    {
        if (!$this->cartId) {
           return false;
        }
       
        $query = "SELECT * FROM `cart_address` 
        WHERE `cartId` = '{$this->cartId}' AND `addressType`='Billing'";
    
        $billingAddress = \Mage::getModel('Model\Cart\CartAddress')->fetchRow($query);
        if (!$billingAddress) {
           return null;
        }
        $this->setBillingAddress($billingAddress);
        return $this->billingAddress; 
    }

    public function setBillingAddress(\Model\Cart\CartAddress $billingAddress)
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }


    public function getShippingAddress()
    {
        if (!$this->cartId) {
            return false;
        }
        
        $query = "SELECT * FROM `cart_address` 
        WHERE `cartId` = '{$this->cartId}' AND `addressType`='Shipping'";

        $shippingAddress = \Mage::getModel('Model\Cart\CartAddress')->fetchRow($query);
        
        $this->setShippingAddress($shippingAddress);
        return $this->shippingAddress;
    }

    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    public function getPaymentMethodId()
    {
        return $this->paymentMethodId;
    }

    public function setPaymentMethodId($paymentMethodId)
    {
        $this->paymentMethodId = $paymentMethodId;
        return $this;
    }

 
    public function getShippingMethodId()
    {
        if (!$this->cartId) {
            return false;
        }
        
        $query = "SELECT * FROM `shipping` 
        WHERE `id` = '{$this->cartId}'";

        $shippingId= \Mage::getModel('Model\Shipping')->fetchRow($query);
        
        $this->setShippingMethodId($shippingId);
        return $this->shippingMethodId;
    }

    public function setShippingMethodId($shippingMethodId)
    {
        
        $this->shippingMethodId = $shippingMethodId;

        return $this;
    }

    public function addItem($product,$quantity=1,$addMode=false)
    {
        if (!$this->customerId) {
            return false;
        }

        $query = "SELECT * FROM `cart_item` WHERE `cartId` = '{$this->cartId}' AND `productId` = '{$product->id}'";
        $cartItem = \Mage::getModel('Model\Cart\Item')->fetchRow($query);
       
        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
            return true;
        }

        $cartItem = \Mage::getModel('Model\Cart\Item');
        $cartItem->cartId = $this->cartId;
        $cartItem->productId = $product->id;
        $cartItem->price = $product->price;
        $cartItem->quantity = $quantity;
        $cartItem->discount = $product->discount;
        $cartItem->createdat = date('Y-m-d H:i:s');

        $cartItem->save();
        return true;
    }


    public function getShippingMethodAmount()
    {
        if ($this->shippingMethodAmount) {
            return $this->shippingMethodAmount;
         }
         

         $shippingMethodAmount =  \Mage::getModel('Model\shipping')->load($this->shippingMethodId);
         $this->setShippingMethodAmount($shippingMethodAmount);
         print_r($this->shippingMethodId);
        
    }

    public function setShippingMethodAmount($shippingMethodAmount)
    {
        $this->shippingMethodAmount = $shippingMethodAmount;

        return $this;
    }
}


?>