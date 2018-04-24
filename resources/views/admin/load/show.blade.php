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
			<div class="col-md-10">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							{{$teacher->fname}} {{$teacher->lname}}
						</h4>
						<hr class="bg-dark">
						
						<div class="table-responsive">
							<table class="table" id="departmentsTable">
							  <thead>
							    <tr>
							      <th scope="col">Subject</th>
							      <th scope="col">Section</th>
							      <th scope="col">Semester</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>
					  			@foreach($teachers as $teacher)
										<tr>
											<td>{{$teacher->subject->title}}</td>
											<td>{{$teacher->department->code}} {{$teacher->section->year}}-{{$teacher->section->class}}</td>
											<td>{{$teacher->semester->term}}</td>
											<td>
												{!! Form::open(['route'=>['admin.load.destroy',$teacher->id], 'method'=>'POST']) !!}
												{!! Form::hidden('_method', 'DELETE') !!}
												{!! Form::submit('Unload', ['class'=>'btn btn-danger btn-block']) !!}
												{!! Form::close() !!}
											</td>
										</tr>
					  			@endforeach
							  </tbody>
						  </table>
						</div>

						<hr class="bg-dark mt-0">
						<div class="pull-right">
							<a href="{{ route('admin.load.index') }}" class="btn btn-danger">Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection