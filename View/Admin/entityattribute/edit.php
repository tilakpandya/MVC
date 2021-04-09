<?php
$attribute = $this->getAttribute();

?>
<section>
    <div class="container">
        <h1 style="color:gray">Attribute Form</h1>
        <p style="color:red" id="err_msg"></p>

        <form action="<?php echo $this->getUrl()->getUrl('save')?>" method="POST">
            <div class="form-group">
                <table class="table">
                <tr>
                        <td colspan=2>
                        <select name="attribute[EntityTypeId]" class="form-control">
                                <option value=" ">select EntityTypeId</option>
                                <?php
                                foreach ($attribute->getEntityIdOption() as $key => $value) { ?>
                                <option value="<?php echo $value?>"
                                    <?php if ($attribute->entityTypeId == $value) {echo "Selected";} ?>>
                                    <?php echo $value?>
                                </option>
                                <?php }?>
                            </select>     
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="attribute[name]" id="name" value="<?php echo $attribute->name?>"
                                placeholder="Name" class="form-control">
                        </td>
                        <td>
                            <input type=" text" name="attribute[code]" id="code" value="<?php echo $attribute->code?>"
                                placeholder="Code" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="attribute[inputType]" class="form-control">
                                <option value=" ">select Input Type</option>
                                <?php
                                foreach ($attribute->getInputTypeOption() as $key => $value) { ?>
                                <option value="<?php echo $value?>"
                                    <?php if ($attribute->inputType == $value) {echo "Selected";}?>>
                                    <?php echo $value?>
                                </option>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                        <select name="attribute[backEndType]" class="form-control">
                                <option value=" ">select Backend Type</option>
                                <?php
                                foreach ($attribute->getBackEndTypeOption() as $key => $value) { ?>
                                <option value="<?php echo $value?>"
                                    <?php if ($attribute->backendType == $value) {echo "Selected";}?>>
                                    <?php echo $value?>
                                </option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <input type="number" name="attribute[sortOrder]" id="name" value="<?php echo $attribute->sortOrder?>"
                                placeholder="sortOrder" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="attribute[backEndModel]" id="code" value="<?php echo $attribute->backendModel?>"
                                placeholder="backEndModel" class="form-control">
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