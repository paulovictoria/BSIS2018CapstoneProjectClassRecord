@extends('layouts.app')

@section('title','| Department')

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
							<div class="pull-right">
								<a href="{{ route('admin.department.create') }}" class="btn btn-success"> Create </a>
							</div>
						</h4>
						<hr class="bg-dark">
						<div class="table-responsive">
							<table class="table" id="departmentsTable">
							  <thead>
							    <tr>
							      <th scope="col">Code</th>
							      <th scope="col">Name</th>
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
			$('#departmentsTable').DataTable({
				proccessing: true,
				serverSide: true,
				ajax: '{{ route('admin.department.getData') }}',
				columns: 
				[
					{data: 'code'},
					{data: 'name'},
					{data: 'action', orderable:false, searchable: false}
				]
			});
		});
	</script>
@endpush