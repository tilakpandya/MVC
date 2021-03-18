<?php
$media=$this->getMedia();

?>
<div class="container">    
        <h1 style="color: gray">Product Media</h1>
        <hr/>
        <br>

     <form method='POST' action="<?php echo $this->getUrl()->getUrl('save','Admin_Product_media')?>">
          
            <input type="submit" onclick="submitForm(this)" name="Update" value="UPDATE" class="btn btn-success">
            <input type="submit" value="delete" name="Delete" onclick="deleteData(this)" class="btn btn-danger">
            </br></br>
            <table border=2 class="table table-sm table-striped table-bordered">
                <tr>
                    <th>Image</th>
                    <th>Label</th>
                    <th>Small</th>
                    <th>Thumbnail</th>
                    <th>Base</th>
                    <th>Gallery</th>
                    <th>Remove</th>
                </tr>
                <?php 
                
               foreach ($media as $key => $value) {
                ?>
                <tr>
                    <td><img src='Skin\Images\product\<?php echo $value->image;?>' height="100" width="150"></td>
                    <td><input type="text" name="label[<?php echo $value->id ?>]" class="form-control" value="<?php echo $value->label; ?>"></td>
                    <td><input type="radio" name="small" class="form-control" value="<?php echo $value->id ?>" <?php if($value->small){echo 'checked';} ?> ></td>
                    <td><input type="radio" name="thumbnail" class="form-control" value="<?php echo $value->id ?>" <?php if($value->thumbnail){echo 'checked';} ?>></td>
                    <td><input type="radio" name="base" class="form-control" value="<?php echo $value->id ?>" <?php if($value->base){echo 'checked';} ?>></td>
                    <td><input type="checkbox" name="gallery[<?php echo $value->id ?>]" value="<?php echo $value->id ?>" class="form-control" <?php if($value->gallery){echo 'checked';} ?>></td>
                    <td><input type="checkbox" name="media[data][<?php echo $value->id ?>][remove]" value="<?php echo $value->id ?>" class="form-control"></td>  
                </tr>
            <?php
                }
            ?>
            </table>            
        </form> 

        <form method="POST" action="<?php echo $this->getUrl()->getUrl('_imageUpload','Admin_Product_media')?>" enctype="multipart/form-data">
            <input type="file"  id="image" name="image" class="form-control" required/>
            <input type="submit" value="SAVE" class="btn btn-success">
        </form>
</div>
<script>

    function submitForm(button) {
        var form = $(button).closest('form');
        $(form).attr('action','<?php echo $this->getUrl()->getUrl('save','Admin_Product_media'); ?>');
        form.submit();
    }

    function deleteData(button) {
        var form = $(button).closest('form');
        $(form).attr('action','<?php echo $this->getUrl()->getUrl('delete','Admin_Product_media'); ?>');
        form.submit();
    }    
</script>