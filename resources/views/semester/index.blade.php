@extends('layouts.app')

@section('title','| School Term')

@section('registrar-nav')
	@include('inc.registrar-nav')
@endsection

@section('content')
	<div class="container my-4">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							School Term
							<div class="pull-right">
								<a href="{{ route('registrar.semester.create') }}" class="btn btn-success">Create</a>
							</div>
							<hr class="bg-dark">
						</h4>
						<div class="table-responsive">
							<table class="table" id="semestersTable">
							  <thead>
							    <tr>
							      <th scope="col">School Term</th>
							      <th scope="col">Start Date</th>
							      <th scope="col">End Date</th>
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
			$('#semestersTable').DataTable({
				proccessing: true,
				serverSide: true,
				ajax: '{{ route('registrar.semester.getData') }}',
				columns: 
				[
					{data: 'term'},
					{data: 'start_date'},
					{data: 'end_date'},
					{data: 'action', orderable:false, searchable: false}
				]
			});
		});
	</script>
@endpush