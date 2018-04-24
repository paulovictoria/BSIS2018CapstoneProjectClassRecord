@extends('layouts.app')

@section('title','| Dashboard')

@section('teacher-nav')
	@include('inc.teacher-nav')
@endsection

@section('content')
	<div class="container my-4">
		<div class="row">
			<div class="col-md-12">
				
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"> Subject List </h4>
						<hr class="bg-dark">
						@if ( count($loads) == 0 )
							<h5 class="card-text text-center my-5"> No subjects is loaded in this account. </h5>
						@else
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col"> Subject </th>
											<th scope="col"> Section </th>
											<th scope="col"> Students </th>
											<th scope="col"> Action </th>
										</tr>
									</thead>
									<tbody>
										@foreach ($loads as $load)
											<tr>
												<td> {{$load->subject->code}} {{$load->subject->title}} </td>
												<td> {{$load->department->code}} {{$load->section->year}}-{{$load->section->class}} </td>
												<td> {{$load->section->students()->count()}} </td>
												<td>
													<a href="{{ route('teacher.matrix.show',$load->id) }}" class="btn btn-primary">Set Percentage</a>
													<a href="{{ route('teacher.grade.term',[$load->id, 1]) }}" class="btn btn-success">Set Midterm Grade</a>
													<a href="{{ route('teacher.grade.term',[$load->id, 2]) }}" class="btn btn-success">Set Final Grade</a>
													<a href="{{ route('teacher.grade.show',$load->id) }}" class="btn btn-success">Student List</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						@endif
						<hr class="bg-dark mt-0">
						<div class="pull-right">
							<a href="{{ route('teacher.dashboard') }}" class="btn btn-danger"> Back</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection