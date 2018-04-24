@extends('layouts.app')

@section('title','| Create School Term')

@section('registrar-nav')
	@include('inc.registrar-nav')
@endsection

@section('content')
	<div class="container my-4">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Create School Term</h4>
						<hr class="bg-dark">
						{!! Form::open(['route'=>'registrar.semester.store']) !!}
							<div class="form-group">
								{!! Form::label('term', 'School Term', []) !!}
								{!! Form::text('term', '', ['class'=>'form-control', 'placeholder'=>'School Term',]) !!}
							</div>
							<div class="form-row">
								<div class="col-md-6 mb-3">
									{!! Form::label('start_date', 'Start Date', []) !!}
									{!! Form::date('start_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-6 mb-3">
									{!! Form::label('end_date', 'End Date', []) !!}
									{!! Form::date('end_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
								</div>
							</div>
						<hr class="bg-dark mt-0">
						<div class="pull-right">
							{!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
							<a href="{{ route('registrar.semester.index') }}" class="btn btn-danger">Back</a>
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')

@endpush