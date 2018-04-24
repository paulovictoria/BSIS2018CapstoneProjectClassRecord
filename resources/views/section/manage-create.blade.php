@extends('layouts.app')

@section('title','| Section')

@push('styles')

@endpush

@section('registrar-nav')
	@include('inc.registrar-nav')
@endsection

@section('content')
	<div class="container my-4">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Create Section</h4>
						<hr class="bg-dark">
						{!! Form::open(['route'=>['registrar.section.store.section',$department->id], 'method'=>'POST']) !!}
						<div class="form-group">
							{!! Form::label('year', 'Year Level', []) !!}
							{!! Form::select('year', ['1'=>'1st Year', '2'=>'2nd Year', '3'=>'3rd Year', '4'=>'4th Year'], 'Year', ['class'=>'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('class', 'Class Section', []) !!}
							{!! Form::text('class', '', ['class'=>'form-control', 'placeholder'=>'Section']) !!}
						</div>
						{!! Form::submit('Create', ['class'=>'btn btn-outline-success']) !!}
						<a href="{{ route('registrar.section.index') }}" class="btn btn-danger">Back</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')

@endpush