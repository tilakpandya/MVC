<style>
  body {
    margin: 0;
    font-family: "Lato", sans-serif;
  }

  .sidebar {
    margin: 0;
    padding: 0;
    width: 200px;
    background-color:lightgray;

    height: 100%;
    overflow: auto;
  }

  .sidebar a {
    display: block;
    color: black;
    padding: 16px;
    text-decoration: none;
  }
  
  .sidebar a.active {
    background-color: black;
    color: white;
  }

  .sidebar a:hover:not(.active) {
    background-color: #6661F2;
    color: white;
  }

  div.content {
    margin-left: 200px;
    padding: 1px 16px;
    height: 1000px;
  }

}
</style>


<div class="sidebar">
  <!-- <a onclick="mage.setUrl('<?php #echo $this->getUrl()->getUrl('grid','Admin_Dashboard')?>').resetParams().load();" herf="javascript:void(0);">Dashboard</a>
  <a onclick="mage.setUrl('<?php #echo $this->getUrl()->getUrl('grid','Admin_Product_Product',['id'=>null,'tab'=>null])?>').resetParams().load();" herf="javascript:void(0);">Product</a>
  <a onclick="mage.setUrl('<?php #echo $this->getUrl()->getUrl('grid','Admin_category')?>').resetParams().load();"  herf="javascript:void(0);">Category</a> -->
  <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Dashboard',['id'=>null],true)?>">Dashboard</a>
  <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Product_Product',['id'=>null,'tab'=>null],true)?>">Product</a>
  <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Category_Category',['id'=>null],true)?>">Category</a>
  <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Customer_Customer',['id'=>null],true)?>">Customer</a>
  <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_CustomerGroup',['id'=>null],true)?>">CustomerGroup</a>
  <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_shipping',['id'=>null],true)?>">Shipping</a>
  <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_payment',['id'=>null],true)?>">Payment</a>
  <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Brand',['id'=>null],true)?>">Brand</a>
  <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_admin',['id'=>null],true)?>">Admin</a>
  <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_EntityAttribute',['id'=>null],true)?>">EntityAttribute</a>
  <a href="<?php echo $this->getUrl()->getUrl('grid','Admin_CMSPages',['id'=>null],true)?>">CMS Pages</a>


</div>




