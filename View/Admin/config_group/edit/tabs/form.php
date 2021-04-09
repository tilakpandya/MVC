<?php
$group = $this->getConfigGroup();
?>
<div class="container">
    <h1 style="color:gray">Config Group Form</h1>

    <form action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="POST" id='form'>
            <div class="form-group contentHtml">
                <table class="table">
                        <tr>
                            <td>
                                <input type="text" name="group[name]" id="name" value="<?php echo $group->name;?>"
                                    placeholder="Name" class="form-control">
                            </td>
                            <td>
                                <!-- <a><button type="button" onclick="mage.setForm($('#form')).load()" class="btn btn-success btn-lg">Save</button></a> -->
                                <input type="submit" value="SAVE" class="btn btn-success btn-lg">
                               
                                <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Config',null,null)?>">
                                <button type="button" class="btn btn-danger btn-lg">Cancel</button></a>
                                
                            </td>
                        </tr>
                                    
                    </table>   
                </div>
    </form>
</div>
