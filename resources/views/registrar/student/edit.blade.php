@extends('layouts.app')

@section('title','| Add Student')

@section('registrar-nav')
	@include('inc.registrar-nav')
@endsection

@section('content')
	<div class="container my-4">
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Reassign Student</h4>
						<hr class="bg-dark">
						{!! Form::open(['route'=>['registrar.student.update',$student->id], 'method'=>'POST']) !!}
							<div class="form-row">
								<div class="col-md-6 mb-3">
									{!! Form::label('semester', 'Semester', []) !!}
									<select name="semester_id" id="semester" class="form-control">
										@foreach ($semesters as $semester)
											@if ($student->semester_id == $semester->id)
												<option value=" {{$semester->id}} " selected> {{$semester->term}} </option>
											@endif
											<option value=" {{$semester->id}} "> {{$semester->term}} </option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md mb-3">
									{!! Form::label('fname', 'First Name', []) !!}
									{!! Form::text('fname', $student->fname, ['class'=>'form-control', 'placeholder'=>'First Name']) !!}
								</div>
								<div class="col-md mb-3">
									{!! Form::label('mname', 'Middle Name', []) !!}
									{!! Form::text('mname', $student->mname, ['class'=>'form-control', 'placeholder'=>'Middle Name']) !!}
								</div>
								<div class="col-md mb-3">
									{!! Form::label('lname', 'Last Name', []) !!}
									{!! Form::text('lname', $student->lname, ['class'=>'form-control', 'placeholder'=>'Last Name']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-3 mb-3">
									{!! Form::label('student', 'Student ID', []) !!}
									{!! Form::text('student_id', $student->student_id, ['class'=>'form-control', 'placeholder'=>'Student ID', 'data-mask'=>'00-0000']) !!}
								</div>
								<div class="col-md-3">
									{!! Form::label('section', 'Section', []) !!}
									<select name="section_id" id="section" class="form-control">
										@foreach ($sections as $section)
											@if ($student->section_id == $section->id)
												<option value=" {{$section->id}} " selected> {{$section->department->code}} {{$section->year}}-{{$section->class}} </option>
											@endif
											<option value=" {{$section->id}} "> {{$section->department->code}} {{$section->year}}-{{$section->class}} </option>
										@endforeach
									</select>
								</div>
								<div class="col-md mb-3">
									{!! Form::label('email', 'Email Address', []) !!}
									{!! Form::email('email', $student->email, ['class'=>'form-control', 'placeholder'=>'Email Address']) !!}
								</div>
							</div>
							<hr class="bg-dark mt-0">
							<div class="pull-right">
								{!! Form::hidden('_method', 'PUT', []) !!}
								{!! Form::submit('Reassign', ['class'=>'btn btn-success']) !!}
								<a href="{{ route('registrar.student.index') }}" class="btn btn-danger">Cancel</a>
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
    $(document).ready(function(){ 
      $('#teacher_id').mask('00-0000');
			$('#section').select2({theme:"bootstrap4"});
    });
	</script>
@endpush