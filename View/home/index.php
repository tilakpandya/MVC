  
  <!-- menu -->
  <?php  echo $this->createBlock('Block\Customer\Layout\HomePage\CategoryPanel')->toHtml();?>
 
  <?php  echo $this->createBlock('Block\Customer\Layout\Message')->toHtml();?>
  <!-- Start slider -->
  <?php  echo $this->createBlock('Block\Customer\Layout\HomePage\BannerPanel')->toHtml();?>

  <!-- Featured Category section -->
  <?php  echo $this->createBlock('Block\Customer\Layout\HomePage\FeaturedCategoryPanel')->toHtml();?>

  <!-- Products section -->
  <?php  echo $this->createBlock('Block\Customer\Layout\HomePage\ProductPanel')->toHtml();?>

  <!-- Client Brand -->

  <?php  echo $this->createBlock('Block\Customer\Layout\HomePage\BrandPanel')->toHtml();?>

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
          </div>
        </div>
      </div>
    </div>
  </section>
 
