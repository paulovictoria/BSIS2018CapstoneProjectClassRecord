<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{{-- CSRF Token --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- Title & Logo --}}
	<title>{{ config('app.name') }} | Guardian Login</title>
	<link rel="icon" href="{{ asset('img/logo.png') }}">

	{{-- Styles --}}
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<style>
		.background{
      background-image: url('{{ asset('img/img8.jpg') }}');
      background-size: cover;
      background-attachment: fixed; 
      min-height: 100vh;
    }
    .overlay{
      background-color: rgba(0,0,0,0.7);
      min-height: 100vh;

    }
	</style>
</head>
<body class="background">
	<div class="overlay">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="row vh-100 d-flex justify-content-center align-items-center">
						<div class="col-md-8">

							<div class="card my-5">
								<div class="card-body">
									<div class="card-title text-center">
										<a href="{{ route('home') }}">
											<img src="{{ asset('img/logo.png') }}" alt="" width="100px" height="100px" class="align-middle">
										</a>
										<h2>Bulacan Polytechnic College</h2>
										<p>Grading System</p>
									</div>
										{!! Form::open(['route'=>'guardian.login.submit']) !!}
									<div class="form-group">
										{!! Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email']) !!}
									</div>
									<div class="form-group">
										{!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
									</div>
									<hr>
										{!! Form::submit('Login', ['class'=>'btn btn-block btn-outline-primary mb-3']) !!}
										{!! Form::close() !!}
									<a href="{{ route('guardian.password.request') }}" class="btn btn-block btn-outline-secondary">Forgot Password</a>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="col-md-6 d-none d-lg-block">
					
					<div class="row vh-100 d-flex align-items-center text-white">
						<div class="content">
							<h1>Welcome Guardian</h1>
							<hr class="bg-light">
							<p>"The greatest gifts you can give to your children are the roots of resposibility</p>
							<p>and the wings of independence"</p>
							<p class="blockquote-footer text-white">Denis Waitley</p>
							<a href="{{ route('guardian.register') }}" class="btn btn-outline-primary">Register</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	{{-- Scripts --}}
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>