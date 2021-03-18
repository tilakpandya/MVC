<!-- <div class='rightHtml'>
<?php
    /* $tabs = $this->getTabs();
    $id = $this->getRequest()->getGet('id');
    foreach ($tabs as $key => $tab) {  */?>
    
        <nav class="navbar navbar-light bg-light">
            <button class="btn btn-outline-success" type="button" href='<?php echo $this->getUrl()->getUrl(null,null,['tab'=>$key,'id'=>$id],true)?>'><?php echo $tab['lable'] ?></button>
        </nav>
   <?php //}
?>


</div> -->