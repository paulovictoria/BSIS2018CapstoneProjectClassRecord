@extends('layouts.app')

@section('title','| Section')

@push('styles')

@endpush

@section('registrar-nav')
	@include('inc.registrar-nav')
@endsection

@section('content')
	<div class="container my-4">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">{{$department->name}}
							<div class="pull-right">
								<a href="{{ route('registrar.section.create.section',[$department->id]) }}" class="btn btn-success"> Create </a>
							</div>
						</h4>
						<hr class="bg-dark">
						<div class="table-responsive">
							<table class="table" id="sectionsTable">
							  <thead>
							    <tr>
							      {{-- <th scope="col">Course</th> --}}
							      <th scope="col">Year</th>
							      <th scope="col">Section</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
						  </table>
						</div>
						

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script type="text/javascript">
		$(document).ready(function()
			{
				$('#sectionsTable').DataTable({
					proccessing: true,
					serverSide: true,
					ajax: '{{ route('registrar.section.getSection',[$department->id]) }}',
					columns: 
					[
						{data: 'year'},
						{data: 'class'},
						{data: 'action', orderable:false, searchable: false}
					]
				});
			});
	</script>
@endpush