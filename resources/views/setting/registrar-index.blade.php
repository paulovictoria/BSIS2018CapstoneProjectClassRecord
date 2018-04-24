@extends('layouts.app')

@section('title','| Dashboard')

@section('registrar-nav')
	@include('inc.registrar-nav')
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
                {{$registrar->lname}} {{$registrar->fname}}
                <small>
                  Username: {{$registrar->username}}
                </small>
                <small>
                  Email: {{$registrar->email}}
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
            <p class="card-text">Username: {{$registrar->username}}</p>
            <p class="card-text">Name: {{$registrar->lname}} {{$registrar->fname}}</p>
            <p class="card-text">Email: {{$registrar->email}}</p>
            <hr class="bg-dark mt-0">
            <div class="pull-right">
              <a href="{{ route('registrar.setting.edit',Auth::id()) }}" class="btn btn-primary">Edit</a>
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