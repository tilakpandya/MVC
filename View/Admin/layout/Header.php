<!DOCTYPE html>
<head>

    <!-- include summernote css/js -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>QuestCom | Admin</title>
    
    <!-- Font awesome -->
    <link href="Skin/Customer/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="Skin/Customer/css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="Skin/Customer/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="Skin/Customer/css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="Skin/Customer/css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="Skin/Customer/css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="Skin/Customer/css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="Skin/Customer/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="Skin/Customer/css/style.css" rel="stylesheet">   

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    


    <script type="text/javascript" src="<?php echo $this->baseUrl('Skin\Admin\js\jquery-3.5.1.slim.js');?>"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl('Skin\Admin\js\mage.js');?>"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl('Skin\Admin\js\mage1.js');?>"></script>


</head>
<body>

<!-- Start header section -->
<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                
            
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>00-62-658-658</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="<?php echo $this->getUrl()->getUrl('grid','Admin_Config',['id'=>null],true)?>">Configuration</a></li>
                  <li><a href="account.html">My Account</a></li>
                  <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="">
                  <span class="fa fa-shopping-cart"></span>
                  <p>Queste<strong>Com</strong></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
              <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="<?= $this->getUrl()->getUrl('index','Admin_cart');?>">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                </a>
              </div>
              <!-- / cart box -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
 