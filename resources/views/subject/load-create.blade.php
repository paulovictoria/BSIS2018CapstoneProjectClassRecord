@extends('layouts.app')

@section('title','| Load Subject')

@push('styles')

@endpush

@section('admin-nav')
	@include('inc.admin-nav')
@endsection

@section('content')
	<div class="container my-4">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Department List
							<a href="{{ route('registrar.section.load',[$department->id]) }}" class="btn btn-outline-secondary"> Create </a>
						</h4>
						<hr class="bg-dark">
						<div class="table-responsive">
							<table class="table" id="subjectsTable">
							  <thead>
							    <tr>
							      <th scope="col">Code</th>
							      <th scope="col">Department</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>
							  	@foreach ($departments as $department)
							  		<tr>
							  			<td>{{$department->code}}</td>
							  			<td>{{$department->name}}</td>
							  			<td><a href="{{ route('registrar.loadsub.load',[$department->id]) }}" class="btn btn-outline-success btn-block"> Show</a></td>
							  		</tr>
							  	@endforeach
							  </tbody>
						  </table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
{{-- 	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#subjectsTable').DataTable({
				proccessing: true,
				serverSide: true,
				ajax: '{{ route('admin.subject.getData') }}',
				columns: 
				[
					{data: 'code'},
					{data: 'title'},
					{data: 'unit'},
					{data: 'action', orderable:false, searchable: false}
				]
			});
		});
	</script> --}}
@endpush