<?php
$product_category=$this->getProductCategory();
 echo "<pre>";
print_r($product_category); 
$categories = $this->getCategory();
?>
<div class="container">
    <h1 style="color:gray">Product Category Form</h1><br>
    <form action="<?php echo $this->getUrl()->getUrl('save');?>" method="POST">
        <input type="submit" onclick="submitForm(this)" value="UPDATE" class="btn btn-success">
        </br></br>
            <table class="table">
                <tbody>
                    <tr>
                        <th>Category Id</th>
                        <th>Name</th>
                        <th>Check Boxes</th>
                    </tr>
                    <?php if (!$categories):?>
                        <tr colspan=5>
                            <td>No Data Found....</td>
                        </tr>
                    <?php endif; ?>    
                    <?php foreach($categories as $key=>$category):?>
                    <tr>
                        <td><?php echo $category->id;?></td>
                        <td><?php echo $category->name;?></td>
                        <td><input type='checkbox' class="form-control" name="category[<?php echo $category->id?>]" value="<?php echo $category->id?>"
                                <?php if($product_category->categoryId == $category->id){ echo 'checked';}?>>
                        </td>
                    </tr>   
                    <?php endforeach; ?> 
                </tbody>
            </table>
    </form>
</div>
<script>

    function submitForm(button) {
        var form = $(button).closest('form');
        $(form).attr('action','<?php echo $this->getUrl()->getUrl('save','Admin_Product_ProductCategory'); ?>');
        form.submit();
    }
 
</script>