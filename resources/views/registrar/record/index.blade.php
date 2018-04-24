@extends('layouts.app')

@section('title','| Load Subject')

@push('styles')

@endpush

@section('registrar-nav')
	@include('inc.registrar-nav')
@endsection

@section('content')
	<div class="container my-4">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-body">
						<h4 class="card-text">School Terms
						</h4>
						<hr class="bg-dark">
						
						<div class="table-responsive">
							<table class="table">
							  <thead>
							    <tr>
							      <th scope="col">Semester</th>
							      <th scope="col">Start Date</th>
							      <th scope="col">End Date</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>
							  	@foreach ($semesters as $semester)
							  		<tr>
							  			<td>
							  				{{$semester->term}}
							  			</td>
							  			<td>
							  				{{$semester->start_date}}
							  			</td>
							  			<td>
							  				{{$semester->end_date}}
							  			</td>
							  			<td>
							  				<a href="{{ route('registrar.record.show',$semester->id) }}" class="btn btn-success">Show</a>
							  			</td>
							  		</tr>
							  	@endforeach
							  </tbody>
						  </table>
						</div>

						<hr class="bg-dark mt-0">
						<div class="pull-right">
							<a href="{{ route('registrar.dashboard') }}" class="btn btn-danger">Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection