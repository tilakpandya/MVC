<!-- <div class="sidebar">
  <a onclick="mage.setUrl('<?php #echo $this->getUrl()->getUrl('grid','Admin_Dashboard')?>').resetParams().load();" herf="javascript:void(0);">Dashboard</a>
  <a onclick="mage.setUrl('<?php #echo $this->getUrl()->getUrl('grid','Admin_Product_Product',['id'=>null,'tab'=>null])?>').resetParams().load();" herf="javascript:void(0);">Product</a>
  <a onclick="mage.setUrl('<?php #echo $this->getUrl()->getUrl('grid','Admin_category')?>').resetParams().load();"  herf="javascript:void(0);">Category</a>
</div> -->
<section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
                <li><a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Dashboard',['id'=>null],true)?>">Dashboard</a></li>
                <li><a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Product_Product',['id'=>null,'tab'=>null],true)?>">Product</a></li>
                <li><a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Category_Category',['id'=>null],true)?>">Category</a></li>
                <li><a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Customer_Customer',['id'=>null],true)?>">Customer</a></li>
                <li><a href="<?php echo $this->getUrl()->getUrl('grid','Admin_CustomerGroup',['id'=>null],true)?>">Customer Group</a></li>
                <li><a href="<?php echo $this->getUrl()->getUrl('grid','Admin_shipping',['id'=>null],true)?>">Shipping</a></li>
                <li><a href="<?php echo $this->getUrl()->getUrl('grid','Admin_payment',['id'=>null],true)?>">Payment</a></li>
                <li><a href="<?php echo $this->getUrl()->getUrl('grid','Admin_admin',['id'=>null],true)?>">Admin</a></li>
                <li><a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Brand',['id'=>null],true)?>">Brand</a></li>
                <li><a href="<?php echo $this->getUrl()->getUrl('grid','Admin_EntityAttribute',['id'=>null],true)?>">Entity Attribute</a></li>
                <li><a href="<?php echo $this->getUrl()->getUrl('grid','Admin_CMSPages',['id'=>null],true)?>">CMS Page</a></li>
                <!-- <li><a href="<?php //echo $this->getUrl()->getUrl('grid','Admin_Config',['id'=>null],true)?>">Configuration</a></li> -->
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>




