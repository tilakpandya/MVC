<?php
$customerAddress = $this->getCustomerAddress();
/* echo"<pre>";
print_r($customerAddress); */
foreach ($customerAddress as $key => $address):
    /* echo"<pre>";
    print_r($address); */
endforeach; 
?>
<section>
    <div class="container">
        <h1 style="color:gray">Customer Billing Address Form</h1>
        <?php  ?>
            <form action="<?php echo $this->getUrl()->getUrl('save','Admin_Customer_CustomerAddress')?>" method="POST">
                <div class="form-group">
                    <table class="table">
                        <tr>
                            <td>
                                <input type="text" name="billing[address]" id="address" value="<?php //if($address->addressType=="Both" || $address->addressType=="Billing" ){echo $address->address;}?>"
                                    placeholder="Address" class="form-control">
                            </td>
                            <td>
                                <input type=" text" name="billing[city]" id="lastname" value="<?php //if($address->addressType=="Both" || $address->addressType=="Billing" ){echo $address->city;}?>"
                                    placeholder="City" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="billing[state]" id="state" value="<?php //if($address->addressType=="Both" || $address->addressType=="Billing" ){echo $address->state;}?>"
                                    placeholder="State" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="billing[zipcode]" id="zipcode" value="<?php //if($address->addressType=="Both" || $address->addressType=="Billing" ){echo $address->zipcode;}?>"
                                    placeholder="Zipcode" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <input type="text" name="billing[country]" id="country" value="<?php //if($address->addressType=="Both" || $address->addressType=="Billing" ){echo $address->country;}?>"
                                    placeholder="Country" class="form-control">
                            </td>
                            <td><td>
                        </tr>
                    </table>

                <h1 style="color:gray">Customer Shipping Address Form</h1>
                    <table class="table">
                        <tr>
                            <td>
                                <input type="text" name="shipping[address]" id="address" value="<?php //if($address->addressType=="Both" || $address->addressType=="Shippng" ){echo $address->address;}?>"
                                    placeholder="Address" class="form-control">
                            </td>
                            <td>
                                <input type=" text" name="shipping[city]" id="lastname" value="<?php //if($address->addressType=="Both" || $address->addressType=="Shippng" ){echo $address->city;}?>"
                                    placeholder="City" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="shipping[state]" id="state" value="<?php //if($address->addressType=="Both" || $address->addressType=="Shippng" ){echo $address->state;}?>"
                                    placeholder="State" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="shipping[zipcode]" id="zipcode" value="<?php //if($address->addressType=="Both" || $address->addressType=="Shippng" ){echo $address->city;}?>"
                                    placeholder="Zipcode" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <input type="text" name="shipping[country]" id="country" value="<?php //if($address->addressType=="Both" || $address->addressType=="Shippng" ){echo $address->country;}?>"
                                    placeholder="Country" class="form-control">
                            </td>
                            <td>
                                <input type="submit" name="submit" value="SAVE" class="btn btn-success btn-lg">
                                <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Customer_Customer',['id'=>null],true);?>" 
                                name="cancel" class="btn btn-danger btn-lg">Cancel</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        <?php ?>    
    </div>
</section>