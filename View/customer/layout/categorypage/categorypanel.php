<?php
    $categories = $this->getCategory();
?>
<div class="aa-sidebar-widget">
    <h3>Category</h3>
    <ul class="aa-catg-nav">

    <?php foreach ($categories as $key => $category):?>
        <li><a href="#"><?= $category->name?></a></li>
    <?php endforeach;?>  
              
    </ul>
</div>