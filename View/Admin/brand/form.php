<?php
$brand=$this->getBrand();
?>
<section>
    <div class="container">
        <h1 style="color:gray">Brand Form</h1>
        <p style="color:red" id="err_msg"></p>


        <form action="<?php echo $this->getUrl()->getUrl('save')?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td>
                            <input type="text" name="brand[name]" id="name" value="<?php echo $brand->name?>"
                                placeholder="Name" class="form-control">
                        </td>
                        <td>
                                <select name="brand[status]" class="form-control">
                                <option value=" ">select Status</option>
                                <?php
                                foreach ($brand->getStatusOptions() as $key => $value) { ?>
                                <option value="<?php echo $value?>"
                                    <?php if ($brand->status == $value) {echo "Selected";}?>>
                                    <?php echo $value?>
                                </option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2>
                            <input type="file"  id="image" name="image" value="<?php echo $brand->image?>" class="form-control" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="SAVE" class="btn btn-success btn-lg">
                        </td>
                        <td>
                            <a href="<?php echo $this->getUrl()->getUrl('grid',NULL,['id'=>null],true);?>" name="cancel" class="btn btn-danger btn-lg">Cancel</a>
                        </td>
                    </tr>



                </table>
            </div>
        </form>
    </div>
</section>