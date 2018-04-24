@extends('layouts.app')

@section('title','| Department')

@push('styles')

@endpush

@section('admin-nav')
	@include('inc.admin-nav')
@endsection

@section('content')
	<div class="container my-4">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Edit Department</h4>
						<hr class="bg-dark">
						{!! Form::open(['route'=>['admin.department.update',$department->id], 'method'=>'POST']) !!}
						<div class="form-group">
							{!! Form::text('code', $department->code, ['class'=>'form-control', 'placeholder'=>'Department Acronym']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('name', $department->name, ['class'=>'form-control', 'placeholder'=>'Department Name']) !!}
						</div>
						{!! Form::hidden('_method', 'PUT') !!}
						{!! Form::submit('Update', ['class'=>'btn btn-outline-success']) !!}
						<a href="{{ route('admin.department.index') }}" class="btn btn-outline-primary">Back</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')

@endpush