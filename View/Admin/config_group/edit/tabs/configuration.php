<?php $configuration=$this->getConfiguration(); 
    $id=$this->getRequest()->getGet('id'); 
?>
<div class="container">
    <h1 style="color:gray">Configuration Form</h1>
    <hr>
    <form action="<?php echo $this->getUrl()->getUrl('update'); ?>" method="POST">
        <div class="form-group contentHtml">
            <input type="submit" value="Update" class="btn btn-info btn-md">
            <input type="button" name="addOption"  value="Add Option" onclick="addRow()" class="btn btn-warning btn-md">
                <br><br>
                <table width=100 boarder=2 id="existingOption" class="table">
                    <thead>
                        <th>Title</th>
                        <th>Code</th>
                        <th>Value</th>
                        <th>Delete</th>
                    <thead>
                    <tbody>
                        <?php if (!$configuration): ?>
                            <tr id='NoDataFound'>
                                <td colspand=3>Data Not Found...</td>
                            </tr>
                        <?php endif;?>
                        <?php foreach($configuration as $key=>$config):?>
                            <tr>
                                <td><input type="text" name="Exist[<?php echo $config->configId?>][title]" placeholder="Title" 
                                value="<?php echo $config->title ?>" class="form-control"></td>

                                <td><input type="text" name="Exist[<?php echo $config->configId?>][code]" 
                                placeholder="Code" value="<?php echo $config->code ?>" class="form-control"></td>

                                <td><input type="text" name="Exist[<?php echo $config->configId?>][value]" 
                                placeholder="Value" value="<?php echo $config->value ?>" class="form-control"></td>

                                <td><a name="remove" value="remove Option" 
                                class="btn btn-danger btn-md" href="<?php echo $this->getUrl()->getUrl('remove','admin_Config',['configId'=>$config->configId,'id'=>$id],true);?>">
                                <span class="glyphicon glyphicon-trash"></span></a></td>
                            </tr> 
                            <?php endforeach;?>
                    </tbody>    
                </table>
        </div>        
    </form>
    <div style="display:none">
        <table id='newOption' class='table'>
            <tbody>
                <tr>
                        <td><input type="text" name="New[Title][]" placeholder="Title" class="form-control"></td>
                        <td><input type="text" name="New[Code][]" placeholder="Code" class="form-control"></td>
                        <td><input type="text" name="New[Value][]" placeholder="Value" class="form-control"></td>
                        <td><a type="button" name="remove" value="remove Option"  onclick="removeOption(this)" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr> 
            </tbody>
        </table>
    </div>
</div>

<script>

    function addRow() {
        var newOptiontable = document.getElementById('newOption');
        var existOptiontable = document.getElementById('existingOption').children[0];
        var NoDataFound = document.getElementById('NoDataFound');
        existOptiontable.append(newOptiontable.children[0].children[0].cloneNode(true));
        NoDataFound.remove();
    }

    function removeOption(button) {
        var objTr =$(button).closest('tr');
        console.log(objTr);
        objTr.remove();
    }
</script>