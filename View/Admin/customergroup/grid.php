<?php
$customerGroup=$this->getCustomer_group(); 
//print_r($customerGroup);
?>
<section>
    <div class="container">
        <h1 style="color: gray">Customer Group</h1>
        <hr />
        <a href="<?php echo $this->getUrl()->getUrl('form',null,['id'=>null],true)?>"><button type="button" class="btn btn-success">Add
                customer group</button></a>
        </br>
        <br>

        <div class="table-responsive">
            <table border=2 class="table table-sm table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Default</th>
                    <th>Createdat</th>
                    <th>Action</th>
                </tr>
                <?php if (!$customerGroup):?>
                <tr>
                    <td colspan=5>No Data Found....</td>
                </tr>
                <?php endif;?>
                <?php 
                    foreach ($customerGroup as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $value->id?></td>
                    <td><?php echo $value->Name?></td>
                    <td><?php echo $value->Default?></td>
                    <td><?php echo $value->createdat?></td>
                    <td>
                        <a href='<?php echo $this->getUrl()->getUrl("form",'Admin_CustomerGroup',['id'=> $value->id])."&id={$value->id}"?>'
                        class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></a>

                        <a href='<?php echo $this->getUrl()->getUrl("delete",'Admin_CustomerGroup',['id'=> $value->id])."&id={$value->id}"?>'
                        class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span></a>
                </tr>

                <?php
                 }
                ?>
            </table>


        </div>
    </div>
</section>