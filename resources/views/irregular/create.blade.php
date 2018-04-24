@extends('layouts.app')

@section('title','| Irregular Student')

@section('registrar-nav')
	@include('inc.registrar-nav')
@endsection

@section('content')
	<div class="container my-4">
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							Add Irregular Students
						</h4>
						<hr class="bg-dark">
						{!! Form::open(['route'=>'registrar.irregular.store']) !!}

						<div class="form-group row">
							<label for="student_d" class="col-md-2 col-form-label text-right">Student:</label>
							<div class="col-md-9">
								<select name="student_id" id="student" class="form-control">
									@foreach ($students as $student)
										<option value="{{$student->id}}">{{$student->lname}} {{$student->fname}}</option>
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
							{!! Form::submit('Add', ['class'=>'btn btn-success']) !!}
							<a href="{{ route('registrar.irregular.index') }}" class="btn btn-danger">Back</a>
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
			$('#student').select2({theme:"bootstrap4"});
			$('#subject').select2({theme:"bootstrap4"});
			$('#section').select2({theme:"bootstrap4"});
			$('#semester').select2({theme:"bootstrap4"});
		});
	</script>	
@endpush