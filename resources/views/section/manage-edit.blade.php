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
						{!! Form::open(['route'=>['registrar.section.update',$section->id], 'method'=>'POST']) !!}
						<div class="form-group">
							<select class="form-control" name="year">
								<option value="1">1st Year</option>
								<option value="2">2nd Year</option>
								<option value="3">3rd Year</option>
								<option value="4">4th Year</option>
							</select>
						</div>
						<div class="form-group">
							{!! Form::text('class', $section->class, ['class'=>'form-control', 'placeholder'=>'Section']) !!}
						</div>
						{!! Form::submit('Update', ['class'=>'btn btn-success']) !!}
						{!! Form::hidden('_method', 'PUT') !!}
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