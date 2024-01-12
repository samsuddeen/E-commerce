@extends('backend.dashboard.layouts.master')
@section('title','Category')
@section('content')

<div class= "main-panel">
<div class= "content-wrapper">
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Product Form
                            </h2>
                           
                        </div>
                        <div class="body">
                        <form action="{{route('product.update',$cat_data->id)}}" method='POST'  enctype='multipart/form-data'>
                            @csrf
                            <label >category</label>
                                <div class="form-group">
                                <select  name="category_id" value="{{$cat_data->category_id ?? ''}}"> 
                                @forelse($categories as $category)
                                    <option value="{{$category->id}}">{{ $cat_data->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                    </option>
                                    @empty
                                    <option value="">No Category</option>
                                    @endforelse
                                    </select >
                                    <br>
                                    <br>

                                    <label >Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name"  value="{{$cat_data->name ?? ''}}">
                                    </div>

                                </div>
                                <br>

                                <label >price</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="price" class="form-control" placeholder="Enter price"  value="{{$cat_data->price ?? ''}}">
                                    </div>
<br>

                               
                                    <label >Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image" class="form-control" placeholder="Image"  value="{{$cat_data->image ?? ''}}">
                                    </div>
                                </div>
                  <br>
                                <div class="form-group">
                                <label for="password">Status</label>
                                <select value="{{$cat_data->status ?? ''}}" name ='status'> 
                                        <option  value='1' > Active</option>
                                        <option  value='0'> Inactive</option>
                                    </select >
                                </div>
<br>
                                <label >Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    <textarea class="form-control" id="exampleTextarea1" placeholder="Description" rows="8" name="description"  value="{{$cat_data->description ?? ''}}"></textarea>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            @endsection