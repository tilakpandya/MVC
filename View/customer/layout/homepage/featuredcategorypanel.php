<?php 
   $categories = $this->getFeaturedCategory();
  /*  echo "<pre>";
    print_r($categories);  */
?>
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                  <li><a href="#" data-toggle="tab">Featured Category</a></li>
                 </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        <?php foreach($categories as $key=>$value):?>
                          <li>
                            <figure>
                              <a class="aa-product-img" href="<?= $this->getUrl()->getUrl('view','CategoryPage');?>"><img src="Skin\Images\Category\<?= $value->image; ?>" alt="polo shirt img"></a>
                                <figcaption>
                                <h4 class="aa-product-title"><a href="<?= $this->getUrl()->getUrl('view','CategoryPage');?>"><?= $value->name;?></a></h4>
                              </figcaption>
                            </figure>                        
                           
                        </li>

                        <?php endforeach; ?>
                        
                                        
                      </ul>
                      <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / men product category -->
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>