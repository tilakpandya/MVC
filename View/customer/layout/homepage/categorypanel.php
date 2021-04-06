<?php 
    $categories = $this->getCategory();
    /* echo "<pre>";
    print_r($this->getCategoryChild(2));  */
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
                          <?php if($this->getCategoryChild($category->id)):?>
                            <ul class="dropdown-menu">  
                              <?php foreach ($this->getCategoryChild($category->id) as $key => $value):?>           
                                  <li><a href="<?= $this->getUrl()->getUrl('view','CategoryPage',['id'=>$value->id],true);?>"><?=$value->name?></a></li>
                              <?php endforeach;?>  
                            </ul>
                          <?php endif;?>      
                    </li>
                <?php endforeach;?>    
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>