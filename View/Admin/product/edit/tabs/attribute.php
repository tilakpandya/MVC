<?php
$attributes = $this->getAttribute();
$option = $this->getAttributeType();
/* echo "<pre>";
print_r($this->getAttribute());
print_r($this->getAttributeType()); */
?>
<div class="container">
    <h1 style="color:gray">Attribute</h1>
    <form action="<?php echo $this->getUrl()->getUrl('save','Admin_Product_Product'); ?>" method="POST" id='form'>
    <div class="form-group">
        <table class="table">
            <?php if (!$attributes):?>
            <tr>
                <td>No Data Found....</td>    
            </tr>
            <?php endif; ?>

            <?php foreach($attributes as $key=>$attribute): ?>
                <?php if ($attribute->inputType == 'Textbox'):?>
                    <tr>
                        <td>
                            <input type="<?php echo $attribute->inputType; ?>" placeholder="<?php echo $attribute->name?>" class="form-control"/>
                        </td>
                    </tr>
                <?php endif;?>
                <?php if ($attribute->inputType == 'radio'):?>
                    <h2><?php echo $attribute->name; ?></h2>
                    <tr>
                        <td>
                            <?php foreach ($this->getAttributeType($attribute->id) as $key => $option):?>
                                <input type="<?php echo $attribute->inputType; ?>" /><?php echo $option->name;?>
                            <?php endforeach;?>                            
                        </td>
                    </tr>
                <?php endif;?>
                <?php if ($attribute->inputType == 'checkbox'):?> 
                        <tr>
                            <td><h3><?php echo $attribute->name;?></h3></td>
                        </tr>
                        <?php foreach ($this->getAttributeType($attribute->id) as $key => $option):?>
                            <tr>
                                <td>
                                    <input type="<?php echo $attribute->inputType; ?>"/><b><?php echo $option->name;?></b>
                                </td>    
                            </tr>
                        <?php endforeach;?> 
                                               
                    
                <?php endif;?>
                <?php if ($attribute->inputType == 'textarea'):?>
                    <tr>
                        <td>
                            <input type="<?php echo $attribute->inputType; ?>" placeholder="<?php echo $attribute->name?>" class="form-control"/>
                        </td>
                    </tr>
                <?php endif;?>
                <?php if ($attribute->inputType == 'select'):?>
                    <tr>   
                        <td>
                            <select name="<?php echo $attribute->name;?>" id="<?php echo $attribute->name;?>" class="form-control">
                                <?php foreach ($this->getAttributeType($attribute->id) as $key => $option):?>
                                    <option value="<?php echo $option->name;?>"><?php echo $option->name;?></option>
                                <?php endforeach;?>   
                            </select>
                        </td>    
                    </tr>  
                <?php endif;?>
            <?php endforeach; ?>
            <td>
                            <!-- <a><button type="button" onclick="mage.setForm($('#form')).load()" class="btn btn-success btn-lg">Save</button></a> -->
                            <input type="submit" value="SAVE" class="btn btn-success btn-lg">
                            </a>
                            <a href="<?php //echo $this->getUrl()->getUrl('grid','Admin_Product_Product',null,null)?>">
                            <button type="button" class="btn btn-danger btn-lg">Cancel</button></a>
                        </td>
        </table>
    </div>    
    </form>        
</div>