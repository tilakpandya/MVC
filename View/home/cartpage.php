
 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             
           <?php  echo $this->createBlock('Block\Customer\Layout\CartPage\CartTable')->toHtml();?>

            <!-- Cart Total view -->
            <?php  echo $this->createBlock('Block\Customer\Layout\CartPage\CartPayment')->toHtml();?>

           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

