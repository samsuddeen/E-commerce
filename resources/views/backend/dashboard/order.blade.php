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
        <td>{{ $singleOrder->user_id }}</td>
        <td>{{ $singleOrder->product_id }}</td>
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
