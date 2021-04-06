<?php  
$cart=$this->getCart();
$cartItems=$this->getCart()->getItems();
$address=($this->getShippingAddress());
$customer = $this->getCart()->getCustomer();
/* echo "<pre>";
print_r();  */ 
?>
<div class="container">
<h1 style="color:gray">Order Details</h1>
    <hr>
    <h3 style="color:gray">Product Details</h3>
    
    <table class="table table-responsive">
        <tr>
                            <th>ProductId</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Product discount</th>
                            <th>Shipping Charges</th>
                            <th>Product Total Price</th>
        </tr>
        <?php foreach ($cartItems as $key => $item):?>
            <tr>
                                <td><?= $item->productId?></td>
                                <td>₹<?= $item->price?></td>
                                <td><?= $item->quantity?></td>
                                <td><?= $item->discount?></td>
                                <td></td>
                                <td>₹<?= $item->price * $item->quantity?></td>
            </tr>
        <?php endforeach;?>                
        
    </table>
    <h3 style="color:gray">Cart Details</h3>
    <table class="table table-responsive">
            <tr>
                <th>Cart Id</th>
                <th>Total</th>
                <th>Cart Discount</th>
                <th>Payment Method Id</th>
                <th>Shipping Method Id</th>
            </tr>
            <tr>
                <td><?= $cart->cartId?></td>
                <td>₹<?= $cart->total?></td>
                <td><?= $cart->discount?></td>
                <td><?= $cart->paymentMethodId?></td>
                <td><?= $cart->shippingMethodId?></td>
                
            </tr>
    </table>
    <h3 style="color:gray">Customer Details</h3>
    <table class="table table-responsive">
            <tr>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Zipcode</th>
            </tr>
            <tr>
                <td><?= $customer->firstname.' '.$customer->lastname?></td>
                <td><?= $customer->email?></td>
                <td><?= $address->address?></td>
                <td><?= $address->city?></td>
                <td><?= $address->state?></td>
                <td><?= $address->country?></td>
                <td><?= $address->zipcode?></td>                
            </tr>
    </table>
    <button class="aa-browse-btn"><a href="<?php echo $this->getUrl()->getUrl('order','Admin_Order',['cartId'=>$this->getCart()->cartId],true);?>">Place Order</a></button><br><br>
</div>


