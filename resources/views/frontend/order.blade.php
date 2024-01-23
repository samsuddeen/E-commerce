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

         @if(session()->has('message'))
         <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
</div>
@endif
<br>
<br>
        
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2 style="text-align: center;">
                All Order
            </h2>
        </div>
        <div class="body">
            <table id="mainTable" class="table table-striped">
                <thead>
                    <tr>
                                     <th>S.N</th>
                                     <th> User_id</th>      
                                    <th>  Product_id</th>                                   
                                    <th> Quantity </th>
                                    <th> Payment_Status </th>
                                    <th> Delivery_Status </th>                                                             
                                    <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($order as $singleOrder)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $singleOrder->users->name }}</td>
        <td>{{ $singleOrder->product->name }}</td>
        <td>{{ $singleOrder->quantity }}</td>
        <td>{{ $singleOrder->payment_status }}</td>
        <td>{{ $singleOrder->delivery_status }}</td>
        <td>

        @if($singleOrder->delivery_status == 'processing')
           
                <a href="{{ route('cancel_order', $singleOrder->id) }}" class='btn btn-danger' onclick="return confirm('Are you sure cancel this product')">Cancel Order</a>
           @else
           <p style="color: blue;">Not Allow</p>
           @endif
        </td>
    </tr>
@empty
    <tr>
        <td colspan="7">No Record Found</td>
    </tr>
@endforelse
</tbody>
                                <tfoot>
                                    <tr>
                                        <th><strong>TOTAL</strong></th>
                                        <th>{{$order->count()}}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
</div>



        <br>
      <!-- end client section -->
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
