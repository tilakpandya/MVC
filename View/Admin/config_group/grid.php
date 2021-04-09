<?php
   //print_r($type);
   $groups = $this->getConfigGroup();
   //print_r($attributes);
?>
<div class='container'>
    <h1 style="color:gray">Configuration Group Grid</h1>
    <hr>
    <a href="<?php echo $this->getUrl()->getUrl('form',null,['id'=>null],true)?>">
    <button type="button" class="btn btn-success">Add Group</button></a><br><br>
    <div class="form-group">
        <table class="table">
            
            <tr>
                <th>Group ID</th>
                <th>Name</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>

            <?php if (!$groups) :?>
            <tr>
                <td colspan=8>No Record Found</td>
            </tr>
            <?php endif?>
            <?php foreach ($groups as $key => $group):?>
                
                <tr>
                    <td><?php echo $group->groupId;?></td>
                    <td><?php echo $group->name;?></td>
                    <td><?php echo $group->createdat;?></td>
                    <td>
                        
                        <a href='<?php echo $this->getUrl()->getUrl("form",NULL,['id'=> $group->groupId])?>'
                        class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></a>

                        <a href='<?php echo $this->getUrl()->getUrl("delete",NULL,['id'=> $group->groupId])?>'
                        class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span> </a>

                    <td>
                </tr>
            <?php endforeach?>    
        </table>
    </div> 
</div>       
           