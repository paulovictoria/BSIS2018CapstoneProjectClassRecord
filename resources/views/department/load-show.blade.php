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
						<h4 class="card-title">
							{{$department->name}}
							{{-- <a href="{{ route('admin.loaddept.create') }}" class="btn btn-outline-secondary"> Create </a> --}}
						</h4>
						<hr class="bg-dark">
						
						<div class="table-responsive">
							<table class="table" id="departmentsTable">
							  <thead>
							    <tr>
							      <th scope="col">Code</th>
							      <th scope="col">Description</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>
							  	@foreach ($department->subjects as $subject)
							  		<tr>
							  			<td>{{$subject->code}}</td>
							  			<td>{{$subject->title}}</td>
							  			<td>
							  				<div class="row">
							  					<div class="col">
							  						<a href="{{ route('admin.loaddept.edit',$subject->pivot->id) }}" class="btn btn-outline-primary btn-block"> Edit</a>
							  					</div>
							  					<div class="col">
							  						{!! Form::open(['route'=>['admin.loaddept.destroy',$subject->pivot->id], 'method'=>'POST']) !!}
							  						{!! Form::hidden('_method', 'DELETE') !!}
							  						{!! Form::submit('Delete', ['class'=>'btn btn-outline-danger btn-block']) !!}
							  						{!! Form::close() !!}
							  					</div>
							  				</div>
							  			</td>
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