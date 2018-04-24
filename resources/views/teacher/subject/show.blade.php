@extends('layouts.app')

@section('title','| Set Percentage')

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
							Set Percentage
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
										@if (!empty($load->matrix))
											<td> {{$load->matrix->quiz}}% </td>
											<td> {{$load->matrix->activity}}% </td>
											<td> {{$load->matrix->exam}}% </td>
											<td> {{$load->matrix->project}}% </td>
											<td> {{$load->matrix->attendance}}% </td>
											<td> {{$load->matrix->recitation}}% </td>
											<td> {{$load->matrix->character}}% </td>
											<td>
												<a href="{{ route('teacher.matrix.edit',$load->id) }}" class="btn btn-outline-info">Edit</a>
											</td>
										@elseif(isset($matrix))
											{!! Form::open(['route'=>['teacher.matrix.update', $matrix->id], 'method'=>'POST']) !!}
											<td> <input type="number" name="quiz" style="width: 80px;" min="0" value="{{$matrix->quiz}}"> % </td>
											<td> <input type="number" name="activity" style="width: 80px;" min="0" value="{{$matrix->activity}}"> % </td>
											<td> <input type="number" name="exam" style="width: 80px;" min="0" value="{{$matrix->exam}}"> % </td>
											<td> <input type="number" name="project" style="width: 80px;" min="0" value="{{$matrix->project}}"> % </td>
											<td> <input type="number" name="attendance" style="width: 80px;" min="0" value="{{$matrix->attendance}}"> % </td>
											<td> <input type="number" name="recitation" style="width: 80px;" min="0" value="{{$matrix->recitation}}"> % </td>
											<td> <input type="number" name="character" style="width: 80px;" min="0" value="{{$matrix->character}}"> % </td>
											<td>
												{!! Form::hidden('classload_id', $matrix->classload_id, []) !!}
												{!! Form::hidden('_method', 'PUT', []) !!}
												{!! Form::submit('Edit Percentage', ['class'=>'btn btn-outline-success']) !!}
												{!! Form::close() !!}
											</td>
										@else
											{!! Form::open(['route'=>'teacher.matrix.store']) !!}
											<td> <input type="number" name="quiz" style="width: 80px;" min="0"> % </td>
											<td> <input type="number" name="activity" style="width: 80px;" min="0"> % </td>
											<td> <input type="number" name="exam" style="width: 80px;" min="0"> % </td>
											<td> <input type="number" name="project" style="width: 80px;" min="0"> % </td>
											<td> <input type="number" name="attendance" style="width: 80px;" min="0"> % </td>
											<td> <input type="number" name="recitation" style="width: 80px;" min="0"> % </td>
											<td> <input type="number" name="character" style="width: 80px;" min="0"> % </td>
											<td>
												{!! Form::hidden('classload_id', $load->id, []) !!}
												{!! Form::submit('Set Percentage', ['class'=>'btn btn-outline-success']) !!}
												{!! Form::close() !!}
											</td>
										@endif
									</tr>
								</tbody>
							</table>
						</div>
						<hr class="bg-dark mt-0">
						<div class="pull-right">
							<a href="{{ route('teacher.matrix.index') }}" class="btn btn-outline-danger"> Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection