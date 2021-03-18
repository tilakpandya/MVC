<?php
//echo"<pre>";
    $tabs = $this->getTabs();
    $id=$this->getRequest()->getGet('id'); 
    foreach ($tabs as $key => $tab) { ?>
        <a class='btn btn-primary' href='<?php echo $this->getUrl()->getUrl(null,null,['tab'=>$key,'id'=>$id],true)?>'><?php echo $tab['lable'] ?></a><br>
    <?php }?>
    