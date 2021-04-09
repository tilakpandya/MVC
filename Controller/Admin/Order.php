<?php
namespace Controller\Admin;

class Order extends \Controller\Core\Admin
{
    

    public function indexAction(Type $var = null)
    {
        $grid = \Mage::getBlock('Block\Admin\Order\Grid');
        $layout= $this->getLayout();
        $content = $layout->getChild('content');
        $cart = $this->getCart();
        $grid->setCart($cart);
        $content->addChild($grid,'grid');
        echo $layout->toHtml();
    }

    protected function getCart($customerId=NULL)
    {
        $session = \Mage::getModel('Model\Admin\Session');
        
        if ($customerId) {
            $session->customerId = $customerId;
        }
        //$sessionId = \Mage::getModel('Model\Admin\Session')->getId();
        $cart = \Mage::getModel('Model\Cart');
        $query = "SELECT * FROM `cart` WHERE `customerId` = '{$session->customerId}'";
        $cart = $cart->fetchRow($query);
        
        if($cart) {
          return $cart;
        }

        $cart = \Mage::getModel('Model\Cart');
        $cart->customerId = $session->customerId;
        $cart->createdat = date('Y-m-d H:i:s');
        $cart->save();
        return $cart;
    }

    
    public function orderAction()
    {
        $cartId = $this->getRequest()->getGet('cartId');
        $order = \Mage::getModel('Model\Order');
        $orderItem = \Mage::getModel('Model\Order\Item');
        $orderAddress = \Mage::getModel('Model\Order\Address');
        echo "<pre>";
        if ($order) {
            $this->setOrder($order,$cartId);
        }
        if ($orderItem) {
            $this->setOrderItem($cartId);
        }
        if ($orderAddress) {
           $this->setOrderAddress($cartId);
        }
        $this->getMessage()->setSuccess('Order Successfully');
        $this->redirect('index','admin_cart');
    }

    protected function setOrder(\Model\Order $order,$cartId)
    {
        $cartQuery = "SELECT *,`shipping`.`name` as `shippingName`, 
        `payment`.`name` as `paymentName`,`shipping`.`code` as `shippingCode`  FROM `cart` 
        JOIN `Customer` ON `cart`.`customerId` = `customer`.`id` 
        JOIN `payment` ON `cart`.`paymentMethodId` = `payment`.`id` 
        JOIN `shipping` ON `cart`.`shippingMethodId` = `shipping`.`id` 
        WHERE `cartId` = '{$cartId}'";

        $cart = \Mage::getModel('Model\Cart')->fetchRow($cartQuery);
    
        $order->customerId = $cart->customerId;
        $order->cartId = $cart->cartId;
        $order->customerName = $cart->firstname.' '. $cart->lastname;
        $order->email = $cart->email;
        $order->paymentMethodId = $cart->paymentMethodId;
        $order->shippingMethodId = $cart->shippingMethodId;
        $order->shippingMethodName = $cart->shippingName;
        $order->paymentMethodName = $cart->paymentName;
        $order->shippingMethodCode = $cart->shippingCode;
        $order->shippingCharges = $cart->amount;
        $order->shippingAmount = $cart->shippingAmount;
        $order->status = 'Enabled';   
        if ($order->save()) {
           $cart->delete($cart->cartId);
        }
    }

    protected function setOrderAddress($cartId)
    {
        $query = "SELECT * FROM `cart_address` WHERE `cartId` = '{$cartId}'";
        $cartAddresses = \Mage::getModel('Model\Cart\cartAddress')->fetchAll($query);
        
        $query = "SELECT `orderId` FROM `order` 
        WHERE `cartId` = '{$cartId}'";

        $orderId = \Mage::getModel('Model\Cart\Item')->fetchRow($query);

        foreach ($cartAddresses as $key => $cartAddress) {
            $orderAddress = \Mage::getModel('Model\Order\Address');
            $orderAddress->orderId = $orderId->orderId;
            $orderAddress->addressId = $cartAddress->addressId;
            $orderAddress->addressType = $cartAddress->addressType;
            $orderAddress->address = $cartAddress->address;
            $orderAddress->city = $cartAddress->city;
            $orderAddress->state = $cartAddress->state;
            $orderAddress->country = $cartAddress->country;
            $orderAddress->zipcode = $cartAddress->zipcode;
            
            if ($orderAddress->save()) {
                $cartAddress->delete($cartAddress->CartAddressId);
             }  
        }
        
    }

    protected function setOrderItem($cartId)
    {
        $query = "SELECT *,`cart_item`.`quantity` as `cartQuantity` FROM `cart_item` 
        JOIN `product` ON `cart_item`.`productId`=`product`.`id` 
        WHERE `cartId` = '{$cartId}'";
        
        $cartItems = \Mage::getModel('Model\Cart\Item')->fetchAll($query);

        $query = "SELECT `orderId` FROM `order` 
        WHERE `cartId` = '{$cartId}'";

        $orderId = \Mage::getModel('Model\Cart\Item')->fetchRow($query);

        foreach ($cartItems as $key => $cartItem) {
            $orderItem = \Mage::getModel('Model\Order\Item');
            $orderItem->productId = $cartItem->productId;
            $orderItem->orderId = $orderId->orderId;
            $orderItem->productName = $cartItem->name;
            $orderItem->basePrice = $cartItem->basePrice;
            $orderItem->price = $cartItem->price;
            $orderItem->quantity = $cartItem->cartQuantity;
            $orderItem->discount = $cartItem->discount;
            $orderItem->createdat = date('Y-m-d H:i:s');
            
            if ($orderItem->save()) {
                $cartItem->delete($cartItem->cartItemId);
             }  
        }
        
    }
}


/* if cartID in cart_item and cartId in order 
    add in orderItem */
?>
