<?php
$shipping=$this->getShipping();
?>
<section>
    <div class="container">
        <h1 style="color: gray">Shippings</h1>
        <hr />
        <a href="<?php echo $this->getUrl()->getUrl('form',null,['id'=>null],true)?>"><button type="button" class="btn btn-success">Add
                Shipping</button></a>
        
        </br>
        <br>

        <div class="table-responsive">
            <table border=2 class="table table-sm table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>status</th>
                    <th>Createdat</th>
                    <th>Actions</th>
                </tr>
                <?php if (!$shipping):?>
                <tr>
                    <td colspan=8>No Data Found....</td>
                </tr>
                <?php endif;?>
                <?php 
                foreach ($shipping as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $value->id?></td>
                    <td><?php echo $value->name?></td>
                    <td><?php echo $value->code?></td>
                    <td><?php echo $value->amount?></td>
                    <td><?php echo $value->description?></td>
                    <td><?php echo $value->status?></td>
                    <td><?php echo $value->createdat?></td>
                    <td>
                    <a href='<?php echo $this->getUrl()->getUrl("form",NULL,['id'=> $value->id])?>'
                        class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></a>


                        <a href='<?php echo $this->getUrl()->getUrl("delete",NULL,['id'=> $value->id])?>'
                        class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span></a>
                </tr>

                <?php
                 }
                ?>
            </table>


        </div>
    </div>
</section>