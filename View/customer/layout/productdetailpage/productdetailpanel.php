<?php
  $product = $this->getProductDetail($this->getRequest()->getGet('id'));
?>
<!-- Modal view content -->
<div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3><?= $product->name?></h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">₹<?= $product->price?></span>
                      <?php if($product->discount):?>
                        <span class="aa-product-price">&nbsp; &nbsp;<small>₹<?= $product->discount?> Discount</small></span>
                        <?php endif;?>
                    </div><br><br>
                    <p>This Accrington Granite Living Room Set has a distinguished contemporary style and comfort features galore. The meticulously tested frame is strong and durable for increased durability and stability over time.</p>
                    
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="" name="">
                          <option selected="1" value="0">1</option>
                          <option value="1">2</option>
                          <option value="2">3</option>
                          <option value="3">4</option>
                          <option value="4">5</option>
                          <option value="5">6</option>
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Category: <a href="#">BEDROOM SET</a>
                      </p>
                    </div>
                    
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="#">Add To Cart</a>
                    </div>
                  </div>
                </div>