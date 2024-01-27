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
         <!-- end header section -->
         @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



         <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="img-box">
            <img src="{{ $product->image }}" alt="">
        </div>
        <div class="detail-box">
            <h5>
                {{ $product->name }}
            </h5>
            <h6 style="color: red">
                Price
                <br>
                ${{ $product->price }}
            </h6>
            <h6>Product Details :{{ $product->description }}</h6><br>
            <div class="text-center">
            <button type="submit" class="btn btn-primary">Add To Cart</button></div>
        </div>
    </div>
</form>

<form action='{{ route("product.mail", $product->id)}}' method='POST'>
    @csrf
    <div class="text-center">
    <button type="submit" class="btn btn-warning">Order Now</button>
</div>
</form>

         
      <!-- end client section -->
      <!-- footer start -->
     @include('frontend.common.footer')
      <!-- footer end -->
      <div class="cpy_">
      <p>{{ $_SESSION['setting']->slogan ? $_SESSION['setting']->slogan :'' }} </p>
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
