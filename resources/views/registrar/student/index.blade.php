@extends('layouts.app')

@section('title','| Add Student')

@section('registrar-nav')
	@include('inc.registrar-nav')
@endsection

@section('content')
	<div class="container my-4">
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							Manage Students
							<div class="pull-right">
								<a href="{{ route('registrar.student.create') }}" class="btn btn-success"> Add Student</a>
							</div>
						</h4>
						<hr class="bg-dark">
						<div class="table-responsive">
							<table class="table" id="studentsTable">
								<thead>
									<tr>
										<th>ID</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Email</th>
										<th>Action</th>
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
			$('#studentsTable').DataTable({
				proccessing: true,
				serverSide: true,
				ajax: '{{ route('registrar.student.getdata') }}',
				columns: 
				[
					{data: 'student_id'},
					{data: 'fname'},
					{data: 'lname'},
					{data: 'email'},
					{data: 'action', orderable:false, searchable: false}
				]
			});
		});
	</script>
@endpush