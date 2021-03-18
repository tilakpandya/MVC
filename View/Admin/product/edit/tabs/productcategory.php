<?php
/* $product_category=$this->getTableRow();
print_r($product_category) */
//$category = $this->getCategory();
?>
<h1 style="color:gray">Product Category Form</h1><br>
            <input type="submit" onclick="submitForm(this)" name="Update" value="UPDATE" class="btn btn-success">
            </br></br>
<table class="table">
    <tbody>
        <tr>
            <th>Category Id</th>
            <th>Name</th>
            <th>Path</th>
            <th>Check Boxes</th>
            <th>Delete</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>    
    </tbody>
</table>

<script>

    function submitForm(button) {
        var form = $(button).closest('form');
        $(form).attr('action','<?php echo $this->getUrl()->getUrl('save','Admin_Product_ProductCategory'); ?>');
        form.submit();
    }
 
</script>