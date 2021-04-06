<?php
    $brands=$this->getBrands();
?>
<section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">

                <?php foreach ($brands as $key => $brand):?>
                    <li><a href="<?= $this->getUrl()->getUrl('view','CategoryPage');?>"><img src="Skin/Images/Brand/<?php echo $brand->image?>"  height=100px width=100px alt="<?php echo $brand->name?>"></a></li>
                <?php endforeach;?>    
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>