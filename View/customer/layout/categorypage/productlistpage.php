<div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                <?php if(!$this->getProductDetails()):?>
                <h1 class="text-center font-weight-bold">No Products Available</h1> 
                
                <?php else: ?>
                <?php foreach($this->getProductDetails() as $key => $product): ?>
                  <li>
                  <figure>
                    <a class="aa-product-img" href="<?= $this->getUrl()->getUrl('view','ProductDetailPage',['id'=>$product->id],true);?>"><img src="Skin\Images\Product\<?= $this->getThumbnailPhoto($product->id)->image?>" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="<?php //echo $this->getUrl()->getUrl('view','CartPage',['id'=>$product->id],true);?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="<?= $this->getUrl()->getUrl('view','ProductDetailPage',['id'=>$product->productId],true);?>"><?= $product->name;?></a></h4>
                      <span class="aa-product-price">₹<?= $product->price;?></span>
                      <?php if($product->discount):?>
                        <span class="aa-product-price">&nbsp; &nbsp;<small>₹<?= $product->discount?> Discount</small></span>
                        <?php endif;?>
                    </figcaption>
                  </figure>                         
                  
                 </li>
                <?php endforeach; ?>
                                             
              </ul>
                
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
              <?php endif;?>
            </div>
            
          </div>
        </div>