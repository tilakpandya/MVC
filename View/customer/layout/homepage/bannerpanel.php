<?php $banners = $this->getBanner();

?>
<section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->

            <?php foreach ($banners as $key=>$value):?>
              
              <li>
                <div class="seq-model">
                  <img data-seq src="Skin\Customer\img\<?= $value->image;?>" alt="<?= $value->image;?>" />
                </div>
               <div class="seq-title">
                  <h2 data-seq><?= $value->label;?></h2>                
                </div>
              </li>
            <?php endforeach; ?>
                   
          </ul>
        </div>
        
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
</section>