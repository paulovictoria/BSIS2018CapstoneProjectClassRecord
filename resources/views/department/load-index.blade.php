@extends('layouts.app')

@section('title','| Subject')

@push('styles')

@endpush

@section('admin-nav')
	@include('inc.admin-nav')
@endsection

@section('content')
	<div class="container my-4">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Department List
							<a href="{{ route('admin.loaddept.create') }}" class="btn btn-outline-secondary"> Create </a>
						</h4>
						<hr class="bg-dark">
						
						<div class="table-responsive">
							<table class="table" id="departmentsTable">
							  <thead>
							    <tr>
							      <th scope="col">Code</th>
							      <th scope="col">Name</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>
							  	@foreach ($departments as $department)
							  		<tr>
							  			<td>{{$department->code}}</td>
							  			<td>{{$department->name}}</td>
							  			<td><a href="{{ route('admin.loaddept.show',$department->id) }}" class="btn btn-outline-success"> Show</a></td>
							  		</tr>
							  	@endforeach
							  </tbody>
						  </table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')

@endpush