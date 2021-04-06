<?php 
  $products = $this->getProducts();
?>
<section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" data-toggle="tab">Most View</a></li>
                <li><a href="#latest" data-toggle="tab">Most Deal</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!--Most View -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->
                    <?php foreach ($products as $key => $product): ?>
                      <li>
                        <figure>
                          <a class="aa-product-img" href="<?= $this->getUrl()->getUrl('view','ProductDetailPage');?>"><img src="Skin\Images\Product\<?= $product->image?>" alt="polo shirt img"></a>
                          <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                          <figcaption>
                            <h4 class="aa-product-title"><a href="<?= $this->getUrl()->getUrl('view','ProductDetailPage');?>"><?= $product->name?></a></h4>
                            <span class="aa-product-price">₹<?= $product->price;?></span>
                              <?php if($product->discount):?>
                                <span class="aa-product-price">&nbsp; &nbsp;<small>₹<?= $product->discount?> Discount</small></span>
                              <?php endif;?>
                          </figcaption>
                        </figure>                     
                       
                      </li>
                    <?php endforeach;?>
                                                                        
                  </ul>
                  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / Most View -->
                

                <!-- Most Deal -->
                <div class="tab-pane fade" id="latest">
                <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->
                    <?php foreach ($products as $key => $product): ?>
                      <li>
                        <figure>
                          <a class="aa-product-img" href="<?= $this->getUrl()->getUrl('view','ProductDetailPage');?>"><img src="Skin\Images\Product\<?= $product->image?>" alt="polo shirt img"></a>
                          <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                          <figcaption>
                            <h4 class="aa-product-title"><a href="<?= $this->getUrl()->getUrl('view','ProductDetailPage');?>"><?= $product->name?></a></h4>
                            <span class="aa-product-price">₹<?= $product->price;?></span>
                              <?php if($product->discount):?>
                                <span class="aa-product-price">&nbsp; &nbsp;<small>₹<?= $product->discount?> Discount</small></span>
                              <?php endif;?>
                          </figcaption>
                        </figure>                     
                       
                      </li>
                    <?php endforeach;?>
                                                                        
                  </ul>
                  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / Most Deal -->              
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
