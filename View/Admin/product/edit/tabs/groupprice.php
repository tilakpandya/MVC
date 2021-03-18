<?php
   $product = $this->getTableRow(); ;
   $customerGroup = $this->getCustomerGroup();
   /*  echo "<pre>";
   print_r($customerGroup) */
?>
<div class="container">
<h1>Price Group Form</h1>
<hr>
    <form action="<?php echo $this->getUrl()->getUrl('save','Admin_Product_GroupPrice'); ?>" method="POST" id='form'>
        <div class="form-group contentHtml">
            <div class="form-group">
            <input type="submit" value="Update" class="btn btn-success"><br><br>
            <table class="table">
                    <tr>
                        <td>Group Id</td>
                        <td>Group Name</td>
                        <td>Price</td>
                        <td>New/Exist</td>
                        <td>Group Price</td>
                    </tr>
                    <tr>
                        <?php foreach ($customerGroup as $key => $value): ?>
                        <?php $rowStatus=($value->entityId)?'Exist':'New';?> 
                            <td><?php echo $value->id?></td>
                            <td><?php echo $value->Name?></td>
                            <td><?php echo $value->price ?></td>
                            <td><?php echo $rowStatus;?></td>  
                            <td><input type="text" name="groupPrice[<?php echo $rowStatus; ?>][<?php echo $value->id;?>]"
                                value="<?php echo $value->groupPrice;?>"></td> 
                    </tr>
                        <?php endforeach;?>  
            </table>   
        </div>
    </form>
</div>        