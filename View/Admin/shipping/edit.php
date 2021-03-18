<?php
   $shipping=$this->getShipping(); 
?>
<section>
    <div class="container">
        <h1 style="color:gray">Shipping Form</h1>
        <p style="color:red" id="err_msg"></p>


        <form action="<?php echo $this->getUrl()->getUrl('save')?>" method="POST">
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td>
                            <input type="text" name="shipping[name]" id="name" value="<?php echo $shipping->name?>"
                                placeholder="Name" class="form-control">
                        </td>
                        <td>
                            <input type=" text" name="shipping[code]" id="code" value="<?php echo $shipping->code?>"
                                placeholder="Code" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="shipping[amount]" id="amount"
                                value="<?php echo $shipping->amount?>" placeholder="Amount" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="shipping[description]" id="description"
                                value="<?php echo $shipping->description?>" placeholder="Description"
                                class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="shipping[status]" class="form-control">
                                <option value=" ">select Status</option>
                                <?php
                                foreach ($shipping->getStatusOptions() as $key => $value) { ?>
                                <option value="<?php echo $value?>"
                                    <?php if ($shipping->status == $value) {echo "Selected";}?>>
                                    <?php echo $value?>
                                </option>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                            <input type="submit" name="submit" value="SAVE" class="btn btn-success btn-lg">
                        </td>
                    </tr>

                    <br>

                </table>
            </div>
        </form>
    </div>
</section>