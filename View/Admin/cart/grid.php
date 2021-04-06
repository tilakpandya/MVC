<?php 
$items=$this->getCart()->getItems();
$customers = $this->getCustomers(); 
$customer = $this->getCart()->getCustomer();
?>
<div class='container'>
    <h1 style="color:gray">Cart</h1>
    <hr>
    
    <form action="<?php echo $this->getUrl()->getUrl('update');?>" method="POST" id="cartForm">
        <div class="form-group">
        <table class="table">
                    <thead>
                    <tr>
                        <td><a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Product_Product');?>"><button type="button" class="aa-cart-view-btn"><span class="glyphicon glyphicon-chevron-left"></span></button></a></td>
                        <td colspan="7"><button type="submit" value="Update Cart" class="aa-cart-view-btn"><span class="glyphicon glyphicon-refresh"></span></button><br><br></td>

                    </tr>
                    <tr>
                        <td colspan="7">
                            <select name="customer" class="form-control">
                                <option>Select Customer</option>
                                <?php foreach ($customers as $key => $value):?>
                                    <option value="<?= $value->id?>" name="customer" <?php if($value->id == $customer->id){ echo "Selected";}?>> <?= $value->firstname?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                        <td>
                            <button type="button" class="aa-cart-view-btn" onclick="selectCustomer();">Go</button>
                        </td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Product Id</th>
                        <th>price</th>
                        <th>Quantity</th>
                        <th>Row Total</th>
                        <th>Discount</th>
                        <th>Final Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!$items) :?>
                        <tr>
                            <td colspan=8>No Record Found</td>
                        </tr>
                    <?php endif?>
                    <?php foreach ($items as $key => $attribute):?>
                      <tr>
                        <td><?php echo $attribute->cartItemId;?></td>
                        <td><?php echo $attribute->productId;?></td>
                        <td><?php echo $attribute->price;?></td>
                        <td><input type="number" name="quantity[<?= $attribute->cartItemId ?>]" value="<?php echo $attribute->quantity;?>"></td>
                        <td><?php echo $attribute->quantity * $attribute->price;?></td>
                        <td><?php echo $attribute->discount * $attribute->quantity;?></td>
                        <td><?php echo ($attribute->quantity * $attribute->price - $attribute->discount * $attribute->quantity);?></td>
                        <td>
                            <a href='<?php echo $this->getUrl()->getUrl("delete",NULL,['id'=> $attribute->cartItemId])?>'
                            class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span> </a>
                        <td>
                      </tr>
                      <?php endforeach?>
                      <tr>
                        <td colspan="8"><?php if($items):?><a href="<?= $this->getUrl()->getUrl('checkout');?>" class="aa-cart-view-btn" >Proced to Checkout</a><?php endif;?></td>
                       
                    </tr>
                      </tbody>
                  </table>
                  <br><br>

        </div> 
    </form>
    
</div>   

<script type="text/javascript">
    function selectCustomer() {
        var form = document.getElementById('cartForm');
        form.setAttribute('Action','<?php echo $this->getUrl()->getUrl('selectCustomer','Admin_Cart');?>');
        form.submit();
    }
</script>
           