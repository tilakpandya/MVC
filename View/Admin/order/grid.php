<?php  
$cart=$this->getCart();
$cartItems=$this->getCart()->getItems();
$address=($this->getShippingAddress());
$customer = $this->getCart()->getCustomer();
$shippingCharges = $this->getShippingCharges()->amount; 
$paymentMethod = $this->getPaymentMethod();


?>
<div class="container">
<h1 style="color:gray" align="center">Order Details</h1>
    <hr>
    <h3 style="color:gray">Customer Details</h3>
    <table class="table table-responsive">
            <tr>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Payment Method</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Zipcode</th>
            </tr>
            <tr>
                <td><?= $customer->firstname.' '.$customer->lastname?></td>
                <td><?= $customer->email?></td>
                <td><?= $paymentMethod?></td>
                <td><?= $address->address?></td>
                <td><?= $address->city?></td>
                <td><?= $address->state?></td>
                <td><?= $address->country?></td>
                <td><?= $address->zipcode?></td>                
            </tr>
    </table>
    <h3 style="color:gray">Product Details</h3>
    
    <table class="table table-responsive">
        <tr>
                            <th>ProductId</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th colspan=3>Product discount</th>                            
                            
        </tr>
        <?php foreach ($cartItems as $key => $item):?>
            <tr>
                                <td><?= $item->productId?></td>
                                <td>₹<?= $item->price?></td>
                                <td><?= $item->quantity?></td>
                                <td colspan=3>₹<?= $item->discount?></td>
                                
            </tr>
        <?php endforeach;?>                
            <tr>
            <th>Product Total Price</th>
            <td>₹<?= $cart->total?></td>
            <th>Shipping Charges</th>
            <td>₹<?= $shippingCharges?></td>
            <th>Final Price</th>
            <td>₹<?= $cart->shippingAmount?></td>
            </tr>
    </table>
    
    <button class="aa-browse-btn"><a href="<?php echo $this->getUrl()->getUrl('order','Admin_Order',['cartId'=>$this->getCart()->cartId],true);?>">Place Order</a></button><br><br>
</div>


