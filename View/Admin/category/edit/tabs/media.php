<?php
$medias=$this->getMedia();

?>
<div class="container">    
        <h1 style="color: gray">Category Media</h1>
        <hr/>
        <br>

     <form method='POST' action="<?php echo $this->getUrl()->getUrl('save','Admin_Category_Media')?>">
          
            <input type="submit" onclick="submitForm(this)" name="Update" value="UPDATE" class="btn btn-success">
            <input type="submit" value="delete" name="Delete" onclick="deleteData(this)" class="btn btn-danger">
            </br></br>
            <table border=2 class="table table-sm table-striped table-bordered">
                <tr>
                    <th>Image</th>
                    <th>Label</th>
                    <th>Icon</th>
                    <th>Base</th>
                    <th>Banner</th>
                    <th>Active</th>
                    <th>Remove</th>
                </tr>
                <?php if(!$medias):?>
                    <tr>
                        <td colspan=7>No Data Found....</td>
                    </tr>
                <?php endif;?>
                <?php 
                
               foreach ($medias as $key => $media) {
                ?>
                <tr>
                    <td><img src='Skin\Images\Category\<?php echo $media->image;?>' height="100" width="150"></td>
                    <td><input type="text" name="label[<?php echo $media->id ?>]" class="form-control" value="<?php echo $media->label; ?>"></td>
                    <td><input type="radio" name="icon" class="form-control" value="<?php echo $media->id ?>" <?php if($media->icon){echo 'checked';} ?> ></td>
                    <td><input type="radio" name="base" class="form-control" value="<?php echo $media->id ?>" <?php if($media->base){echo 'checked';} ?>></td>
                    <td><input type="checkbox" name="banner[<?php echo $media->id ?>]" value="<?php echo $media->id ?>" class="form-control" <?php if($media->banner){echo 'checked';} ?>></td>
                    <td>
                        <select name="active" class="form-control">
                            <option value=" ">select</option>
                                <?php
                                    foreach ($this->getStatusOptions() as $key => $value) { ?>
                                    <option value="<?php echo $key?>" <?php if ($medias->active == $key) {echo "Selected";}?>>
                                        <?php echo $value;?>
                                    </option>
                                <?php }?>
                        </select>
                    </td>
                    <td><input type="checkbox" name="media[data][<?php echo $media->id ?>][remove]" value="<?php echo $media->id ?>" class="form-control"></td>  
                </tr>
            <?php
                }
            ?>
            </table>            
        </form> 

        <form method="POST" action="<?php echo $this->getUrl()->getUrl('_imageUpload','Admin_Category_media')?>" enctype="multipart/form-data">
            <input type="file"  id="image" name="image" class="form-control" required/>
            <input type="submit" value="SAVE" class="btn btn-success">
        </form>
</div>
<script>

    function submitForm(button) {
        var form = $(button).closest('form');
        $(form).attr('action','<?php echo $this->getUrl()->getUrl('save','Admin_Category_Media'); ?>');
        form.submit();
    }

    function deleteData(button) {
        var form = $(button).closest('form');
        $(form).attr('action','<?php echo $this->getUrl()->getUrl('delete','Admin_Category_media'); ?>');
        form.submit();
    }    
</script>