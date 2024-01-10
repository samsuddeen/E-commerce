<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin login Page</title>
    <link rel="shortcut icon" href="{{ asset('assetslogin/images/fav.png') }}" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assetslogin/images/fav.jpg') }}">
    <link rel="stylesheet" href="{{ asset('assetslogin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetslogin/css/style.css') }}" />
</head>


<body>


<form action='{{ route("admin.login.submit")}}' method='POST'>
    @csrf
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-xl-10 col-lg-11 mx-auto login-container">
                <div class="row">
                   
                    <div class="col-lg-5 col-md-6 no-padding">
                        <div class="login-box">
                            <h5>Welcome Back!</h5>

                            
                            <div class="login-row row no-margin">
                                <label for=""><i class="fas fa-envelope"></i> Email Address</label>
                                <input type="text" class="form-control form-control-sm" name='email'>
                                @if($errors->first('email'))
                                <span style='color:red;'>{{$errors->first('email')}}</span>
                                @endif
                            </div>

                             <div class="login-row row no-margin">
                                <label for=""><i class="fas fa-unlock-alt"></i> Password</label>
                                <input type="password" class="form-control form-control-sm" name='password'>
                                @if($errors->first('password'))
                                <span style='color:red;'>{{$errors->first('password')}}</span>
                                @endif

                                
                            </div>

                        
                               
                             <div class="login-row btnroo row no-margin">
                               <button type="submit" class="btn btn-primary btn-sm"> Submit</button>
                            
                            </div>
                            <div class="login-row donroo row no-margin">
                              
                            </div>
                        </div>
                    </div>
                    
                     <div class="col-lg-7 col-md-6 img-box">
                        <img src="{{ asset('images/sideimg.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</body>

<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</html>