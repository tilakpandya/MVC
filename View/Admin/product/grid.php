<?php
$product=$this->getProducts();
?>
<section>
    <div class="container">
        <h1 style="color: gray">Products</h1>
        <hr />
        <!-- <a onclick="mage.setUrl('<?php #echo $this->getUrl()->getUrl('form','Admin_Product_Product',null,null)?>').resetParams().load()"><button type="button" class="btn btn-success">Add
                Product</button></a> -->
        <a href="<?php echo $this->getUrl()->getUrl('form',null,['id'=>null],true)?>"><button type="button" class="btn btn-success">Add
                Product</button></a>        
        
        </br>
        <br>

        <div class="table-responsive">
            <table border=2 class="table table-sm table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>quantity</th>
                    <th>discount</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
                <?php if (!$product):?>
                <tr>
                    <td colspan=7>No Data Found....</td>
                </tr>
                <?php endif;?>
                <?php 
                foreach ($product as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $value->id?></td>
                    <td><?php echo $value->name?></td>
                    <td><?php echo $value->price?></td>
                    <td><?php echo $value->quantity?></td>
                    <td><?php echo $value->discount?></td>
                    <td><?php echo $value->status?></td>
                    <td>         
                    <a href='<?php echo $this->getUrl()->getUrl("form",NULL,['id'=> $value->id])?>'
                        class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></a>
               
                        <!-- <a onclick="mage.setUrl('<?php //echo $this->getUrl()->getUrl('form',NULL,['id'=> $value->id])?>').resetParams().load();" herf="javascript:void(0);"
                            class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></a> -->

                        <a href="<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=> $value->id])?>" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span></a>
                </tr>

                <?php
                 }
                ?>
            </table>


        </div>
    </div>
</section>