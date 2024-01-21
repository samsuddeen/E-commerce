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
      
         <!-- header section strats -->
        
         <!-- end header section -->
         
          <!-- Modal Search Start -->
         
      <!-- end arrival section -->
      
      <!-- product section -->
      <section class="product_section layout_padding">
      <div class="container">
         <div class="heading_container heading_center">
               <h2>
                  Our <span>Products</span>
                  </h2>
               </div>
               </div>
<br>
<br>
<div class="text-center">
<form action="{{route('posts.search') }}" method="GET">
      @csrf
      <input style="width: 500px;"  type="text" name="search" placeholder="Search For Something">
      <input type="submit" value="Search">
   </form>
</div>
<br>
<br>
         <div class="row">
         @forelse($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{ route('product.details', $product->id)}}" class="option1">
                           Product Detail
                           </a>
                          
                           <a href="#"  class="option2">
                              Add To Cart
                           </a>
                        </div>
                     </div>

                     <div class="img-box">
                        <img src="{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{ $product->name }}
                        </h5>
                        <h6>
                           ${{ $product->price }}
                        </h6>
                     </div>
                  </div>
               </div>
            @empty
               
               
            @endforelse
        
  
      
      
  

 




              
      <!-- footer end -->
      
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