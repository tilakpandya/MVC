<?php 
    $categories = $this->getCategory();
   /*  echo "<pre>";*/ 
    //print_r($categories); 
?>
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
                <?php foreach ($categories as $key => $category):?>
                        <li><a href="#"><?= $category->name ?><span class="caret"></span></a>
                            <ul class="dropdown-menu">                
                                <li><a href="#">Casual</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">Formal</a></li>
                                <li><a href="#">And more.. <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="#">Sleep Wear</a></li>
                                    <li><a href="#">Sandals</a></li>
                                    </ul>
                                </li>
                            </ul>
                    </li>
                <?php endforeach;?>    

            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>