@extends('layouts.app')

@section('title','| Class Record')

@push('styles')

@endpush

@section('registrar-nav')
	@include('inc.registrar-nav')
@endsection

@section('content')
	<div class="container my-4">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							{{$load->subject->title}}
							<div class="pull-right">
							</div>
						</h4>
						<hr class="bg-dark">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Name</th>
										<th scope="col">Midterm</th>
										<th scope="col">Finals</th>
										<th scope="col">FinalGrade</th>
										<th scope="col">Equivalent</th>
										<th scope="col">Remarks</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									@foreach ($secloads->where('semester_id',$load->semester_id)->where('section_id',$load->section_id)->sortBy('student.lname') as $sec)
										<tr>
											<td>
												{{$sec->student->lname}} {{$sec->student->fname}}
											</td>
											@if (count($sec->student->finalgrades->where('classload_id',$load->id)) == 1)
												@foreach ($sec->student->finalgrades->where('classload_id',$load->id) as $grade)
													<td> {{$grade->midterm}} </td>
													<td> {{$grade->final}} </td>
													<td> {{$grade->finalgrade}} </td>
													<td> {{$grade->equiv}} </td>
													<td> {{$grade->remarks}} </td>
													<td> <a href="{{ route('registrar.record.grade',[$load->id, $sec->student->id]) }}" class="btn btn-primary">Allow Edit</a></td>
												@endforeach
												@else
													<td> No Record</td>
													<td> No Record</td>
													<td> No Record</td>
													<td> No Record</td>
													<td> No Remarks</td>
											@endif
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<hr class="bg-dark mt-0">
						<div class="pull-right">
							<a href="{{ route('registrar.record.show',$load->id) }}" class="btn btn-danger">Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection