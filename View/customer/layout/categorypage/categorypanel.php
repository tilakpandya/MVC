<div class="aa-sidebar-widget">
    <h3>Category</h3>
    <ul class="aa-catg-nav">

    <?php foreach ($this->getCategory() as $key => $category):?>
        <li><a href="<?= $this->getUrl()->getUrl('view','CategoryPage',['id'=>$category->id],true);?>"><?= $category->name?></a></li>
    <?php endforeach;?>  
              
    </ul>
</div>