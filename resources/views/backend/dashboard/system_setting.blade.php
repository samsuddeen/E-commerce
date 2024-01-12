@extends('backend.dashboard.layouts.master')

@section('title','System setting')
@section('content')

<div class= "main-panel">
<div class= "content-wrapper">
<form action='{{ route("system-setting.store")}}' method='POST' enctype='multipart/form-data'>
    @csrf
    
   

   
    <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name='email'>
                  
                   
                    @if($errors->first('email'))
                    <span style='color:red;'>{{$errors->first('email')}}</span>
                   @endif 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mobile</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="mobile" name='mobile'>

                    @if($errors->first('mobile'))
                    <span style='color:red;'>{{$errors->first('mobile')}}</span>
                   @endif 
  
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Slogan</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Slogan" name='slogan'>
                  
                    @if($errors->first('Slogan'))
                    <span style='color:red;'>{{$errors->first('Slogan')}}</span>
                   @endif 
                  </div>

                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Address" name='address'>
                  
                    @if($errors->first('Address'))
                    <span style='color:red;'>{{$errors->first('Address')}}</span>
                   @endif 
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" id="exampleInp`utPassword1" placeholder="name" name='name' >
                  
                    @if($errors->first('Name'))
                    <span style='color:red;'>{{$errors->first('Name')}}</span>
                   @endif 
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name='logo'>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      
                        @if($errors->first('Logo'))
                    <span style='color:red;'>{{$errors->first('Logo')}}</span>
                   @endif 
                  </div>

                      <a href='{{ asset("uploads/$system->logo")}}'  target='_blank'> <img src='{{ asset("uploads/$system->logo")}}' height ='200px' width='200px'></a>
                    </div>
                  </div>                
                </div>
                <!-- /.card-body -->

              
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </div>
                </div>
              </form>

@endsection