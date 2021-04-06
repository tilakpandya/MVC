<?php $attribute=$this->getAttribute()->getOptions(); 
      $id = $this->getRequest()->getGet('id');
    /* echo "<pre>";
      print_r($attribute);   */
?>
<div class="container">
    <h1 style="color:gray">Attribute Option Form</h1>
    <hr>
    <form action="<?php echo $this->getUrl()->getUrl('update','Admin_EntityAttribute'); ?>" method="POST">
        <div class="form-group contentHtml">
            <input type="submit" value="Update" class="btn btn-info btn-md">
            <input type="button" name="addOption"  value="Add Option" onclick="addRow()" class="btn btn-warning btn-md">
                <br><br>
                <table width=100 boarder=2 id="existingOption" class="table">
                    <thead>
                        <th>Name</th>
                        <th>Sort Order</th>
                        <th>Delete</th>
                    <thead>
                    <tbody>
                        <?php if (!$attribute): ?>
                            <tr id='NoDataFound'>
                                <td colspand=3>Data Not Found...</td>
                            </tr>
                        <?php endif;?>
                        <?php foreach($attribute as $key=>$option):?>
                            <tr>
                                <td><input type="text" name="Exist[<?php echo $option->optionId?>][name]" placeholder="Name" 
                                value="<?php echo $option->name ?>" class="form-control"></td>

                                <td><input type="number" name="Exist[<?php echo $option->optionId?>][sortOrder]" 
                                placeholder="Sort Order" value="<?php echo $option->sortOrder ?>" class="form-control"></td>

                                <td><a name="remove" value="remove Option" 
                                class="btn btn-danger btn-md" href="<?php echo $this->getUrl()->getUrl('remove',null,['id'=>$id,'optionId'=>$option->optionId],true);?>">
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
                        <td><input type="text" name="New[Name][]" placeholder="Name" class="form-control"></td>
                        <td><input type="number" name="New[sortOrder][]" placeholder="Sort Order" class="form-control"></td>
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