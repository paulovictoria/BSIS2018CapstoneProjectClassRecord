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
						<h4 class="card-title">Edit Subject</h4>
						<hr class="bg-dark">
						{!! Form::open(['route'=>['admin.subject.update',$subject->id], 'method'=>'POST']) !!}
						<div class="form-group">
							{!! Form::text('code', $subject->code, ['class'=>'form-control', 'placeholder'=>'Subject Code']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('title', $subject->title, ['class'=>'form-control', 'placeholder'=>'Subject Description']) !!}
						</div>
						<div class="form-group">
							{!! Form::number('unit', $subject->unit, ['class'=>'form-control', 'placeholder'=>'Subject Unit', 'min'=>'0']) !!}
						</div>
						{!! Form::hidden('_method', 'PUT') !!}
						{!! Form::submit('Update', ['class'=>'btn btn-outline-success']) !!}
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