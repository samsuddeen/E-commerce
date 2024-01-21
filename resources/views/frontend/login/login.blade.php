<!DOCTYPE html>
<html>
<head>
	<title>User Login Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-7 col-md-6 img-box">
				<img src="{{ asset('images/bg.jpg') }}" alt="">
			</div>

			<div class="col-lg-5 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mb-3">
						<img src="{{ asset('images/logofront.png') }}" width="150px">
					</div>
					<div class="heading mb-4">
						<h4>Login into your account</h4>
					</div>
					<form action="{{route('user.login')}}" method="post">
						@csrf 
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" placeholder="Email Address" required name="email">
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" placeholder="Password" required name="password">
						</div>
						<div class="row mb-3">
							<div class="col-6 d-flex">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="cb1">
									<label class="custom-control-label text-white" for="cb1">Remember me</label>
								</div>
							</div>
							<div class="col-6 text-right">
								<a href="forget.html" class="forget-link">Forget Password</a>
							</div>
						</div>
						<div class="text-left mb-3">
							<button type="submit" class="btn">Login</button>
						</div>
						<div class="text-center mb-2">
							<div style="color: #777">Don't have an account
								<a href="{{ route('registerUser') }}" class="register-link">Register here</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<style>
        .img-box {
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: flex-end;
        }
    </style>

</body>
</html>
