@extends('layouts.app')

@section('title','| Grade')

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
							{{$load->subject->code}}
							{{$load->subject->title}}
							<div class="pull-right">
								<a href="{{ route('teacher.print.sheet',$load->id) }}" class="btn btn-info">Print Gradesheet</a>
							</div>
						</h4>
						<hr class="bg-dark">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col" width="25%"> Name </th>
										<th scope="col"> Midterm </th>
										<th scope="col"> Finals</th>
										<th scope="col"> Final Grade </th>
										<th scope="col"> Remarks </th>
										<th scope="col"> Action </th>
									</tr>
								</thead>
								<tbody>
									@foreach ($load->section->students()->orderBy('lname')->paginate(10) as $student)
										<tr>
											<td> {{$student->student_id}} - {{$student->lname}} {{$student->fname}} </td>
											<td>
												@if (count($midterms->where('classload_id',$load->id)->where('student_id',$student->id)) == 1)
													@foreach ($midterms->where('classload_id',$load->id)->where('student_id',$student->id) as $midterm)
														{{$midterm->equiv}}
													@endforeach
												@elseif (count($midterms->where('classload_id',$load->id)->where('student_id',$student->id)) == 0)
													No Grade
												@endif
											</td>
											<td>
												@if (count($finalterms->where('classload_id',$load->id)->where('student_id',$student->id)) == 1)
													@foreach ($finalterms->where('classload_id',$load->id)->where('student_id',$student->id) as $finalterm)
														{{$finalterm->equiv}}
													@endforeach
												@elseif (count($finalterms->where('classload_id',$load->id)->where('student_id',$student->id)) == 0)
													No Grade
												@endif
											</td>
											<td>
												@if (count($student->grades->where('classload_id',$load->id)) < 2)
													No Grade
												@endif
												@if (count($student->grades->where('term', 1)->where('classload_id',$load->id)) == 1 && count($student->grades->where('term', 2)->where('classload_id',$load->id)) == 1)
													@switch($finalgrade = round(($midterm->grade + $finalterm->grade)/2,2))
													    @case($finalgrade >= 0.00 and $finalgrade <= 74.99)
													        {{$fg = 5.00}}
													        @break
													    @case($finalgrade >= 75.00 and $finalgrade <= 76.99)
													        {{$fg = 3.00}}
													        @break
													    @case($finalgrade >= 77.00 and $finalgrade <= 79.99)
													        {{$fg = 2.75}}
													        @break
													    @case($finalgrade >= 80.00 and $finalgrade <= 82.99)
													        {{$fg = 2.50}}
													        @break
													    @case($finalgrade >= 83.00 and $finalgrade <= 85.99)
													        {{$fg = 2.25}}
													        @break
													    @case($finalgrade >= 86.00 and $finalgrade <= 88.99)
													        {{$fg = 2.00}}
													        @break
													    @case($finalgrade >= 89.00 and $finalgrade <= 91.99)
													        {{$fg = 1.75}}
													        @break
													    @case($finalgrade >= 92.00 and $finalgrade <= 94.99)
													        {{$fg = 1.50}}
													        @break
													    @case($finalgrade >= 95.00 and $finalgrade <= 97.99)
													        {{$fg = 1.25}}
													        @break
													    @case($finalgrade >= 98.00 and $finalgrade <= 100.00)
													        {{$fg = 1.00}}
													        @break
													@endswitch
												@endif
											</td>
											<td>
												@if (count($student->grades->where('classload_id',$load->id)) < 2)
												------
												@endif
												@if (count($student->grades->where('term', 1)->where('classload_id',$load->id)) == 1 && count($student->grades->where('term', 2)->where('classload_id',$load->id)) == 1)
													@if (count($student->finalgrades->where('classload_id', $load->id)->where('grade_edit',1)) == 1)
														@foreach ($student->finalgrades as $last)
															{{$last->remarks}}
														@endforeach
													@elseif (count($student->finalgrades->where('classload_id', $load->id)->where('grade_edit',0)) == 1)
														@foreach ($student->finalgrades as $last)
															{!! Form::open(['route'=>['teacher.grade.updategrade',$last->id]]) !!}
															<select name="remarks" id="">
															@if ($finalgrade >= 0.00 and $finalgrade <= 76.99)
																<option value="FAILED">FAILED</option>
																<option value="DROP">DROP</option>
																<option value="DROP">UD</option>
																<option value="DROP">NA</option>
															@else
																<option value="PASSED">PASSED</option>
																<option value="INC">INC</option>
																<option value="NFE">NFE</option>
															@endif
															</select>
														@endforeach
													@else
														{!! Form::open(['route'=>'teacher.grade.storegrade']) !!}
														<select name="remarks" id="">
														@if ($finalgrade >= 0.00 and $finalgrade <= 76.99)
															<option value="FAILED">FAILED</option>
															<option value="DROP">DROP</option>
															<option value="DROP">UD</option>
															<option value="DROP">NA</option>
														@else
															<option value="PASSED">PASSED</option>
															<option value="INC">INC</option>
															<option value="NFE">NFE</option>
														@endif
														</select>
													@endif
												@endif
											</td>
											<td>
												@if (count($student->grades->where('term', 1)->where('classload_id',$load->id)) == 1 && count($student->grades->where('term', 2)->where('classload_id',$load->id)) == 1)
													@if (count($student->finalgrades->where('classload_id', $load->id)->where('grade_edit',1)) == 1)
														{!! Form::submit('Save', ['class'=>'btn btn-success btn-block', 'disabled'=>'']) !!}
													@elseif (count($student->finalgrades->where('classload_id', $load->id)->where('grade_edit',0)) == 1)
														@foreach ($student->finalgrades as $last)
															{!! Form::hidden('midterm', $midterm->grade, []) !!}
															{!! Form::hidden('mideq', $midterm->equiv, []) !!}
															{!! Form::hidden('finals', $finalterm->grade, []) !!}
															{!! Form::hidden('fineq', $finalterm->equiv, []) !!}
															{!! Form::hidden('finalgrade', $finalgrade, []) !!}
															{!! Form::hidden('fgeq', $fg, []) !!}
															{!! Form::hidden('classload_id', $load->id, []) !!}
															{!! Form::hidden('student_id', $student->id, []) !!}
															{!! Form::submit('Update', ['class'=>'btn btn-warning btn-block']) !!}
															{!! Form::close() !!}
														@endforeach
													@else
														{!! Form::hidden('midterm', $midterm->grade, []) !!}
														{!! Form::hidden('mideq', $midterm->equiv, []) !!}
														{!! Form::hidden('finals', $finalterm->grade, []) !!}
														{!! Form::hidden('fineq', $finalterm->equiv, []) !!}
														{!! Form::hidden('finalgrade', $finalgrade, []) !!}
														{!! Form::hidden('fgeq', $fg, []) !!}
														{!! Form::hidden('classload_id', $load->id, []) !!}
														{!! Form::hidden('student_id', $student->id, []) !!}
														{!! Form::submit('Save', ['class'=>'btn btn-success btn-block']) !!}
														{!! Form::close() !!}
													@endif
												@else
													{!! Form::submit('Save', ['class'=>'btn btn-success btn-block', 'disabled'=>'']) !!}
												@endif
											</td>
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
								{{$load->subject->code}}
								{{$load->subject->title}} | Irregulars
								<div class="pull-right">
									<a href="{{ route('teacher.print.sheet',$load->id) }}" class="btn btn-info">Print Gradesheet</a>
								</div>
							</h4>
							<hr class="bg-dark">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col" width="25%"> Name </th>
											<th scope="col"> Midterm </th>
											<th scope="col"> Finals</th>
											<th scope="col"> Final Grade </th>
											<th scope="col"> Remarks </th>
											<th scope="col"> Action </th>
										</tr>
									</thead>
									<tbody>
										@foreach ($load->section->Irregulars as $irregular)
											<tr>
												<td> {{$irregular->student->student_id}} - {{$irregular->student->lname}} {{$irregular->student->fname}} </td>
												<td>
													@if (count($midterms->where('classload_id',$load->id)->where('student_id',$irregular->student->id)) == 1)
														@foreach ($midterms->where('classload_id',$load->id)->where('student_id',$irregular->student->id) as $midterm)
															{{$midterm->equiv}}
														@endforeach
													@elseif (count($midterms->where('classload_id',$load->id)->where('student_id',$irregular->student->id)) == 0)
														No Grade
													@endif
												</td>
												<td>
													@if (count($finalterms->where('classload_id',$load->id)->where('student_id',$irregular->student->id)) == 1)
														@foreach ($finalterms->where('classload_id',$load->id)->where('student_id',$irregular->student->id) as $finalterm)
															{{$finalterm->equiv}}
														@endforeach
													@elseif (count($finalterms->where('classload_id',$load->id)->where('student_id',$irregular->student->id)) == 0)
														No Grade
													@endif
												</td>
												<td>
													@if (count($irregular->student->grades->where('classload_id',$load->id)) < 2)
														No Grade
													@endif
													@if (count($irregular->student->grades->where('term', 1)->where('classload_id',$load->id)) == 1 && count($irregular->student->grades->where('term', 2)->where('classload_id',$load->id)) == 1)
														@switch($finalgrade = round(($midterm->grade + $finalterm->grade)/2,2))
														    @case($finalgrade >= 0.00 and $finalgrade <= 74.99)
														        {{$fg = 5.00}}
														        @break
														    @case($finalgrade >= 75.00 and $finalgrade <= 76.99)
														        {{$fg = 3.00}}
														        @break
														    @case($finalgrade >= 77.00 and $finalgrade <= 79.99)
														        {{$fg = 2.75}}
														        @break
														    @case($finalgrade >= 80.00 and $finalgrade <= 82.99)
														        {{$fg = 2.50}}
														        @break
														    @case($finalgrade >= 83.00 and $finalgrade <= 85.99)
														        {{$fg = 2.25}}
														        @break
														    @case($finalgrade >= 86.00 and $finalgrade <= 88.99)
														        {{$fg = 2.00}}
														        @break
														    @case($finalgrade >= 89.00 and $finalgrade <= 91.99)
														        {{$fg = 1.75}}
														        @break
														    @case($finalgrade >= 92.00 and $finalgrade <= 94.99)
														        {{$fg = 1.50}}
														        @break
														    @case($finalgrade >= 95.00 and $finalgrade <= 97.99)
														        {{$fg = 1.25}}
														        @break
														    @case($finalgrade >= 98.00 and $finalgrade <= 100.00)
														        {{$fg = 1.00}}
														        @break
														@endswitch
													@endif
												</td>
												<td>
													{!! Form::open(['route'=>'teacher.grade.storegrade']) !!}
													@if (count($irregular->student->grades->where('classload_id',$load->id)) < 2)
													------
													@endif
													@if (count($irregular->student->grades->where('term', 1)->where('classload_id',$load->id)) == 1 && count($irregular->student->grades->where('term', 2)->where('classload_id',$load->id)) == 1)
														@if (count($irregular->student->finalgrades->where('classload_id', $load->id)) == 1)
															@foreach ($irregular->student->finalgrades as $last)
																{{$last->remarks}}
															@endforeach
														@else
															<select name="remarks" id="">
															@if ($finalgrade >= 0.00 and $finalgrade <= 76.99)
																<option value="FAILED">FAILED</option>
																<option value="DROP">DROP</option>
																<option value="DROP">UD</option>
																<option value="DROP">NA</option>
															@else
																<option value="PASSED">PASSED</option>
																<option value="INC">INC</option>
																<option value="NFE">NFE</option>
															@endif
															</select>
														@endif
													@endif
												</td>
												<td>
													@if (count($irregular->student->grades->where('term', 1)->where('classload_id',$load->id)) == 1 && count($irregular->student->grades->where('term', 2)->where('classload_id',$load->id)) == 1)
														@if (count($irregular->student->finalgrades->where('classload_id', $load->id)) == 1)
															{!! Form::submit('Save', ['class'=>'btn btn-success btn-block', 'disabled'=>'']) !!}
														@else
															{!! Form::hidden('midterm', $midterm->grade, []) !!}
															{!! Form::hidden('mideq', $midterm->equiv, []) !!}
															{!! Form::hidden('finals', $finalterm->grade, []) !!}
															{!! Form::hidden('fineq', $finalterm->equiv, []) !!}
															{!! Form::hidden('finalgrade', $finalgrade, []) !!}
															{!! Form::hidden('fgeq', $fg, []) !!}
															{!! Form::hidden('classload_id', $load->id, []) !!}
															{!! Form::hidden('student_id', $irregular->student->id, []) !!}
															{!! Form::submit('Save', ['class'=>'btn btn-success btn-block']) !!}
														@endif
													@else
														{!! Form::submit('Save', ['class'=>'btn btn-success btn-block', 'disabled'=>'']) !!}
													@endif
													{!! Form::close() !!}
												</td>
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