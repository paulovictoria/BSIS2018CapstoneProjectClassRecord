@extends('layouts.app')

@section('title','| Announcement')

@section('content')
<div class="container my-4">
	<div class="row">
		<div class="col-md-12">
			<div class="card mb-3">
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<img src="{{ route('announcement.image',['filename'=>$announcement->image]) }}" alt="image" class="card-img-top">
						</div>
						<div class="col-md-8">
							<h4 class="card-title">{{$announcement->title}}</h4>
							<p class="mb-0"><small class="text-muted">Posted: {{ date_format( $announcement->created_at, "M j, Y g:i a" ) }}</small></p>
							@if ($announcement->created_at != $announcement->updated_at)
								<p><small class="text-muted">Updated: {{ date_format( $announcement->updated_at, "M j, Y g:i a" ) }}</small></p>
							@endif
							<p class="card-text">{!! $announcement->body !!}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection