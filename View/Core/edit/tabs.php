<div class='container'>
<?php
    $tabs = $this->getTabs();
    $id = $this->getRequest()->getGet('id');?>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">

    <?php foreach ($tabs as $key => $tab) { ?>
       <!--  <button onclick="mage.setUrl('<?php //echo $this->getUrl()->getUrl(null,null,['tab'=>$key],true)?>').resetParams().load()"><?php //echo $tab['lable'] ?></button><br> -->
            <a class='navbar-brand btn' href='<?php echo $this->getUrl()->getUrl(null,null,['tab'=>$key,'id'=>$id],true)?>'><?php echo $tab['lable'] ?></a>
   <?php }?>  
</nav>
</div>
