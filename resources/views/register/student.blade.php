<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{{-- CSRF Token --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- Title & Logo --}}
	<title>{{ config('app.name') }} | Student Register</title>
	<link rel="icon" href="{{ asset('img/logo.png') }}">

	{{-- Styles --}}
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<style>
		.background{
      background-image: url('{{ asset('img/img6.jpg') }}');
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
		<div class="container">
			<div class="row vh-100 d-flex justify-content-center align-items-center">
				<div class="col-md-6">

					<div class="card my-5">
						<div class="card-body">
							<div class="card-title text-center">
								<a href="{{ route('home') }}">
									<img src="{{ asset('img/logo.png') }}" alt="" width="100px" height="100px" class="align-middle">
								</a> 
								<h2>Bulacan Polytechnic College</h2>
								<p>Grading System</p>
							</div>
								{!! Form::open(['route'=>'student.register']) !!}
							<div class="form-group">
								{!! Form::text('student_id', '', ['class'=>'form-control', 'placeholder'=>'Student ID']) !!}
							</div>
							<div class="form-group">
								{!! Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Full Name']) !!}
							</div>
							<div class="form-group">
								{!! Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email']) !!}
							</div>
							<div class="form-group">
								{!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
							</div>
							<div class="form-group">
								{!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirm Password']) !!}
							</div>
							<hr>
								{!! Form::submit('Register', ['class'=>'btn btn-block btn-outline-primary mb-3']) !!}
								{!! Form::close() !!}
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