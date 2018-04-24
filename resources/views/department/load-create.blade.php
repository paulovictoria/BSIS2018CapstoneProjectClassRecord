@extends('layouts.app')

@section('title','| Load Subject')

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
						<h4 class="card-title">Load Subject</h4>
						<hr class="bg-dark">
						{!! Form::open(['route'=>'admin.loaddept.store']) !!}
						<div class="form-group">
							<select name="department_id" id="" class="form-control">
								@foreach ($departments as $department)
									<option value="{{$department->id}}">{{$department->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<select name="subject_id" id="" class="form-control">
								@foreach ($subjects as $subject)
									<option value="{{$subject->id}}">{{$subject->title}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<select name="year" id="" class="form-control">
								<option value="1st Year">1st Year</option>
								<option value="2nd Year">2nd Year</option>
								<option value="3rd Year">3rd Year</option>
								<option value="4th Year">4th Year</option>
							</select>
						</div>
						{!! Form::text('section', '', ['class'=>'form-control', 'placeholder'=>'Section']) !!}
						<hr class="bg-dark">
						{!! Form::submit('Create', ['class'=>'btn btn-outline-success']) !!}
						<a href="{{ route('admin.loaddept.index') }}" class="btn btn-outline-primary">Back</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')

@endpush