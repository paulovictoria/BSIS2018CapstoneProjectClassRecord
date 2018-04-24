@extends('layouts.app')

@section('title','| Announcement')

@section('content')
<div class="container my-5">
	<div class="row">
		<div class="col-md-12 mb-2">
			<h2>Announcement</h2>
			<hr class="bg-dark">
		</div>
	</div>
	<div class="row">

		<div class="col-md-12">
			@if ( count($announcements) == 0)
				<div class="card mb-3">
					<div class="card-body">
						<h4 class="card-text text-center">
							No announcement has been created ...
						</h4>
					</div>
				</div>
			@else
			@foreach ($announcements as $post)
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<img src="{{ route('announcement.image',['filename'=>$post->image]) }}" alt="image" class="card-img-top">
							</div>
							<div class="col-md-8">
								<h4 class="card-title">{{$post->title}}</h4>
								<p class="mb-0"><small class="text-muted">Posted: {{ date_format( $post->created_at, "M j, Y g:i a" ) }}</small></p>
								@if ($post->created_at != $post->updated_at)
									<p><small class="text-muted">Updated: {{ date_format( $post->updated_at, "M j, Y g:i a" ) }}</small></p>
								@endif
								<p class="card-text">
									{!!substr($post->body, 0, 400)!!}{!! strlen($post->body) > 400 ? "..." : "" !!}
									<a href="{{ route('announcement.show',['id' => $post->id]) }}">Read More</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			@endforeach
			@endif

			{{$announcements->links()}}
		</div>

	</div>
</div>
@endsection