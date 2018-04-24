@extends('layouts.app')

@section('title','| Load Teacher')

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
						<h4 class="card-title">Teacher Load
							{{-- <a href="{{ route('admin.loadsub.create') }}" class="btn btn-outline-secondary"> Create </a> --}}
						</h4>
						<hr class="bg-dark">
						<div class="table-responsive">
							<table class="table" id="teachersTable">
							  <thead>
							    <tr>
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
			$('#teachersTable').DataTable({
				proccessing: true,
				serverSide: true,
				ajax: '{{ route('admin.loadsub.getTeacherData') }}',
				columns: 
				[
					{data: 'name'},
					{data: 'action', orderable:false, searchable: false}
				]
			});
		});
	</script>
@endpush