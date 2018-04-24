@extends('layouts.app')

@section('title','| Dashboard')

@section('guardian-nav')
	@include('inc.guardian-nav')
@endsection

@section('content')
	<div class="container my-4">

		<div class="row">
			<div class="col-md-5 offset-7">
				<div class="card">
					<div class="card-body d-flex align-items-center">
						{!! Form::open(['route'=>'guardian.store', 'class'=>'form-inline mx-auto']) !!}
						<div class="form-group">
							{!! Form::label('student_id', 'Student ID:', ['class'=>'mr-2']) !!}
							{!! Form::text('student_id', '', ['class'=>'form-control mr-2']) !!}
							{!! Form::hidden('guardian_id', $guardian->id, []) !!}
							{!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>

		@if (count($guardian->students) == 0)
			<div class="row mt-5">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<hr class="bg-dark">
							<h4 class="card-text text-center py-3">
								No Available Student
							</h4>
							<hr class="bg-dark mt-0">
						</div>
					</div>
				</div>
			</div>
		@elseif (count($guardian->students) > 0)
			<div class="row mt-5">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">
								Student List
							</h4>
							<hr class="bg-dark">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Name</th>
											<th scope="col">Section</th>
											<th scope="col">Course</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
										@foreach ($guardian->students as $student)
											<tr>
												<td>
													{{$student->lname}} {{$student->fname}}
												</td>
												<td>
													{{$student->section->department->code}}-{{$student->section->year}} {{$student->section->class}}
												</td>
												<td>
													{{$student->section->department->name}}
												</td>
												<td>
													<div class="row mx-0">
														<div class="col-6">
															<a href="{{ route('guardian.show',$student->id) }}" class="btn btn-success btn-block">Grade</a>
														</div>
														<div class="col-6">
															{!! Form::open(['route'=>['guardian.destroy',$student->id,$guardian->id], 'method'=>'POST']) !!}
															{!! Form::hidden('_method', 'DELETE') !!}
															{!! Form::submit('Unload', ['class'=>'btn btn-danger btn-block']) !!}
															{!! Form::close() !!}
														</div>
													</div>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endif
	</div>
@endsection