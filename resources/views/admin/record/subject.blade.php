@extends('layouts.app')

@section('title','| Class Record')

@push('styles')

@endpush

@section('admin-nav')
	@include('inc.admin-nav')
@endsection

@section('content')
	<div class="container my-4">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							{{$load->subject->title}} 
							@if ($term == 1)
								Midterm
							@else
								Finals
							@endif
						</h4>
						<hr class="bg-dark">
						<div class="responsive-table">
							<table class="table">
								<thead>
									@if (count($load->limits->where('term',$term)->where('classload_id',$load->id)) == 1)
										@foreach ($load->limits->where('term',$term)->where('classload_id',$load->id) as $limit)
											<tr>
												<th scope="col">Name</th>
												<th scope="col">Quiz/{{$limit->quiz}}</th>
												<th scope="col">Activity/{{$limit->activity}}</th>
												<th scope="col">Exam/{{$limit->exam}}</th>
												<th scope="col">Project/{{$limit->project}}</th>
												<th scope="col">Attendance/{{$limit->attendance}}</th>
												<th scope="col">Recitation/{{$limit->recitation}}</th>
												<th scope="col">Character/{{$limit->character}}</th>
											</tr>
										@endforeach
									@else
										<tr>
											<th scope="col">Name</th>
											<th scope="col">Quiz</th>
											<th scope="col">Activity</th>
											<th scope="col">Exam</th>
											<th scope="col">Project</th>
											<th scope="col">Attendance</th>
											<th scope="col">Recitation</th>
											<th scope="col">Character</th>
										</tr>
									@endif
								</thead>
								<tbody>
									@foreach ($secloads->where('semester_id',$load->semester_id)->where('section_id',$load->section_id)->sortBy('student.lname') as $sec)
										<tr>
											<td>
												{{$sec->student->lname}} {{$sec->student->fname}}
											</td>
											@if (count($sec->student->grades->where('classload_id',$load->id)->where('term',$term)) == 1)
												@foreach ($sec->student->grades->where('classload_id',$load->id)->where('term',$term) as $midterm)
													<td> {{$midterm->quiz}} </td>
													<td> {{$midterm->activity}} </td>
													<td> {{$midterm->exam}} </td>
													<td> {{$midterm->project}} </td>
													<td> {{$midterm->attendance}} </td>
													<td> {{$midterm->recitation}} </td>
													<td> {{$midterm->character}} </td>
												@endforeach
												@else
													<td> No Record</td>
													<td> No Record</td>
													<td> No Record</td>
													<td> No Record</td>
													<td> No Record</td>
													<td> No Record</td>
													<td> No Record</td>
											@endif
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<hr class="bg-dark mt-0">
						<div class="pull-right">
							<a href="{{ route('admin.record.show',$load->id) }}" class="btn btn-danger">Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection