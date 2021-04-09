<?php

$items = $this->getCart()->getItems();
$customer = $this->getCart()->getCustomer();
$cartBillingAddress = $this->getBillingAddress();
$cartShippingAddress = $this->getShippingAddress(); 
$shippingMethod = $this->getShippingMethod(); 
$paymentMethod = $this->getPaymentMethod(); 

/* echo "<pre>";
print_r($this->getCart());  */
?>

 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
         
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
               
                <form action="<?php echo $this->getUrl()->getUrl('save','Admin_Cart')?>" method="POST">
                <div class="form-group">
                            <h1 style="color:gray">Billing Address Form</h1>
                            <table class="table">
                                <tr>
                                    <td>
                                        <input type="text" name="billing[address]" id="address" value="<?php echo $cartBillingAddress->address?>"
                                            placeholder="Address" class="form-control">
                                    </td>
                                    <td>
                                        <input type=" text" name="billing[city]" id="lastname" value="<?php echo $cartBillingAddress->city?>"
                                            placeholder="City" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="billing[state]" id="state" value="<?php echo $cartBillingAddress->state?>"
                                            placeholder="State" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="billing[zipcode]" id="zipcode" value="<?php echo $cartBillingAddress->zipcode?>"
                                            placeholder="Zipcode" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <input type="text" name="billing[country]" id="country" value="<?php echo $cartBillingAddress->country?>"
                                            placeholder="Country" class="form-control">
                                    </td>
                                    <td>
                                        Save to Address book : <input type="checkbox" name="billingSaveAddressBook">
                                    </td>
                                </tr>

                            </table>

                            <h1 style="color:gray">Shipping Address Form</h1>
                            <table class="table">
                                <tr>
                                    <td colspan="2">
                                        Same as Billing Address : &nbsp<input type="checkbox" name="sameasbilling"class="form-check-input" id="sameasbilling" onclick="myCheckbox();"
                                        <?php if ($cartBillingAddress->sameAsBilling){echo "Checked";}?> >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="shipping[address]" id="shippingAddress" value="<?php echo $cartShippingAddress->address;?>"
                                            placeholder="Address" class="form-control" <?php if ($cartBillingAddress->sameAsBilling){echo "Disabled";}?>>
                                    </td>
                                    <td>
                                        <input type=" text" name="shipping[city]" id="shippingCity" value="<?php echo $cartShippingAddress->city;?>"
                                            placeholder="City" class="form-control" <?php if ($cartBillingAddress->sameAsBilling){echo "Disabled";}?>>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="shipping[state]" id="shippingState" value="<?php echo $cartShippingAddress->state;?>"
                                            placeholder="State" class="form-control" <?php if ($cartBillingAddress->sameAsBilling){echo "Disabled";}?>>
                                    </td>
                                    <td>
                                        <input type="text" name="shipping[zipcode]" id="shippingZipcode" value="<?php echo $cartShippingAddress->zipcode;?>"
                                            placeholder="Zipcode" class="form-control" <?php if ($cartBillingAddress->sameAsBilling){echo "Disabled";}?>>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <input type="text" name="shipping[country]" id="shippingCountry" value="<?php echo $cartShippingAddress->country; ?>"
                                            placeholder="Country" class="form-control" <?php if ($cartBillingAddress->sameAsBilling){echo "Disabled";}?>>
                                    </td>
                                    <td>
                                        Save to Address book : <input type="checkbox" id="shippingSaveAddressBook" name="shippingSaveAddressBook" <?php if ($cartBillingAddress->sameAsBilling){echo "Disabled";}?>>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                    <input type="submit" value="SAVE" class="aa-browse-btn"> 
                                        <a href="<?php echo $this->getUrl()->getUrl('index','Admin_Cart',['id'=>null],true);?>" 
                                        name="cancel" class="aa-browse-btn">Cancel</a>
                                    </div>
                                </tr>
                            </table>
                        </div>
               
            
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product Id</th>
                          <th>Quantity</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php foreach($items as $key=>$item):?>
                            <tr>
                            <td><?= $item->productId;?></td>
                            <td><?= $item->quantity;?></td>
                            <td>₹<?= $total = $item->price * $item->quantity;?><?php $subtotal = $subtotal + $total;?></td>
                            </tr>
                        <?php endforeach;?>   
                        
                      </tbody>
                      <tfoot>
                         <tr>
                          <th colspan="2">Total</th>
                          <td>₹<?= $subtotal?></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">
                    <?php foreach ($paymentMethod as $key => $payment):?>
                      <label for="<?= $payment->name?>"><input type="radio" id="<?= $payment->name?>" value="<?= $payment->id?>" name="paymentMethod" <?php if($payment->id == $this->getCart()->paymentMethodId){ echo "Checked";}?>> <?= $payment->name?></label>
                      
                    <?php endforeach;?>
                    <br><br>
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">    
                  </div><br>
                  <h4>Shipping Method</h4>
                  <div class="aa-payment-method">
                    <?php foreach ($shippingMethod as $key => $shipping):?>
                      <label for="<?= $shipping->name?>"><input type="radio" id="<?= $shipping->name?>" value="<?= $shipping->id?>" name="shippingMethod" <?php if($shipping->id == $this->getCart()->shippingMethodId){ echo "Checked";}?>> <?= $shipping->name?> <strong>₹<?= $shipping->amount?></strong></label>  
                    <?php endforeach;?>
                  </div>
                  </form> 
                </div>
              </div>
            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
 <script>
        function myCheckbox() {
            var sameasbilling = document.getElementById("sameasbilling");
            if (sameasbilling.checked == true) {
                document.getElementById("shippingAddress").disabled = true;
                document.getElementById("shippingCity").disabled = true;
                document.getElementById("shippingState").disabled = true;
                document.getElementById("shippingZipcode").disabled = true;
                document.getElementById("shippingCountry").disabled = true;
                document.getElementById("shippingSaveAddressBook").disabled = true;
 


            }else{
                document.getElementById("shippingAddress").disabled = false;
                document.getElementById("shippingCity").disabled = false;
                document.getElementById("shippingState").disabled = false;
                document.getElementById("shippingZipcode").disabled = false;
                document.getElementById("shippingCountry").disabled = false; 
                document.getElementById("shippingSaveAddressBook").disabled = false;
           
            }
        }


</script>     
                   