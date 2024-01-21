@extends('backend.dashboard.layouts.master')
@section('title','order')
@section('content')

<div class= "main-panel">
<div class= "content-wrapper">

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                        <div class="header">
                            <h2 style="text-align: center;" >
                               All User
                            </h2>                          
                        </div>
                  <div class="text-center">
                    <form action="{{route('user_search') }}" method="GET">
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
                                    <th>User_id</th>
                                     <th> Name</th>      
                                    <th>  Email</th>                                   
                                    <th> Password </th>                                                                                     
                                    <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($user as $singleuser)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $singleuser->name }}</td>
        <td>{{ $singleuser->email }}</td>
        <td>{{ $singleuser->password }}</td>
        
        
        <td>    
        <a href="{{ route('delete_user', $singleuser->id) }}" class='btn btn-danger' onclick="return confirm('Are you sure to delete')">Delete</a>
           
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
                                        <th>{{$user->count()}}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>






    </div>
</div>
            @endsection
