 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Login</h4>
                 <form action="<?php echo $this->getUrl()->getUrl('login','LoginPage');?>" method="POST" class="aa-login-form">
                   <label for="">Email address<span>*</span></label>
                   <input type="text" placeholder="Email Address" name="email">
                   
                   <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" name="password">
                    <button type="submit" class="aa-browse-btn">Login</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                 <form  action="<?php echo $this->getUrl()->getUrl('register','LoginPage');?>" method="POST" class="aa-login-form">
                    <label for="">First Name<span>*</span></label>
                    <input type="text" placeholder="First Name" name='Register[firstname]'>
                    <label for="">Last Name<span>*</span></label>
                    <input type="text" placeholder="Last Name" name='Register[lastname]'>
                    <label for="">Email address<span>*</span></label>
                    <input type="text" placeholder="Email" name='Register[email]'>
                    <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" name='Register[password]'>
                    <label for="">Confirmation Password<span>*</span></label>
                    <input type="password" placeholder="Confirmation Password" name='confirmPassword'>
                    <button type="submit" class="aa-browse-btn">Register</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->