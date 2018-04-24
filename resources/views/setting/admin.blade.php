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
            {!! Form::open(['route'=>['admin.setting.update',Auth::id()], 'method'=>'POST']) !!}
            <div class="form-row mb-3">
              <div class="col">
                {!! Form::text('fname', $admin->fname, ['class'=>'form-control']) !!}
              </div>
              <div class="col">
                {!! Form::text('mname', $admin->mname, ['class'=>'form-control']) !!}
              </div>
              <div class="col">
                {!! Form::text('lname', $admin->lname, ['class'=>'form-control']) !!}
              </div>
            </div>
            <div class="form-group">
              {!! Form::text('username', $admin->username, ['class'=>'form-control', 'placeholder'=>'Username']) !!}
            </div>
            <div class="form-group">
              {!! Form::email('email', $admin->email, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
            </div>
            <div class="form-group">
              {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'New Password']) !!}
            </div>
            <div class="form-group">
              {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confiim Password']) !!}
            </div>
            <hr class="bg-dark mt-0">
            <div class="pull-right">
              {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
              <a href="{{ route('admin.setting.index') }}" class="btn btn-danger">Back</a>
            </div>
            {!! Form::hidden('_method', 'PUT') !!}
            {!! Form::close() !!}
    			</div>
				</div>
			</div>

		</div>
    
  </div>

@endsection

@push('scripts')
	{{-- expr --}}
@endpush