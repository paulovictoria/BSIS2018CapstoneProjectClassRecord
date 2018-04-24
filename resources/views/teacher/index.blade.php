@extends('layouts.app')

@section('title','| Dashboard')

@section('teacher-nav')
	@include('inc.teacher-nav')
@endsection

@section('content')
	<div class="container my-4">

		<div class="row text-right">

			@foreach ($teacher->classloads as $load)

				<div class="col-md-6 my-3">
					<div class="card bg-primary text-white">
						<div class="card-body">
							<div class="row">
								<div class="col-3 d-none d-lg-block text-left">
									<i class="fa fa-book fa-5x"></i>
								</div>
								<div class="col-md-9 pl-0">
									<h4 class="card-title mb-0">
										{{$load->subject->title}}
									</h4>
									<small>
										{{$load->department->code}} {{$load->section->year}}-{{$load->section->class}}
									</small>
								</div>
							</div>
							<hr class="bg-light">
							<a href="{{ route('teacher.grade.show',$load->id) }}" class="card-link text-white">View More <i class="fa fa-caret-right"></i></a>
						</div>
					</div>
				</div>

			@endforeach
		</div>

	</div>
@endsection