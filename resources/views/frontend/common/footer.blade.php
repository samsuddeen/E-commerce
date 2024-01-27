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
                           <li><a href="#">About</a></li>
                           <li><a href="#product">Product</a></li>
                           <li><a href="#contact">Contact</a></li>
                        </ul>
                     </div>
                  </div>
                  
                     </div>
                  </div>     
                  <div class="col-md-5">
                     <div class="widget_menu">
                        
                        <div class="information_f">
                          <p>Subscribe by our famms and get update protidin.</p>
                        </div>
                        <div class="form_sub">
                           <form>
                              <fieldset>
                                 <div class="field">
                                    <input type="email" placeholder="Enter Your Mail" name="email" />
                                    <input type="submit" value="Subscribe" />
                                 </div>
                              </fieldset>
                           </form>
                        
                     
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      </section>