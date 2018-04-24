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
						<h4 class="card-title">
							Update Section | {{$student->lname}} {{$student->fname}}
						</h4>
						<hr class="bg-dark">
						{!! Form::open(['route'=>['registrar.student.changeupdate',$student->id], 'method'=>'POST']) !!}
						<div class="form-row">
							<div class="col-md-6">
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
							<div class="col-md-6">
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
						<hr class="bg-dark">
						<div class="pull-right">
							{!! Form::hidden('_method', 'PUT', []) !!}
							{!! Form::submit('Update', ['class'=>'btn btn-success']) !!}
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