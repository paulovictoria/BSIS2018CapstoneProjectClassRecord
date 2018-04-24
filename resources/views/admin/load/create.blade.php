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
						{!! Form::open(['route'=>'admin.load.store']) !!}

						<div class="form-group row">
							<label for="department" class="col-md-2 col-form-label text-right">Department:</label>
							<div class="col-md-9">
								<select name="department_id" id="department" class="form-control">
									@foreach ($departments as $department)
										<option value="{{$department->id}}">{{$department->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="teacher" class="col-md-2 col-form-label text-right">Teacher:</label>
							<div class="col-md-9">
								<select name="teacher_id" id="teacher" class="form-control">
									@foreach ($teachers as $teacher)
										<option value="{{$teacher->id}}"> {{$teacher->fname}} {{$teacher->lname}} </option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="subject" class="col-md-2 col-form-label text-right">Subject:</label>
							<div class="col-md-9">
								<select name="subject_id" id="subject" class="form-control">
									@foreach ($subjects as $subject)
										<option value="{{$subject->id}}"> {{$subject->code}} | {{$subject->title}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="section" class="col-md-2 col-form-label text-right">Section:</label>
							<div class="col-md-9">
								<select name="section_id" id="section" class="form-control">
									@foreach ($sections as $section)
										<option value="{{$section->id}}"> {{$section->department->code}} {{$section->year}}-{{$section->class}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="semester" class="col-md-2 col-form-label text-right">Semester:</label>
							<div class="col-md-9">
								<select name="semester_id" id="semester" class="form-control">
									@foreach ($semesters as $semester)
										<option value="{{$semester->id}}"> {{$semester->term}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<hr class="bg-dark mt-0">
						<div class="pull-right">
							{!! Form::submit('Load', ['class'=>'btn btn-success']) !!}
							<a href="{{ route('admin.load.index') }}" class="btn btn-danger">Back</a>
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#department').select2({theme:"bootstrap4"});
			$('#teacher').select2({theme:"bootstrap4"});
			$('#department').select2({theme:"bootstrap4"});
			$('#subject').select2({theme:"bootstrap4"});
			$('#section').select2({theme:"bootstrap4"});
			$('#semester').select2({theme:"bootstrap4"});
		});
	</script>	
@endpush