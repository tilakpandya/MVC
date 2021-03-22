<?php
$billingAddress = $this->getBilllingAddress()[0];
$shippingAddress = $this->getShippingAddress()[0];
/* echo"<pre>";
print_r($shippingAddress);
print_r($billingAddress); */

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
                                <input type="text" name="billing[address]" id="address" value="<?php echo $billingAddress->address; ?>"
                                    placeholder="Address" class="form-control">
                            </td>
                            <td>
                                <input type=" text" name="billing[city]" id="lastname" value="<?php echo $billingAddress->city; ?>"
                                    placeholder="City" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="billing[state]" id="state" value="<?php echo $billingAddress->state; ?>"
                                    placeholder="State" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="billing[zipcode]" id="zipcode" value="<?php echo $billingAddress->zipcode; ?>"
                                    placeholder="Zipcode" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <input type="text" name="billing[country]" id="country" value="<?php echo $billingAddress->country; ?>"
                                    placeholder="Country" class="form-control">
                            </td>
                            <td><td>
                        </tr>
                    </table>

                <h1 style="color:gray">Customer Shipping Address Form</h1>
                    <table class="table">
                        <tr>
                            <td>
                                <input type="text" name="shipping[address]" id="address" value="<?php echo $shippingAddress->address; ?>"
                                    placeholder="Address" class="form-control">
                            </td>
                            <td>
                                <input type=" text" name="shipping[city]" id="lastname" value="<?php echo $shippingAddress->city; ?>"
                                    placeholder="City" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="shipping[state]" id="state" value="<?php echo $shippingAddress->state; ?>"
                                    placeholder="State" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="shipping[zipcode]" id="zipcode" value="<?php echo $shippingAddress->zipcode; ?>"
                                    placeholder="Zipcode" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <input type="text" name="shipping[country]" id="country" value="<?php echo $shippingAddress->country; ?>"
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