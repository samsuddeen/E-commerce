<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .container-fluid {
            height: 100vh; /* 100% of the viewport height */
        }

        .row {
            height: 100%;
        }

        .img-box {
            height: 100%;
            width: 50%; /* Adjust as needed */
            display: flex;
            justify-content: flex-end;
            overflow: hidden;
        }

        .img-box img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        .form-container {
            height: 100%;
            width: 50%; /* Adjust as needed */
        }

        .form-box {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .logo img {
            width: 150px;
        }
    </style>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 col-md-6 img-box">
            <img src="{{ asset('images/bg.jpg') }}" alt="">
        </div>

        <div class="col-lg-5 col-md-6 form-container">
            <div class="form-box text-center">
                <div class="logo mb-3">
                    <img src="{{ asset('images/logofront.png') }}" alt="" width="150px">
                </div>
                <div class="heading mb-4">
                    <h4>Create an Account</h4>
                </div>
					<form action="{{route('user.register')}}" method="post">
                    @csrf
						<div class="form-input">
							<span><i class="fa fa-user"></i></span>
							<input type="text" placeholder="Full Name" required name="fullname">
						</div>
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" placeholder="Email Address" required name="email">
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" placeholder="Password" required name="password">
						</div>
						
									
						<div class="text-left mb-3">
							<br>
							<br>
							<button type="submit" class="btn">Register</button>
					
						
						<div style="color: #777">Already have an account
						<br>
						
							<a href="{{ route('login') }}" class="login-link">Login here</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	
</body>
</html>