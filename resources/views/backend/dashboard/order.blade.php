@extends('backend.dashboard.layouts.master')
@section('title','order')
@section('content')

<div class= "main-panel">
<div class= "content-wrapper">

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                        <div class="header">
                            <h2 style="text-align: center;" >
                               All Order
                            </h2>                          
                        </div>
                  <div class="text-center">
                    <form action="{{route('order_search') }}" method="GET">
                    @csrf
                   <input style="width: 500px;"  type="text" name="search" placeholder="Search For Something">
                   <input type="submit" value="Search">


    </form>
</div>
<br>
<br>
                        <div class="body">
                            <table id="mainTable" class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>S.N</th>
                                     <th> User Name</th>      
                                    <th>  Product Name</th>                                   
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
        <td>{{  $singleOrder->product->name }}</td>
        <td>{{ $singleOrder->quantity }}</td>
        <td>{{ $singleOrder->payment_status }}</td>
        <td>{{ $singleOrder->delivery_status }}</td>
        <td>
            @if($singleOrder->delivery_status == 'processing')
                <a href="{{ route('delivered', $singleOrder->id) }}" class='btn btn-primary' onclick="return confirm('Are you sure this product is delivered')">Delivered</a>
            @else
                <p style="color:green;">Delivered</p>
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






    </div>
</div>
            @endsection
