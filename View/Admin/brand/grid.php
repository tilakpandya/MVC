<?php
$brands=$this->getBrand();
?>
<section>
    <div class="container">
        <h1 style="color: gray">Brand</h1>
        <hr />
        <a href="<?php echo $this->getUrl()->getUrl('form',null,['id'=>null],true)?>"><button type="button" class="btn btn-success">Add
                Brands</button></a>
        </br>
        <br>

        <div class="table-responsive">
            <table border=2 class="table table-sm table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
                <?php if (!$brands):?>
                <tr>
                    <td colspan=7>No Data Found....</td>
                </tr>
                <?php endif;?>
                <?php 
                    foreach ($brands as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $value->id?></td>
                    <td><?php echo $value->name?></td>
                    <td><img src='Skin\Images\Brand\<?php echo $value->image;?>' height="110" width="150" ></td>
                    <td><?php echo $value->status?></td>
                    <td>
                    <a href='<?php echo $this->getUrl()->getUrl("form",NULL,['id'=> $value->id])?>'
                        class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></a>

                        <a href='<?php echo $this->getUrl()->getUrl("delete",NULL,['id'=> $value->id])?>'
                        class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span> </a>
                </tr>

                <?php
                 }
                ?>
            </table>


        </div>
    </div>
</section>