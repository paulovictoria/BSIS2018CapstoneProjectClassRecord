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
						<h4 class="card-text">Teacher List
							<div class="pull-right">
								<a href="{{ route('admin.load.create') }}" class="btn btn-success"> Load Subject </a>
								<a href="{{ route('admin.teacher.create') }}" class="btn btn-success">Add Teacher</a>
							</div>
						</h4>
						<hr class="bg-dark">
						
						<div class="table-responsive">
							<table class="table" id="departmentsTable">
							  <thead>
							    <tr>
							      <th scope="col">First Name</th>
							      <th scope="col">Last Name</th>
							      <th scope="col">Email</th>
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
				ajax: '{{ route('admin.load.getclassload') }}',
				columns: 
				[
					{data: 'fname'},
					{data: 'lname'},
					{data: 'email'},
					{data: 'action', orderable:false, searchable: false}
				]
			});
		});
	</script>
@endpush