@extends('layouts.app')

@section('title','| Add Teacher')

@section('admin-nav')
	@include('inc.admin-nav')
@endsection

@section('content')
	<div class="container my-4">
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Add Teacher</h4>
						<hr class="bg-dark">
						{!! Form::open(['route'=>'admin.teacher.store']) !!}
							<div class="form-row">
								<div class="col-md mb-3">
									{!! Form::label('fname', 'First Name', []) !!}
									{!! Form::text('fname', '', ['class'=>'form-control', 'placeholder'=>'First Name']) !!}
								</div>
								<div class="col-md mb-3">
									{!! Form::label('mname', 'Middle Name', []) !!}
									{!! Form::text('mname', '', ['class'=>'form-control', 'placeholder'=>'Middle Name']) !!}
								</div>
								<div class="col-md mb-3">
									{!! Form::label('lname', 'Last Name', []) !!}
									{!! Form::text('lname', '', ['class'=>'form-control', 'placeholder'=>'Last Name']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="col-md mb-3">
									{!! Form::label('teacher', 'Employee ID', []) !!}
									{!! Form::text('teacher_id', '', ['class'=>'form-control', 'placeholder'=>'Employee ID']) !!}
								</div>
								<div class="col-md mb-3">
									{!! Form::label('email', 'Email Address', []) !!}
									{!! Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email Address']) !!}
								</div>
							</div>
							<hr class="bg-dark mt-0">
							<div class="pull-right">
								{!! Form::submit('Add', ['class'=>'btn btn-success']) !!}
								<a href="{{ route('admin.load.index') }}" class="btn btn-danger">Cancel</a>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>	
		</div>

	</div>
@endsection