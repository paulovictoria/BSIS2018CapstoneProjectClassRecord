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
						<h4 class="card-title">Edit Load Subject</h4>
						<hr class="bg-dark">
						{!! Form::open(['route'=>['admin.loaddept.update',$data->id], 'method'=>'POST']) !!}
						<div class="form-group">
							<select name="department_id" id="" class="form-control">
								@foreach ($departments as $department)
									@if ($data->department_id == $department->id)
										<option value="{{$department->id}}" selected="selected">{{$department->name}}</option>
									@else
										<option value="{{$department->id}}">{{$department->name}}</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<select name="subject_id" id="" class="form-control">
								@foreach ($subjects as $subject)
									@if ($data->subject_id == $subject->id)
										<option value="{{$subject->id}}" selected="selected">{{$subject->title}}</option>
									@else
										<option value="{{$subject->id}}">{{$subject->title}}</option>
									@endif
								@endforeach
							</select>
						</div>
						{!! Form::hidden('_method', 'PUT') !!}
						{!! Form::submit('Update', ['class'=>'btn btn-outline-success']) !!}
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