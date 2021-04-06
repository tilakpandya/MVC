<div class="aa-sidebar-widget">
              <h3>Brands</h3>
              <div class="tag-cloud">
                <?php foreach ($this->getBrandName() as $key => $brand): ?>
                  <a href="#"><?= $brand->name;?></a>
                <?php endforeach;?>  
              
              </div>
</div>