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
							Manage Irregular Students
							<div class="pull-right">
								<a href="{{ route('registrar.irregular.create') }}" class="btn btn-success"> Add Irregular Student</a>
							</div>
						</h4>
						<hr class="bg-dark">
						<div class="table-responsive">
							<table class="table" id="studentsTable">
								<thead>
									<tr>
										<th>ID</th>
										<th>Full Name</th>
										<th>Section</th>
										<th>Email</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($irregs as $irreg)
										<tr>
											<td>{{$irreg->student->student_id}}</td>
											<td>{{$irreg->student->lname}} {{$irreg->student->fname}}</td>
											<td>{{$irreg->section->department->code}} {{$irreg->section->year}}-{{$irreg->section->class}}</td>
											<td>{{$irreg->student->email}}</td>
											<td>
									      {!! Form::open(['route'=>['registrar.irregular.destroy',$irreg->id], 'method'=>'POST']) !!}
												{!! Form::hidden('_method', 'DELETE') !!}
												{!! Form::submit('Unload', ['class'=>'btn btn-danger btn-block']) !!}
												{!! Form::close() !!}
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

	</div>
@endsection