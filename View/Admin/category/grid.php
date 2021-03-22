<?php
$categories=$this->getCategory();
$categoriesOptions=$this->getCategoriesOptions();
/* echo"<pre>";
print_r($op); */
?>
<section>
    <div class="container">
        <h1 style="color: gray">Category</h1>
        <hr />
       <!--  <a onclick="mage.setUrl('<?php //echo $this->getUrl()->getUrl('form','Admin_Category',null,null)?>').resetParams().load()"><button type="button" class="btn btn-success">Add
                Product</button></a></br> -->
        <a href='<?php echo $this->getUrl()->getUrl('form',null,['id'=>null],true)?>'><button type="button" class="btn btn-success">Add
            Category</button></a></br>
        <br>

        <div class="table-responsive">
            <table border=2 class="table table-sm table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Featured</th>
                    <th>Parent Id</td>
                    <th>Path Id</td>
                    <th>status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                <?php if(!$categories):?>
                <tr>
                    <td colspan=9>No Data Availible...</td>    
                </tr>
                <?php endif;?>
                <?php foreach ($categories as $key => $value) { ?>
                <tr>
                    <td><?php echo $value->id?></td>
                    <td><?php echo $this->getName($value);?></td>
                    <td><?php echo $value->description?></td>
                    <td><?php echo $value->featured?></td>
                    <td><?php echo $value->parentId?></td>
                    <td><?php echo $value->pathId?></td>
                    <td><?php echo $value->status?></td>
                    <td><?php echo $value->createdat?></td>
                    <td><?php echo $value->updatedat?></td>
                    
                    <td>
                    <a href='<?php echo $this->getUrl()->getUrl("form",NULL,['id'=> $value->id])?>'
                        class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></a>


                        <a href='<?php echo $this->getUrl()->getUrl("delete",NULL,['id'=> $value->id])?>'
                        class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span> </a>
                </tr>

                <?php
                 }
                ?>
            </table>


        </div>
    </div>
</section>