@extends('layouts.app')

@section('title','| Edit Grade')

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
							{{$grade->classload->subject->code}} 
							@if ($grade->term == 1)
								Midterm
							@else
								Finals
							@endif
							| 
							{{$grade->student->lname}} 
							{{$grade->student->fname}}
						</h4>
						<hr class="bg-dark">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col"> Quiz </th>
										<th scope="col"> Activity </th>
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
										{!! Form::open(['route'=>['teacher.grade.update',$grade->id], 'method'=>'POST']) !!}
										<td> <input type="number" name="quiz" style="width: 80px;" min="0" value="{{$grade->quiz}}"> </td>
										<td> <input type="number" name="activity" style="width: 80px;" min="0" value="{{$grade->activity}}"> </td>
										<td> <input type="number" name="exam" style="width: 80px;" min="0" value="{{$grade->exam}}"> </td>
										<td> <input type="number" name="project" style="width: 80px;" min="0" value="{{$grade->project}}"> </td>
										<td> <input type="number" name="attendance" style="width: 80px;" min="0" value="{{$grade->attendance}}"> </td>
										<td> <input type="number" name="recitation" style="width: 80px;" min="0" value="{{$grade->recitation}}"> </td>
										<td> <input type="number" name="character" style="width: 80px;" min="0" value="{{$grade->character}}"> </td>
										<td>
											{!! Form::hidden('_method', 'PUT', []) !!}
											{!! Form::submit('Set Grade', ['class'=>'btn btn-outline-success']) !!}
											{!! Form::close() !!}
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<hr class="bg-dark mt-0">
						<div class="pull-right">
							<a href="{{ route('teacher.grade.term',[$grade->classload_id, $grade->term]) }}" class="btn btn-outline-danger">Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection