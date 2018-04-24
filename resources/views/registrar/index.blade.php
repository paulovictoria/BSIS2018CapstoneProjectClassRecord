@extends('layouts.app')

@section('title','| Dashboard')

@section('registrar-nav')
	@include('inc.registrar-nav')
@endsection

@section('content')
	<div class="container my-4">

		{{-- Counter --}}
		<section id="showcase">
			<div class="row text-right">

				<div class="col-md-6">
					<div class="card bg-primary text-white">
						<div class="card-body">
							<div class="row">
								<div class="col-3 d-none d-lg-block text-left">
									<i class="fa fa-university fa-5x"></i>
								</div>
								<div class="col-9">
									<h2 class="card-title">Departments: {{$departments->count()}}</h2>
								</div>
							</div>
							<hr class="bg-light">
							<a href="" class="card-link text-white">View More <i class="fa fa-caret-right"></i></a>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="card bg-secondary text-white">
						<div class="card-body">
							<div class="row">
								<div class="col-3 d-none d-lg-block text-left">
									<i class="fa fa-book fa-5x"></i>
								</div>
								<div class="col-9">
									<h2 class="card-title">Sections: {{$sections->count()}}</h2>
								</div>
							</div>
							<hr class="bg-light">
							<a href="" class="card-link text-white">View More <i class="fa fa-caret-right"></i></a>
						</div>
					</div>
				</div>

			</div>

			<div class="row mt-4 text-right">

				<div class="col-md-6">
					<div class="card bg-success text-white">
						<div class="card-body">
							<div class="row">
								<div class="col-3 d-none d-lg-block text-left">
									<i class="fa fa-users fa-5x"></i>
								</div>
								<div class="col-9">
									<h2 class="card-title">Teachers: {{$teachers->count()}}</h2>
								</div>
							</div>
							<hr class="bg-light">
							<a href="" class="card-link text-white">View More <i class="fa fa-caret-right"></i></a>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="card bg-danger text-white">
						<div class="card-body">
							<div class="row">
								<div class="col-3 d-none d-lg-block text-left">
									<i class="fa fa-support fa-5x"></i>
								</div>
								<div class="col-9">
									<h2 class="card-title">Students: {{$students->count()}}</h2>
								</div>
							</div>
							<hr class="bg-light">
							<a href="" class="card-link text-white">View More <i class="fa fa-caret-right"></i></a>
						</div>
					</div>
				</div>

			</div>
		</section>

	</div>
@endsection