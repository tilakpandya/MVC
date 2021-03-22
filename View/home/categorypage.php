<?php
    $categories = $this->getCategory();
?>  
  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <?php  echo $this->createBlock('Block\Customer\Layout\CategoryPage\ProductListPage')->toHtml();?>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <?php  echo $this->createBlock('Block\Customer\Layout\CategoryPage\CategoryPanel')->toHtml();?>
            <!-- single sidebar -->
            <?php  echo $this->createBlock('Block\Customer\Layout\CategoryPage\TagPanel')->toHtml();?>
            <!-- single sidebar -->
            <?php  echo $this->createBlock('Block\Customer\Layout\CategoryPage\PriceRangPanel')->toHtml();?>
            <!-- single sidebar -->
            <?php  echo $this->createBlock('Block\Customer\Layout\CategoryPage\ColorPanel')->toHtml();?>
            <!-- single sidebar -->
            <?php  echo $this->createBlock('Block\Customer\Layout\CategoryPage\RecentViewPanel')->toHtml();?>
            <!-- single sidebar -->
            <?php  echo $this->createBlock('Block\Customer\Layout\CategoryPage\MostRatedProduct')->toHtml();?>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->

