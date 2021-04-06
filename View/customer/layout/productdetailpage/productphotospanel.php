<?php
  $product = $this->getThumbnailPhoto($this->getRequest()->getGet('id'));
  $photos = $this->getPhotos($this->getRequest()->getGet('id'));
   /* echo "<pre>";
  print_r($product); */ 
?>
<!-- Modal view slider -->
<div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="Skin\Images\Product\<?= $product->image?>" class="simpleLens-lens-image"><img src="Skin\Images\Product\<?= $product->image?>" class="simpleLens-big-image"></a></div>
                      </div><br>
                        <div class="simpleLens-thumbnails-container">
                          <?php foreach ($photos as $key => $photo):?>
                            <a data-big-image="Skin\Images\Product\<?= $photo->image?>" data-lens-image="Skin\Images\Product\<?= $photo->image?>" class="simpleLens-thumbnail-wrapper" href="#">
                              <img src="Skin\Images\Product\<?= $photo->image?>" height="50px" width="60px">
                            </a> 
                          <?php endforeach;?>
                                                            
                        </div>  
                    </div>
                  </div>
</div>
