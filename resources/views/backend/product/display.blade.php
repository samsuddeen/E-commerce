@extends('backend.dashboard.layouts.master')
@section('title','product')
@section('content')

<div class= "main-panel">
<div class= "content-wrapper">
<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Manage Product
                            </h2>
                        </div>
                        <div class="body">
                            <table id="mainTable" class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>S.N</th>
                                    <th> Category </th>
                                  
                                    <th> Name </th>                                   
                                    <th> price </th>
                                    <th> Status </th>
                                    <th> Description </th>
                                    <th> image </th>                                                              
                                    <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $product)
                          <tr>
                            <td> {{$loop->iteration}} </td>
                            <td>{{$product->category_id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->status}}</td>
                            <td>{{$product->description}}</td>

                            <td><img src="{{$product->image}}" heigth="160px" width="160px"></td>
                           
                            <td><a href="{{route('delete.product',$product->id)}}" class='btn btn-danger'>Delete</a>
                                <a href="{{route('product.edit',$product->id)}}" class='btn btn-primary'>edit</a></td>
                                </tr>
                            @empty
                            <td> No Record Found</td>
                            @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th><strong>TOTAL</strong></th>
                                        <th>{{$data->count()}}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            @endsection