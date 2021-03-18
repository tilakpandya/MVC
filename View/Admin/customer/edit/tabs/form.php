<?php
   $customer=$this->getTableRow(); 
   $type=$customer->getCustomerType();
?>
<h1 style="color:gray">Customer Form</h1>
<form action="<?php echo $this->getUrl()->getUrl('save')?>" method="POST">
    <div class="form-group">
        <table class="table">
            <tr>
                <td colspan=2>
                    <select name="customer[group_id]" class="form-control" required>
                        <option value=" ">Customer Type</option>
                            <?php foreach ($type as $key=>$value) { ?>
                                <option value="<?php echo $value->id;?>"
                                    <?php if($customer->group_id == $value->id){echo "Selected";}?>>
                                    <?php echo $value->Name;?>
                                </option>
                            <?php }?> 
                    </select>
                </td> 
            </tr>
            <tr>
                        <td>
                            <input type="text" name="customer[firstname]" id="firstname" value="<?php echo $customer->firstname?>"
                                placeholder="First Name" class="form-control">
                        </td>
                        <td>
                            <input type=" text" name="customer[lastname]" id="lastname" value="<?php echo $customer->lastname?>"
                                placeholder="Last Name" class="form-control">
                        </td>
            </tr>
            <tr>
                        <td>
                            <input type="email" name="customer[email]" id="email" value="<?php echo $customer->email?>"
                                placeholder="Email" class="form-control">
                        </td>
                        <td>
                            <input type="password" name="customer[password]" id="password" value="<?php echo $customer->password?>"
                                placeholder="Password" class="form-control">
                        </td>
            </tr>
            <tr>
                        <td>
                            <select name="customer[status]" class="form-control">
                                <option value=" ">select Status</option>
                                <?php
                                foreach ($customer->getStatusOptions() as $key => $value) { ?>
                                <option value="<?php echo $value?>"
                                    <?php if ($customer->status == $value) {echo "Selected";}?>>
                                    <?php echo $value?>
                                </option>
                                <?php }?>
                            </select>
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