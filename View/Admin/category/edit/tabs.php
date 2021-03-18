<div class='rightHtml'>
<?php
    $tabs = $this->getTabs();
    $id = $this->getRequest()->getGet('id');
    foreach ($tabs as $key => $tab) { ?>
       <!--  <button onclick="mage.setUrl('<?php //echo $this->getUrl()->getUrl(null,null,['tab'=>$key],true)?>').resetParams().load()"><?php //echo $tab['lable'] ?></button><br> -->
       <a class='btn btn-primary' href='<?php echo $this->getUrl()->getUrl(null,null,['tab'=>$key,'id'=>$id],true)?>'><?php echo $tab['lable'] ?></a><br>
   <?php }
?>
</div>