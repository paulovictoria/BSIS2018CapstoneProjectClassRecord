@extends('layouts.app')

@section('title','| Grades')

@section('teacher-nav')
	@include('inc.teacher-nav')
@endsection

@section('content')
	<div class="container my-4">
			<div class="row mb-5">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title"> 
								{{$load->subject->title}}
								@if ($tid == 1)
									| Midterm
								@else
									| Finals
								@endif
								<div class="pull-right">
									<a href="{{ route('teacher.limit.term',[$load->id, $tid]) }}" class="btn btn-info"> <i class="fa fa-pencil-square"></i> Set High Score</a>
								</div>
							</h4>
							<hr class="bg-dark">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											@if (count($load->limits->where('term', $tid)) > 0)
												@foreach ($load->limits->where('term', $tid) as $limit)
													<th scope="col"> Name </th>
													<th scope="col"> Quiz/{{$limit->quiz}} </th>
													<th scope="col"> Activity/{{$limit->activity}}</th>
													<th scope="col"> Exam/{{$limit->exam}} </th>
													<th scope="col"> Project/{{$limit->project}} </th>
													<th scope="col"> Attendance/{{$limit->attendance}} </th>
													<th scope="col"> Recitation/{{$limit->recitation}} </th>
													<th scope="col"> Character/{{$limit->character}} </th>
													<th scope="col"> Action </th>
												@endforeach
											@else
												<th scope="col"> Name </th>
												<th scope="col"> Quiz </th>
												<th scope="col"> Activity</th>
												<th scope="col"> Exam </th>
												<th scope="col"> Project </th>
												<th scope="col"> Attendance </th>
												<th scope="col"> Recitation </th>
												<th scope="col"> Character </th>
												<th scope="col"> Action </th>
											@endif
										</tr>
									</thead>
									<tbody>
										@foreach ($load->section->students()->orderBy('lname')->paginate(10) as $student)
											<tr>
												<td> {{$student->lname}} {{$student->fname}} </td>
												@if (count($student->grades->where('classload_id', $load->id)->where('term', $tid)->where('grade_edit', 1)) > 0)
													@foreach ($student->grades->where('classload_id', $load->id)->where('term', $tid) as $grade)
														<td> {{$grade->quiz}} </td>
														<td> {{$grade->activity}} </td>
														<td> {{$grade->exam}} </td>
														<td> {{$grade->project}} </td>
														<td> {{$grade->attendance}} </td>
														<td> {{$grade->recitation}} </td>
														<td> {{$grade->character}} </td>
														<td>
														{!! Form::submit('Set Grade', ['class'=>'btn btn-success', 'disabled'=>'']) !!}
														</td>
													@endforeach
												@elseif (count($student->grades->where('classload_id', $load->id)->where('term', $tid)->where('grade_edit', 0)) > 0)
													@foreach ($student->grades->where('classload_id', $load->id)->where('term', $tid) as $grade)
														<td> {{$grade->quiz}} </td>
														<td> {{$grade->activity}} </td>
														<td> {{$grade->exam}} </td>
														<td> {{$grade->project}} </td>
														<td> {{$grade->attendance}} </td>
														<td> {{$grade->recitation}} </td>
														<td> {{$grade->character}} </td>
														<td>
															<a href="{{ route('teacher.grade.edit',$grade->id) }}" class="btn btn-primary btn-block">Edit</a>
														</td>
													@endforeach
												@else
													{!! Form::open(['route'=>'teacher.grade.store']) !!}
													<td> <input type="number" name="quiz" style="width: 80px;" min="0"> </td>
													<td> <input type="number" name="activity" style="width: 80px;" min="0"> </td>
													<td> <input type="number" name="exam" style="width: 80px;" min="0"> </td>
													<td> <input type="number" name="project" style="width: 80px;" min="0"> </td>
													<td> <input type="number" name="attendance" style="width: 80px;" min="0"> </td>
													<td> <input type="number" name="recitation" style="width: 80px;" min="0"> </td>
													<td> <input type="number" name="character" style="width: 80px;" min="0"> </td>
													<td>
														{!! Form::hidden('term', $tid, []) !!}
														{!! Form::hidden('student_id', $student->id, []) !!}
														{!! Form::hidden('classload_id', $load->id, []) !!}
														{!! Form::submit('Set Grade', ['class'=>'btn btn-success']) !!}
														{!! Form::close() !!}
													</td>
												@endif
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<hr class="bg-dark mt-0">
							<div class="pull-left">
								{{$load->section->students()->orderBy('lname')->paginate(10)}}
							</div>
							<div class="pull-right">
								<a href="{{ route('teacher.matrix.index') }}" class="btn btn-danger"> Back</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		@if (count($load->section->irregulars->where('semester_id',$load->semester_id)->where('subject_id',$load->subject_id)) != 0)
			<div class="row mb-5">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title"> 
								{{$load->subject->title}}
								@if ($tid == 1)
									| Midterm
								@else
									| Finals
								@endif
								<div class="pull-right">
									<a href="{{ route('teacher.limit.term',[$load->id, $tid]) }}" class="btn btn-info"> <i class="fa fa-pencil-square"></i> Set High Score</a>
								</div>
							</h4>
							<hr class="bg-dark">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											@if (count($load->limits->where('term', $tid)) > 0)
												@foreach ($load->limits->where('term', $tid) as $limit)
													<th scope="col"> Name </th>
													<th scope="col"> Quiz/{{$limit->quiz}} </th>
													<th scope="col"> Activity/{{$limit->activity}}</th>
													<th scope="col"> Exam/{{$limit->exam}} </th>
													<th scope="col"> Project/{{$limit->project}} </th>
													<th scope="col"> Attendance/{{$limit->attendance}} </th>
													<th scope="col"> Recitation/{{$limit->recitation}} </th>
													<th scope="col"> Character/{{$limit->character}} </th>
													<th scope="col"> Action </th>
												@endforeach
											@else
												<th scope="col"> Name </th>
												<th scope="col"> Quiz </th>
												<th scope="col"> Activity</th>
												<th scope="col"> Exam </th>
												<th scope="col"> Project </th>
												<th scope="col"> Attendance </th>
												<th scope="col"> Recitation </th>
												<th scope="col"> Character </th>
												<th scope="col"> Action </th>
											@endif
										</tr>
									</thead>
									<tbody>
									@foreach ($load->section->irregulars->where('semester_id',$load->semester_id)->where('subject_id',$load->subject_id) as $irregular)
										<tr>
											<td> {{$irregular->student->lname}} {{$irregular->student->fname}} </td>
											@if (count($irregular->student->grades->where('classload_id', $load->id)->where('term', $tid)) > 0)
												@foreach ($irregular->student->grades->where('classload_id', $load->id)->where('term', $tid) as $grade)
													<td> {{$grade->quiz}} </td>
													<td> {{$grade->activity}} </td>
													<td> {{$grade->exam}} </td>
													<td> {{$grade->project}} </td>
													<td> {{$grade->attendance}} </td>
													<td> {{$grade->recitation}} </td>
													<td> {{$grade->character}} </td>
													<td>
														<a href="{{ route('teacher.grade.edit',$grade->id) }}" class="btn btn-info">Edit</a>
													</td>
												@endforeach
											@else
												{!! Form::open(['route'=>'teacher.grade.store']) !!}
												<td> <input type="number" name="quiz" style="width: 80px;" min="0"> </td>
												<td> <input type="number" name="activity" style="width: 80px;" min="0"> </td>
												<td> <input type="number" name="exam" style="width: 80px;" min="0"> </td>
												<td> <input type="number" name="project" style="width: 80px;" min="0"> </td>
												<td> <input type="number" name="attendance" style="width: 80px;" min="0"> </td>
												<td> <input type="number" name="recitation" style="width: 80px;" min="0"> </td>
												<td> <input type="number" name="character" style="width: 80px;" min="0"> </td>
												<td>
													{!! Form::hidden('term', $tid, []) !!}
													{!! Form::hidden('student_id', $irregular->student->id, []) !!}
													{!! Form::hidden('classload_id', $load->id, []) !!}
													{!! Form::submit('Set Grade', ['class'=>'btn btn-success']) !!}
													{!! Form::close() !!}
												</td>
											@endif
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
							<hr class="bg-dark mt-0">
							<div class="pull-right">
								<a href="{{ route('teacher.matrix.index') }}" class="btn btn-danger"> Back</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endif
	</div>
@endsection