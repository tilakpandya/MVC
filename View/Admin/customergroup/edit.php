<?php
   $customergroup=$this->getCustomer_group();
?>
<div class="container"> 
    <h1 style="color:gray">Customer Group Form</h1>
      
        <form action="<?php echo $this->getUrl()->getUrl('save','Admin_CustomerGroup')?>" method="POST">
            <div class="form-group">
                        <table class="table">
                                <tr>
                                    <td>
                                        <input type="text" name="customergroup[name]" id="name" value="<?php echo $customergroup->Name?>"
                                            placeholder="Name" class="form-control">
                                    </td>
                                    <td>
                                        <select name="customergroup[default]" class="form-control">
                                            <option value=" ">select Status</option>
                                            <?php
                                            foreach ($customergroup->getDefaultOptions() as $key => $value) { ?>
                                            <option value="<?php echo $value?>"
                                                <?php if ($customergroup->Default == $value) {echo "Selected";}?>>
                                                <?php echo $value?>
                                            </option>
                                            <?php }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" name="submit" value="SAVE" class="btn btn-success btn-lg">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                        </table>
            </div> 
        </form> 
</div>       
               
