<?php
$product = $this->getTableRow(); 
$brads = $this->getBrand();
//print_r($brads)
?>
<h1 style="color:gray">Product Form</h1>

<form action="<?php echo $this->getUrl()->getUrl('save','Admin_Product_Product'); ?>" method="POST" id='form'>
        <div class="form-group contentHtml">
            <table class="table">
                    <tr>
                        <td>
                            <input type="text" name="product[name]" id="name" value="<?php echo $product->name;?>"
                                placeholder="Name" class="form-control">
                        </td>
                        <td>
                            <input type=" text" name="product[price]" id="price" value="<?php echo $product->price;?>"
                                placeholder="Price" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="product[quantity]" id="quantit"
                                value="<?php echo $product->quantity;?>" placeholder="Quantity" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="product[discount]" id="discount"
                                value="<?php echo $product->discount;?>" placeholder="Discount" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="product[brandId]" class="form-control">
                                <option value=" ">select Brand</option>
                                <?php
                                foreach ($brads as $key => $brand) { ?>
                                <option value="<?php echo $brand->id?>"
                                    <?php if ($product->brandId == $brand->id) {echo "Selected";}?>>
                                    <?php echo $brand->name?>
                                </option>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                            <select name="product[status]" class="form-control">
                                <option value=" ">select Status</option>
                                <?php
                                foreach ($product->getStatusOptions() as $key => $value) { ?>
                                <option value="<?php echo $value?>"
                                    <?php if ($product->status == $value) {echo "Selected";}?>>
                                    <?php echo $value?>
                                </option>
                                <?php }?>
                            </select>
                        </td>   
                    </tr>                    
                    <tr>    
                        <td>
                            <!-- <a><button type="button" onclick="mage.setForm($('#form')).load()" class="btn btn-success btn-lg">Save</button></a> -->
                            <input type="submit" value="SAVE" class="btn btn-success btn-lg">
                            </a>
                            <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Product_Product',null,null)?>">
                            <button type="button" class="btn btn-danger btn-lg">Cancel</button></a>
                        </td>
                    </tr>
                </table>   
            </div>
        </form>