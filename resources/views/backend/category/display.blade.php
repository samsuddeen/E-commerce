@extends('backend.dashboard.layouts.master')
@section('title','Category Settings')
@section('content')

<div class= "main-panel">
<div class= "content-wrapper">
<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Manage Category
                            </h2>
                        </div>
                        <div class="body">
                            <table id="mainTable" class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>S.N</th>
                                    <th> Category Name </th>
                                    <th> Status </th>
                                    <th> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $cate)
                          <tr>
                            <td> {{$loop->iteration}} </td>
                            <td>{{$cate->category_name}}</td>
                            <td>{{$cate->status}}</td>
                            <td><a href="{{route('admin.delete',$cate->id)}}" class='btn btn-danger'>Delete</a>
                                <a href="{{route('admin_edit',$cate->id)}}" class='btn btn-primary'>edit</a></td>
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