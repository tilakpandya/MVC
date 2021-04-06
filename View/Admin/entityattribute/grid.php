<?php
   //print_r($type);
   $attributes = $this->getAttribute();
   //print_r($attributes);
?>
<div class='container'>
    <h1 style="color:gray">Attribute Grid</h1>
    <hr>
    <a href="<?php echo $this->getUrl()->getUrl('form',null,['id'=>null],true)?>">
    <button type="button" class="btn btn-success">Add Attributes</button></a><br><br>
    <div class="form-group">
        <table class="table">
            <tr>
               <!--  <td><inpute type='text' name="filter['number']['id']" class="form-control"  value="<?php //echo $this->getFilter()->getFilterValue('number','id')?>"></td>
                <td><inpute type='text' name="filter['number']['id']" class="form-control"  value="<?php //echo $this->getFilter()->getFilterValue('number','id')?>"></td>
                <td><inpute type='text' name="filter['number']['id']" class="form-control"  value="<?php //echo $this->getFilter()->getFilterValue('number','id')?>"></td>
                <td><inpute type='text' name="filter['number']['id']" class="form-control"  value="<?php //echo $this->getFilter()->getFilterValue('number','id')?>"></td>
                <td><inpute type='text' name="filter['number']['id']" class="form-control"  value="<?php //echo $this->getFilter()->getFilterValue('number','id')?>"></td>
                <td><inpute type='text' name="filter['number']['id']" class="form-control"  value="<?php //echo $this->getFilter()->getFilterValue('number','id')?>"></td>
                <td><inpute type='text' name="filter['number']['id']" class="form-control"  value="<?php //echo $this->getFilter()->getFilterValue('number','id')?>"></td>
                <td><inpute type='text' name="filter['number']['id']" class="form-control"  value="<?php //echo $this->getFilter()->getFilterValue('number','id')?>"></td>
                <td><inpute type='text' name="filter['number']['id']" class="form-control"  value="<?php //echo $this->getFilter()->getFilterValue('number','id')?>"></td> -->
            </tr>
            <tr>
                <th>ID</th>
                <th>Entity Id</th>
                <th>Name</th>
                <th>Code</th>
                <th>Input Type</th>
                <th>Back End Type</th>
                <th>Sort Order</th>
                <th>Back End Model</th>
                <th>Action</th>
            </tr>

            <?php if (!$attributes) :?>
            <tr>
                <td colspan=8>No Record Found</td>
            </tr>
            <?php endif?>
            <?php foreach ($attributes as $key => $attribute):?>
                
                <tr>
                    <td><?php echo $attribute->id;?></td>
                    <td><?php echo $attribute->entityTypeId;?></td>
                    <td><?php echo $attribute->name;?></td>
                    <td><?php echo $attribute->code;?></td>
                    <td><?php echo $attribute->inputType;?></td>
                    <td><?php echo $attribute->backendType;?></td>
                    <td><?php echo $attribute->sortOrder;?></td>
                    <td><?php echo $attribute->backendModel;?></td>
                    <td>
                    <a href='<?php echo $this->getUrl()->getUrl("form",NULL,['id'=> $attribute->id])?>'
                        class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></a>

                        <a href='<?php echo $this->getUrl()->getUrl("delete",NULL,['id'=> $attribute->id])?>'
                        class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span> </a>

                    <?php 
                        if($attribute->inputType == 'select' || $attribute->inputType == 'checkbox' ||$attribute->inputType == 'radio'):
                    ?>
                        <a href='<?php echo $this->getUrl()->getUrl("option",NULL,['id'=> $attribute->id])?>'
                        class="btn btn-warning btn-md">Options</a>
                    <?php endif;?>    
                    <td>
                </tr>
            <?php endforeach?>    
        </table>
    </div> 
</div>       
           