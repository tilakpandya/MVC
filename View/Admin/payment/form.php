<?php
$payments=$this->getPayment();
?>
<section>
    <div class="container">
        <h1 style="color:gray">Payment Form</h1>
        <p style="color:red" id="err_msg"></p>


        <form action="<?php echo $this->getUrl()->getUrl('save')?>" method="POST">
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td>
                            <input type="text" name="payment[name]" id="name" value="<?php echo $payments->name?>"
                                placeholder="Name" class="form-control">
                        </td>
                        <td>
                            <input type=" text" name="payment[code]" id="code" value="<?php echo $payments->code?>"
                                placeholder="Code" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="payment[status]" class="form-control">
                                <option value=" ">select Status</option>
                                <?php
                                foreach ($payments->getStatusOptions() as $key => $value) { ?>
                                <option value="<?php echo $value?>"
                                    <?php if ($payments->status == $value) {echo "Selected";}?>>
                                    <?php echo $value?>
                                </option>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="payment[description]" id="description"
                                value="<?php echo $payments->description?>" placeholder="Description"
                                class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="SAVE" class="btn btn-success btn-lg">
                        </td>
                        <td></td>
                    </tr>



                </table>
            </div>
        </form>
    </div>
</section>