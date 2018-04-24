@extends('layouts.app')

@section('title','| Create Department')

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
						<h4 class="card-title">Create Department</h4>
						<hr class="bg-dark">
						{!! Form::open(['route'=>'admin.department.store']) !!}
						<div class="form-group">
							{!! Form::text('code', '', ['class'=>'form-control', 'placeholder'=>'Department Code']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Department Description']) !!}
						</div>
						{!! Form::submit('Create', ['class'=>'btn btn-outline-success']) !!}
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