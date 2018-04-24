@extends('layouts.app')

@section('title','| Dashboard')

@section('guardian-nav')
	@include('inc.guardian-nav')
@endsection

@section('content')	<div class="container my-4">

		<div class="row mt-5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							Grades
						</h4>
						<hr class="bg-dark">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Instructor</th>
										<th scope="col">Subject</th>
										<th scope="col">Section</th>
										<th scope="col">Midterm</th>
										<th scope="col">Finals</th>
										<th scope="col">Final Grade</th>
										<th scpoe="col">Remarks</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($student->section->classloads->where('semester_id', $semester->id) as $load)
										<tr>
											<td>
												{{$load->teacher->lname}} {{$load->teacher->fname}}
											</td>
											<td>
												{{$load->subject->code}}
											</td>
											<td>
												{{$load->department->code}} {{$load->section->year}}-{{$load->section->class}}
											</td>
											<td>
												@if (count($student->midterms->where('classload_id', $load->id)) == 1)
													@foreach ($student->midterms->where('classload_id', $load->id) as $midterm)
														{{$midterm->equiv}}
													@endforeach
												@elseif (count($student->midterms->where('classload_id', $load->id)) == 0)
													No Grade Yet
												@endif
											</td>
											<td>
												@if (count($student->finalterms->where('classload_id', $load->id)) == 1)
													@foreach ($student->finalterms->where('classload_id', $load->id) as $finalterm)
														{{$finalterm->equiv}}
													@endforeach
												@elseif (count($student->finalterms->where('classload_id', $load->id)) == 0)
													No Grade Yet
												@endif
											</td>
											<td>
												@if (count($student->finalgrades->where('classload_id', $load->id)) == 1)
													@foreach ($student->finalgrades->where('classload_id', $load->id) as $finalgrade)
														{{$finalgrade->equiv}}
													@endforeach
												@elseif (count($student->finalgrades->where('classload_id', $load->id)) == 0)
													No Grade Yet
												@endif
											</td>
											<td>
												@if (count($student->finalgrades->where('classload_id', $load->id)) == 1)
													@foreach ($student->finalgrades->where('classload_id', $load->id) as $finalgrade)
														{{$finalgrade->remarks}}
													@endforeach
												@elseif (count($student->finalgrades->where('classload_id', $load->id)) == 0)
													---------
												@endif
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<hr class="bg-dark mt-0">
					</div>
				</div>
			</div>
		</div>

		@foreach ($student->section->classloads()->where('semester_id', $semester->id)->paginate(1) as $load)
		<div class="row mt-5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							Class Record - {{$load->subject->code}} {{$load->teacher->lname}} {{$load->teacher->fname}} 
						</h4>
						<hr class="bg-dark">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col"> Term </th>
										<th scope="col"> Quiz </th>
										<th scope="col"> Activity</th>
										<th scope="col"> Exam </th>
										<th scope="col"> Project </th>
										<th scope="col"> Attendance </th>
										<th scope="col"> Recitation </th>
										<th scope="col"> Character </th>
									</tr>
								</thead>
								<tbody>
										@foreach ($student->grades->where('classload_id', $load->id) as $grade)
											<tr>
												<td>
													@if ($grade->term == 1)
														Midterm
													@else
														Finals
													@endif
												</td>
												<td> {{$grade->quiz}} </td>
												<td> {{$grade->activity}} </td>
												<td> {{$grade->exam}} </td>
												<td> {{$grade->project}} </td>
												<td> {{$grade->attendance}} </td>
												<td> {{$grade->recitation}} </td>
												<td> {{$grade->character}} </td>
											</tr>
										@endforeach
								</tbody>
							</table>
						</div>
						<hr class="bg-dark mt-0">
						@endforeach
						<div class="pull-right">
							{{$student->section->classloads()->where('semester_id', $semester->id)->paginate(1)}}
						</div>
					</div>
				</div>
			</div>	
		</div>

	</div>
@endsection