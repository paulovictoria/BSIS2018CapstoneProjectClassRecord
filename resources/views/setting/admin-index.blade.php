@extends('layouts.app')

@section('title','| Dashboard')

@section('admin-nav')
	@include('inc.admin-nav')
@endsection

@push('styles')
	{{-- expr --}}
@endpush

@section('content')
	<div class="container my-4">

		<div class="row">

			<div class="col-md-4">
				 <div class="card card-profile text-center my-0">
				 		<div class="card-block">
          	  <img src="{{ asset('img/admin.jpg') }}" alt="" class="card-img-top">
         		</div>	
            <div class="card-block">
              <img src="{{ asset('img/unknown.jpg') }}" width="150" height="150" alt="" class="card-img-profile">
              <h4 class="card-title">
                {{$admin->lname}} {{$admin->fname}}
                <small>
                  Username: {{$admin->username}}
                </small>
                <small>
                  Email: {{$admin->email}}
                </small>
              </h4>
            </div>
          </div>
			</div>

			<div class="col-md-8">
				<div class="card bg-light">
					<div class="card-body">
            <h4 class="card-title">Account Setting</h4>
            <hr class="bg-dark">
            <p class="card-text">Username: {{$admin->username}}</p>
            <p class="card-text">Name: {{$admin->lname}} {{$admin->fname}}</p>
            <p class="card-text">Email: {{$admin->email}}</p>
            <hr class="bg-dark mt-0">
            <div class="pull-right">
              <a href="{{ route('admin.setting.edit',Auth::id()) }}" class="btn btn-primary">Edit</a>
            </div>
    			</div>
				</div>
			</div>

		</div>
    
  </div>

@endsection

@push('scripts')
	{{-- expr --}}
@endpush