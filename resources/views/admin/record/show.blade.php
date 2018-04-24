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
							Classload List
						</h4>
						<hr class="bg-dark">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Department</th>
										<th scope="col">Subject</th>
										<th scope="col">Section</th>
										<th scope="col">Students</th>
										<th scope="col">Teacher</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($loads->orderBy('department_id')->paginate(10) as $load)
										<tr>
											<td>{{$load->department->name}}</td>
											<td>{{$load->subject->code}}</td>
											<td>{{$load->section->year}}-{{$load->section->class}}</td>
											<td>{{count($secloads->where('semester_id',$load->semester_id)->where('section_id',$load->section_id))}}</td>
											<td>{{$load->teacher->lname}} {{$load->teacher->fname}}</td>
											<td>
												<div class="row mx-0">
													<div class="col mx-0">
														<a href="{{ route('admin.record.subject',[1,$load->id]) }}" class="btn btn-success btn-block">Midterm</a>
													</div>
													<div class="col mx-0">
														<a href="{{ route('admin.record.subject',[2,$load->id]) }}" class="btn btn-success btn-block">Finals</a>
													</div>
												</div>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<hr class="bg-dark mt-0">
						<div class="pull-right">
							<a href="{{ route('admin.record.index') }}" class="btn btn-danger"> Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection