@extends('layouts.app')

@section('title','| Set High Score')

@section('teacher-nav')
	@include('inc.teacher-nav')
@endsection

@section('content')
	<div class="container my-4">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							Subject: {{$load->subject->code}} |
							Section: {{$load->department->code}} {{$load->section->year}}-{{$load->section->class}}
							Term: 
							@if ($lid == 1)
								Midterm
							@else
								Finals
							@endif
						</h4>
						<hr class="bg-dark">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col"> Quiz </th>
										<th scope="col"> Activity</th>
										<th scope="col"> Exam </th>
										<th scope="col"> Project </th>
										<th scope="col"> Attendance </th>
										<th scope="col"> Recitation </th>
										<th scope="col"> Character </th>
										<th scope="col"> Action </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										@if (count($load->limits->where('term',$lid)) > 0)
											@foreach ($load->limits->where('term',$lid) as $limit)
													<td> {{$limit->quiz}} </td>
													<td> {{$limit->activity}} </td>
													<td> {{$limit->exam}} </td>
													<td> {{$limit->project}} </td>
													<td> {{$limit->attendance}} </td>
													<td> {{$limit->recitation}} </td>
													<td> {{$limit->character}} </td>
													<td>
														<a href="{{ route('teacher.limit.edit',$limit->id) }}" class="btn btn-outline-info">Edit</a>
													</td>
											@endforeach
										@else
											{!! Form::open(['route'=>'teacher.limit.store']) !!}
											<td> <input type="number" name="quiz" style="width: 80px;" min="0"> </td>
											<td> <input type="number" name="activity" style="width: 80px;" min="0"> </td>
											<td> <input type="number" name="exam" style="width: 80px;" min="0"> </td>
											<td> <input type="number" name="project" style="width: 80px;" min="0"> </td>
											<td> <input type="number" name="attendance" style="width: 80px;" min="0"> </td>
											<td> <input type="number" name="recitation" style="width: 80px;" min="0"> </td>
											<td> <input type="number" name="character" style="width: 80px;" min="0"> </td>
											<td>
												{!! Form::hidden('term', $lid, []) !!}
												{!! Form::hidden('classload_id', $load->id, []) !!}
												{!! Form::submit('Set High Score', ['class'=>'btn btn-outline-success']) !!}
												{!! Form::close() !!}
											</td>
										@endif
									</tr>
								</tbody>
							</table>
						</div>
						<hr class="bg-dark mt-0">
						<div class="pull-right">
							<a href="{{ route('teacher.grade.term',[$load->id, $lid]) }}" class="btn btn-outline-danger"> Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection