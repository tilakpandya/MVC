<?php
namespace Controller\Admin;

class Cart extends \Controller\Core\Admin
{
    public function addItemToCartAction()
    {
      try {   
            $id = (int)$this->getRequest()->getGet('id');       
            $product = \Mage::getModel('Model\Product')->load($id);
            
            if (!$product) {
                throw new \Exception("Product is not Available");
            }

            $cart = $this->getCart();

            if ($cart->addItem($product,1,true)) {
                $this->getMessage()->setSuccess('Item added to cart Successfully');
            }else {
                $this->getMessage()->setFailure('Item added to cart Unsuccessfully');
            } 
                 
        } catch (\Exception $th) {
          echo $th->getMessage();
        }

        $this->redirect('index');
    }


    public function indexAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid');
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

    public function updateAction()
    {
       try {
          $quantities = $this->getRequest()->getPost('quantity');
        
          $cart = $this->getCart();
          
          foreach ($quantities as $cartItemId => $quantity) {
            $cartItem = \Mage::getModel('Model\Cart\Item')->load($cartItemId);
            $cartItem->quantity = $quantity;
            $cartItem->save();
         }
         $this->getMessage()->setSuccess('Item Update to cart Successfully');
       } catch (\Exception $th) {
          echo $th->getMessage();
        }

        $this->redirect('index');
    }
    
    public function checkoutAction()
    {
        $checkout = \Mage::getBlock('Block\Admin\Cart\Checkout');
        $cart = $this->getCart();
        $layout = $this->getLayout();
        $checkout->setCart($cart);
        $layout->getChild('content')->addChild($checkout);
        echo $layout->toHtml();
    }

    public function DeleteAction()
    {
        try {

            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new \Exception('Id Invalid');
            }            
            $item = \Mage::getModel('Model\Cart\Item'); 
            $itemRow = $item->load($id)->getData()['cartItemId'];
            if ($item->delete($itemRow)) {
                $this->getMessage()->setSuccess('Record Deleted Successfully');
            }else{
                $this->getMessage()->setFailure('Unable To Delete Record');
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('index');
    }

    public function selectCustomerAction()
    {
        $customerId = $this->getRequest()->getPost('customer');
        if ($customerId == 0) {
            $this->getMessage()->setFailure('Please Select Customer');
        }
        $this->getCart($customerId);

        $this->redirect('index','Admin_Cart',null,true);
    }

    public function saveAction()
    {
         try {
                $shipping = $this->getRequest()->getPost('shipping');
                $billing = $this->getRequest()->getPost('billing');
                $cartId = $this->getCart()->getItems()[0]->cartId; //array_shift(getItems());
                $shippingMethodId = $this->getRequest()->getPost('shippingMethod');
                $paymentMethodId = $this->getRequest()->getPost('paymentMethod');
              
                if ($billing) {
                    $query = "SELECT * FROM `cart_address` WHERE `cartId` = '{$cartId}' AND `addressType` = 'Billing'";
                    $cartBillingAddress = \Mage::getModel('Model\Cart\CartAddress')->fetchRow($query);
                        
                    if (!$cartBillingAddress) {
                        $cartBillingAddress = \Mage::getModel('Model\Cart\CartAddress');
                    }
                    
                    $cartBillingAddress->cartId = $cartId;
                    $cartBillingAddress->addressType = 'Billing';
                    $cartBillingAddress->sameAsBilling = 0;
                    $cartBillingAddress->setData($billing);
                    
                    if ($this->getRequest()->getPost('billingSaveAddressBook')){
                        $customerId= $this->getCart()->customerId;
                        $query = "SELECT * FROM `customer_address` WHERE `customerId`='{$customerId}' AND `addressType`='Billing'";
                        $customer = \Mage::getModel('Model\CustomerAddress')->fetchAll($query);
                        $customer=$customer[0];
                        
                        if (!$customer) {
                            $customer = \Mage::getModel('Model\CustomerAddress');
                        }

                        $cartBillingAddress->addressId = $customer->id;
                        $customer->customerId = $customerId;
                        $customer->addresstype = 'Billing';
                        $customer->setData($billing);
                        $customer->save();
                    } 
                    
                    if ($billing = $this->getRequest()->getPost('sameasbilling')) {               
                        $cartBillingAddress->sameAsBilling = 1;
                        $query = "SELECT * FROM `cart_address` WHERE `cartId` = '{$cartId}' AND `addressType` = 'Shipping'";
                        $cartShippingAddress = \Mage::getModel('Model\Cart\CartAddress')->fetchRow($query);
                       
                        if ($cartShippingAddress) {
                            $cartAddressId = $cartShippingAddress->cartAddressId;
                            $cartShippingAddress->delete($cartAddressId);
                        }  
                       
                    }
                   
                     if ($cartBillingAddress->save()) {
                        
                        $this->getMessage()->setSuccess('Record Set Successfully');
                    }else{
                        $this->getMessage()->setFailure('Unable To Set Record');
                    }   
                   
                   
                }
                if ($shipping) {
                   
                    $query = "SELECT * FROM `cart_address` WHERE `cartId` = '{$cartId}' AND `addressType` = 'Shipping'";
                    
                    $cartShippingAddress = \Mage::getModel('Model\Cart\CartAddress')->fetchRow($query);
                    
                    if (!$cartShippingAddress) {
                        $cartShippingAddress = \Mage::getModel('Model\Cart\CartAddress');
                    }
                   
                    if ($this->getRequest()->getPost('shippingSaveAddressBook')){
                        $customerId= $this->getCart()->customerId;
                        $query = "SELECT * FROM `customer_address` WHERE `customerId`='{$customerId}' AND `addressType`='Shipping'";
                        $customer = \Mage::getModel('Model\CustomerAddress')->fetchAll($query);
                        $customer=$customer[0];
                        if (!$customer) {
                            $customer = \Mage::getModel('Model\CustomerAddress');
                        }
                        $cartShippingAddress->addressId = $customer->id;
                        $customer->customerId = $customerId;
                        $customer->addresstype = 'Shipping';
                        $customer->setData($shipping);
                        $customer->save();
                        
                    } 

                    $cartShippingAddress->cartId = $cartId;
                    $cartShippingAddress->addressType = 'Shipping';
                    $cartShippingAddress->setData($shipping);  
                   
                   
                     if ($cartShippingAddress->save()) {
                        $this->getMessage()->setSuccess('Record Set Successfully');
                    }else{
                        $this->getMessage()->setFailure('Unable To Delete Record');
                    }
                    
                }
                if ($shippingMethodId) {
                    
                    $this->setShippingMethod($shippingMethodId);
                }
                if ($paymentMethodId) {
                   
                    $this->setPaymentMethod($paymentMethodId);
                }
                $this->setAmount();
               
            } catch (\Exception $th) {
                $this->getMessage()->setFailure('Unable To Set Record'); 
            }
        
        $this->redirect('index','Admin_Order');
    }

    protected function setShippingMethod($shippingId)
    {
       $cartId = $this->getCart()->cartId;
       $query = "SELECT * FROM `cart` Where `cartId` = '{$cartId}'";
       $cart = \Mage::getModel('Model\Cart')->fetchRow($query);
       $cart->shippingMethodId = $shippingId;
       $cart->save();
    }

    protected function setPaymentMethod($paymentId)
    {
       $cartId = $this->getCart()->cartId;
       $query = "SELECT * FROM `cart` Where `cartId` = '{$cartId}'";
       $cart = \Mage::getModel('Model\Cart')->fetchRow($query);
       $cart->paymentMethodId = $paymentId;
       $cart->save();
    }

    public function setAmount()
    {
       $total = 0;
       $cartId = $this->getCart()->cartId;
       $query = "SELECT * FROM `cart` Where `cartId` = '{$cartId}'";
       $shippingQuery = "SELECT * FROM `cart` 
       join `shipping` on `shipping`.`id`=`cart`.`shippingMethodId`  
       Where `cartId` = '{$cartId}'"; 
       $itemQuery = "SELECT * FROM `cart_item` Where `cartId` = '{$cartId}'";
       $cart = \Mage::getModel('Model\Cart')->fetchRow($query);
       $cartItem = \Mage::getModel('Model\Cart\Item')->fetchAll($itemQuery);
       $shippingAmount = \Mage::getModel('Model\Cart\Item')->fetchRow($shippingQuery);
       
       foreach ($cartItem as $key => $item) {
           $price = $item->price * $item->quantity;
           $total = $total + $price;
       }
       $cart->total = $total;
       $cart->shippingAmount = $shippingAmount->amount + $total;
      
       $cart->save();
    }
}

?>