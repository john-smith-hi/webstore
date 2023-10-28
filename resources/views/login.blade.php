<!doctype html>
<html lang="en">
  <head>
  	<title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Đăng nhập</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
				<div class="col-md-12 form-group text-center">
					<div>*Đăng nhập hoặc tạo tài khoản</div>
				</div>
					<form action="{{ route('login.submit')}}" method="POST" class="login-form">
                        @csrf
						<div class="form-group text-center">
							<input name="email" type="email" class="form-control text-center" placeholder="Email" required>
							@error('email')
								<span style="color: red">{{$message}}</span>
							@enderror
						</div>
						<div class="col-md-12 text-center">
							@include('admin.layouts.alert')
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Đăng nhập</button>
						</div>
					</form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>

	</body>
</html>

