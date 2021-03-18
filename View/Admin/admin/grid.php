<?php
$admin=$this->getAdmin();
?>
<section>
    <div class="container">
        <h1 style="color: gray">Admin</h1>
        <hr/>
        <a href="<?php echo $this->getUrl()->getUrl('form',null,['id'=>null],true)?>"><button type="button" class="btn btn-success">Add
                Admin</button></a>
        </br>
        <br>

        <div class="table-responsive">
            <table border=2 class="table table-sm table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Createdat</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
                <?php if (!$admin):?>
                <tr>
                    <td colspan=7>No Data Found....</td>
                </tr>
                <?php endif;?>
                <?php 
                    foreach ($admin as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $value->id?></td>
                    <td><?php echo $value->username?></td>
                    <td><?php echo $value->password?></td>
                    <td><?php echo $value->status?></td>
                    <td><?php echo $value->createdat?></td>
                    <td><?php echo $value->updatedat?></td>
                    <td>
                        <a href='<?php echo $this->getUrl()->getUrl("form",NULL,['id'=> $value->id])."&id={$value->id}"?>'
                        class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></a>

                        <a href='<?php echo $this->getUrl()->getUrl("delete",NULL,['id'=> $value->id])."&id={$value->id}"?>'
                        class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span></a>
                </tr>

                <?php
                 }
                ?>
            </table>


        </div>
    </div>
</section>