@extends('layouts.app')

@section('title','| Announcement')

@push('styles')

@endpush

@section('registrar-nav')
	@include('inc.registrar-nav')
@endsection

@section('content')
<div class="container my-4">
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Create Announcement</h4>
					<hr>
					{!! Form::open(['route'=> ['registrar.announcement.update',$announcement->id],'method'=> 'POST', 'enctype'=> 'multipart/form-data']) !!}
						<div class="form-group">
							{!! Form::text('title', $announcement->title, ['class'=> 'form-control', 'placeholder'=> 'Title']) !!}
						</div>
						<div class="form-group">
							{!! Form::textarea('body', $announcement->body) !!}
						</div>
						<div class="form-group">
							{!! Form::file('image', ['class'=> 'form-control', 'onchange'=> 'readURL(this)']) !!}
						</div>
						{!! Form::hidden('preview', $announcement->image, []) !!}
						{!! Form::hidden('_method', 'PUT') !!}
						{!! Form::submit('Update', ['class'=> 'btn btn-outline-success']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Announcement</h4>
					<hr>
					<h6>Preview:</h6>
					<img id="preview" src="/storage/image/{{$announcement->image}}" width="100%" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('textarea').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>

    <script>
			function readURL(input) {
			      if (input.files && input.files[0]) {
			          var reader = new FileReader();

			          reader.onload = function (e) {
			              $('#preview')
			                  .attr('src', e.target.result);
			          };
			          reader.readAsDataURL(input.files[0]);
			      }
			  }
    </script>
@endpush