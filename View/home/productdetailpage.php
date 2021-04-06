
  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <?php  echo $this->createBlock('Block\Customer\Layout\ProductDetailPage\ProductPhotosPanel')->toHtml();?>
                <!-- Modal view content -->
                <?php  echo $this->createBlock('Block\Customer\Layout\ProductDetailPage\ProductDetailPanel')->toHtml();?>

              </div>
            </div>
            <!-- Bottom Details -->
            <?php  echo $this->createBlock('Block\Customer\Layout\ProductDetailPage\BottomDetailPanel')->toHtml();?>

            <!-- Related product -->
            <?php  echo $this->createBlock('Block\Customer\Layout\ProductDetailPage\RelatedProductPanel')->toHtml();?> 
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->


 

  

  