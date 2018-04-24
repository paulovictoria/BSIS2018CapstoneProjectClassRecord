@extends('layouts.app')

@section('title','| Dashboard')

@section('guardian-nav')
	@include('inc.guardian-nav')
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
                {{$guardian->name}}
                <small>
                  Email: {{$guardian->email}}
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
            {!! Form::open(['route'=>['guardian.setting.update',Auth::id()], 'method'=>'POST']) !!}
            <div class="form-group">
              {!! Form::text('name', $guardian->name, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
            </div>
            <div class="form-group">
              {!! Form::email('email', $guardian->email, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
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
              <a href="{{ route('guardian.dashboard') }}" class="btn btn-primary">Back</a>
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