<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
  
  
  
  
    </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('frontend.common.header')
</div>
         <!-- end header section -->
        
        
                    <div class="review">
                        <table>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>description</th>
                                <th>Action</th>




                    
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>shirt</td>
                                <td>200</td>
                                <td>expensive</td>
                                <td>Remove</td>

                            </tr>
                        </table>
                    </div>
                           

                           
                               
            
            
       
         
      
      <!-- footer start -->
     @include('frontend.common.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p>© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a></p>
      </div>

      <!-- jQery -->
      <script src="{{ asset('js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{ asset('js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{ asset('js/custom.js')}}"></script>
   </body>
</html>