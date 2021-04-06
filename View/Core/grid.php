<?php
$collection = $this->getCollection();
$actions = $this->getActions();
$buttons = $this->getButtons();
$columns = $this->getColumns();
?>
<section>
    <div class="container">
        <h1 style="color: gray"><?= $this->getTitle();?></h1>
        <hr />
        <!-- <a onclick="mage.setUrl('<?php #echo $this->getUrl()->getUrl('form','Admin_Product_Product',null,null)?>').resetParams().load()"><button type="button" class="btn btn-success">Add
                Product</button></a> -->
            <?php foreach($buttons  as $key =>$action): ?>   
                <a href="<?= $this->getMethodUrl($row,$action['method'])?>" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus"></span></a>                  
            <?php endforeach; ?>         
        </br>
        <br>
        <form action="<?php echo $this->getUrl()->getUrl('filter');?>" method="POST">   
                <div class="form-group">
                    <div class="table-responsive"> 
                        <table border=2 class="table table-md table-striped table-bordered">
                            <tr>
                                <?php foreach($columns as $key =>$column): ?>
                                    <th><?= $column['label']?> </th>
                                <?php endforeach; ?>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <?php foreach($columns as $key =>$column): ?>
                                    <td><input type="text" name="filter[<?= $column['type']?>][<?= $column['field']?>]" class="form-control"
                                         value="<?php echo $this->getFilter()->getFilterValue($column['type'],$column['field'])?>">
                                        </td>
                                <?php endforeach; ?>
                                <td>
                                    <input type="submit" value="Apply Filter" class="btn btn-primary">
                                </td>    
                            </tr>
                            <?php if (!$collection):?>
                            <tr>
                                <td colspan=7>No Data Found....</td>
                            </tr>
                            <?php endif;?>
                            <?php 
                                foreach ($collection as $key => $row) {
                            ?>
                            <tr>    
                                <?php foreach($columns as $key =>$column): ?>
                                    <td><?php echo $this->getFieldValue($row,$column['field']);?></td>
                                <?php endforeach; ?> 
                                <td>
                                    <?php foreach($actions as $key =>$action): ?>
                                        <?php if($action['label'] == 'Edit'): ?>
                                            <a href="<?= $this->getMethodUrl($row,$action['method'])?>" class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></a><br><br>
                                        <?php endif; 
                                            if($action['label'] == 'Delete'):?>
                                                <a href="<?= $this->getMethodUrl($row,$action['method'])?>" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span></a><br><br>
                                        <?php endif;
                                        if($action['label'] == 'addItemToCart'):?>
                                                <a href="<?= $this->getMethodUrl($row,$action['method'])?>" class="btn btn-warning btn-md"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                                        <?php endif; ?>  
                                    <?php endforeach; ?> 
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                            
                        </table>
                    </div>
                </div>   
        </form>        
    </div>  
</section>