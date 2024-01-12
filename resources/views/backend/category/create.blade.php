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
                               Category Form
                            </h2>
                           
                        </div>
                        <div class="body">
                        <form action="{{route('category.data')}}" method='POST' >
                            @csrf
                                <label for="email_address">Category Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="catename" class="form-control" placeholder="Enter Category">
                                    </div>
                                </div>
                                <label for="password">Status</label>
                                <div class="form-group">
                                <select name ='status'> 
                                        <option  value='1' > Active</option>
                                        <option  value='0'> Inactive</option>
                                    </select >
                                </div>
                                
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            @endsection
