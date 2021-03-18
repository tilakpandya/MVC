<?php
   $admin=$this->getAdmin(); 
   
?>
<h1 style="color:gray">Admin Form</h1>
        
        <form action="<?php echo $this->getUrl()->getUrl('save')?>" method="POST">
            <div class="form-group">
                <table class="table">
                        <tr>
                            <td>
                                <input type="text" name="admin[username]" id="username" value="<?php echo $admin->username?>"
                                    placeholder="Name" class="form-control">
                            </td>
                            <td>
                                <input type="password" name="admin[password]" id="password" value="<?php echo $admin->password?>"
                                    placeholder="password" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="admin[status]" class="form-control">
                                    <option value=" ">select Status</option>
                                    <?php
                                    foreach ($admin->getStatusOptions() as $key => $value) { ?>
                                    <option value="<?php echo $value?>"
                                        <?php if ($admin->status == $value) {echo "Selected";}?>>
                                        <?php echo $value?>
                                    </option>
                                    <?php }?>
                                </select>
                            </td>
                            <td>
                            <input type="submit" name="submit" value="SAVE" class="btn btn-success btn-lg">

                            </td>
                        </tr>
                    </table>
                </div>    
            </form>    