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
      <title>Famms - Fashion Store</title>
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

         @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif


        
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Add to Cart
            </h2>
        </div>
        <div class="body">
            <table id="mainTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @forelse($carts as $cart)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cart->product->name }}</td>
                            <td>${{ $cart->product->price }}</td>
                            <td>{{ $cart->product->description }}</td>
                            <td><img src="{{ $cart->product->image }}" height="200px" width="200px"></td>
                            <td><a href="{{ route('remove.product', $cart->id) }}" class='btn btn-danger' onclick="return confirm('Are you sure to remove this product?')">Remove</a></td>
                        </tr>
                        @php $total += $cart->product->price @endphp
                    @empty
                        <tr><td colspan="6">Cart Empty</td></tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th><strong>TOTAL</strong></th>
                        <th>{{ $carts->count() }}</th>
                        <th colspan="4"><h2>Total price : ${{ $total }}</h2></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<br>
<div class="center" style="text-align: center;">
    <h1 style="font-size: 25px; padding-bottom: 15px;">Proceed To Order</h1>
    <form action="{{ route('cash_order')}}" method="get">
        @csrf
        <button type="submit" class="btn btn-success">Cash on Delivery</button>
    </form>
    <br>
    <a href="{{ route('stripe', ['total' => $total]) }}" class="btn btn-danger">Pay using Card</a>

</div>


            
       
         
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
