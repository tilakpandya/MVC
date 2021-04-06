<div class="aa-sidebar-widget">
    <h3>Product Material</h3>
    <ul class="aa-catg-nav">

    <?php foreach ($this->getCategory() as $key => $category):?>
        <li><a href="#"><?= $category->name?></a></li>
    <?php endforeach;?>  
              
    </ul>
</div>