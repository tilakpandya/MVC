<?php
$customer=$this->getCustomer();
/* echo"<pre>";
print_r($customer); */
?>
<section>
    <div class="container">
        <h1 style="color: gray">Customer</h1>
        <hr />
        <a href="<?php echo $this->getUrl()->getUrl('form',null,['id'=>null],true)?>"><button type="button" class="btn btn-success">Add
                Customer</button></a>
        </br>
        <br>

        <div class="table-responsive">
            <table border=2 class="table table-sm table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address Type</th>
                    <th>Status</th>
                    <th>Customer Type</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zipcode</th>
                    <th>Country</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th></th>
                </tr>
                <?php 
                if(!$customer):?>
                <tr><td colspan=15>No Data Found...</td></tr>
                <?php endif?>

                <?php    
                foreach ($customer as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $value->id?></td>
                    <td><?php echo $value->firstname?></td>
                    <td><?php echo $value->lastname?></td>
                    <td><?php echo $value->email?></td>
                    <td><?php echo $value->addressType?></td>
                    <td><?php echo $value->status?></td>
                    <td><?php echo $value->Name?></td>
                    <td><?php echo $value->address?></td>
                    <td><?php echo $value->city?></td>
                    <td><?php echo $value->state?></td>
                    <td><?php echo $value->zipcode?></td>
                    <td><?php echo $value->country?></td>
                    <td><?php echo $value->createdat?></td>
                    <td><?php echo $value->updatedat?></td>
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