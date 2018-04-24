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
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Create Subject</h4>
						<hr class="bg-dark">
						{!! Form::open(['route'=>'admin.subject.store']) !!}
						<div class="form-group">
							{!! Form::text('code', '', ['class'=>'form-control', 'placeholder'=>'Subject Code']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Subject Description']) !!}
						</div>
						<div class="form-group">
							{!! Form::number('unit', '', ['class'=>'form-control', 'placeholder'=>'Subject Unit', 'min'=>'0']) !!}
						</div>
						{!! Form::submit('Create', ['class'=>'btn btn-outline-success']) !!}
						<a href="{{ route('admin.subject.index') }}" class="btn btn-outline-primary">Back</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')

@endpush