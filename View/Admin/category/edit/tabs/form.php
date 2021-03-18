<?php
   $category=$this->getTableRow(); 
   $options = $this->getCategoriesOptions();

?>
<h1 style="color:gray">Category Form</h1>
<hr>
<form action="<?php echo $this->getFormUrl(); ?>" method="POST">
  <div class="form-group">
            <table class="table">
                    <tr>
                        <td>
                            <input type="text" name="category[name]" id="name" value="<?php echo $category->name?>"
                                placeholder="Name" class="form-control">
                        </td>
                        <td>
                            <input type=" text" name="category[description]" id="description" value="<?php echo $category->description?>"
                                placeholder="Description" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="category[status]" class="form-control">
                                <option value=" ">select Status</option>
                                <?php
                                foreach ($category->getStatusOptions() as $key => $value) { ?>
                                <option value="<?php echo $value?>"
                                    <?php if ($category->status == $value) {echo "Selected";}?>>
                                    <?php echo $value?>
                                </option>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                        <select name="category[parentId]" class="form-control">
                        <option value=" ">select</option>
                                <?php
                                foreach ($options as $key => $value) { ?>
                                <option value="<?php print_r($key)?>"
                                <?php if($key == $category->parentId){ echo "Selected";} ?>>
                                    <?php print_r($value)?>
                                   
                                </option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Save" class="btn btn-success btn-lg">
                        </td>
                        <td>
                            <a href="<?php echo $this->getUrl()->getUrl('grid',NULL,['id'=>null],true);?>" name="cancel" class="btn btn-danger btn-lg">Cancel</a>
                        </td>
                    </tr>
                </table>
    </div>   
</form>     