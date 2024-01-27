<section id="contact">
<footer>
  
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#"><img width="210" src="{{ asset('uploads').'/' .$_SESSION['setting']->logo}}" alt="#" /></a>
                      </div>
                      <div class="information_f">
                        <p><strong>ADDRESS:</strong>  {{ $_SESSION['setting']->address ? $_SESSION['setting']->address :'' }}</p>
                        <p><strong>TELEPHONE:</strong> {{ $_SESSION['setting']->phone ? $_SESSION['setting']->phone :'' }}</p>
                        <p><strong>EMAIL:</strong>{{ $_SESSION['setting']->email ? $_SESSION['setting']->email :'' }}</p>
                      </div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="#">Home</a></li>
                           <li><a href="#product">Product</a></li>
                           <li><a href="#contact">Contact</a></li>
                        </ul>
                     </div>
                  </div>
                  
                     </div>
                  </div>     
                  <div class="col-md-5">
                     <div class="widget_menu">
                        
                       
                           </form>
                        
                     
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      </section>