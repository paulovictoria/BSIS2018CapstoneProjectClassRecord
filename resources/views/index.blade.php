@extends('layouts.app')

@push('styles')
  <style>
    .header{
        background-image: url('{{ asset('img/img1.jpg') }}');
        background-size: cover;
        background-attachment: fixed; 
        min-height: 20vh;
    }
    .view{
        background-image: url('{{ asset('img/img2.jpg') }}');
        background-size: cover;
        background-attachment: fixed; 
        min-height: 20vh;
        overflow: hidden;
    }
    .overlay{
        background-color: rgba(0,0,0,0.7);
        min-height: 20vh;

    }
  </style>
@endpush

@section('title', '| Welcome')

@section('content')
  {{-- Header --}}
  <header class="header">
      <div class="overlay p-md-5 py-5">
          <div class="container">
              <div class="row d-flex align-items-center">
                  <div class="col-lg-8 d-none d-lg-block text-white">
                      <h3 class="display-3"><strong>Welcome</strong></h3>
                      <hr class="bg-light">
                      {{-- <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, consequuntur.</small> --}}
                  </div>
                  <div class="col-lg-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="card-title text-center">
                                  <img src="{{ asset('img/logo.png') }}" alt="" width="100px" height="100px" class="align-middle"> 
                                  <h3>Bulacan Polytechnic College</h3>
                                  <p>Grading System</p>
                              </div>
                              {!! Form::open(['route'=>'student.login.submit']) !!}
                                <div class="form-group">
                                  {!! Form::text('student_id', '', ['class'=>'form-control', 'placeholder'=>'Student ID', 'data-mask'=>'00-0000']) !!}
                                </div>
                                <div class="form-group">
                                  {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
                                </div>
                                <hr>
                                {!! Form::submit('Login', ['class'=>'btn btn-block btn-outline-primary']) !!}
                              {!! Form::close() !!}
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>

  {{-- Features --}}
  <section class="py-5 bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-white text-center mb-2">
          <h1>Features</h1>
          <hr class="bg-light">
        </div>
      </div>
      <div class="row text-white">

        <div class="col-md-4">
          <div class="border border-light my-2">
            <div class="card-title text-center pt-3">
              <i class="fa fa-check fa-5x"></i>
              <h3>Accurate</h3>
            </div>
            <div class="card-body pt-0">
              <hr class="bg-light">
              <p class="card-text">Data shown on the system is base from student's performance.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="border border-light my-2">
            <div class="card-title text-center pt-3">
              <i class="fa fa-users fa-5x"></i>
              <h3>User-Friendly</h3>
            </div>
            <div class="card-body pt-0">
              <hr class="bg-light">
              <p class="card-text">The system itself provide an ergonomic features for its end users to provide them the ease of use.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="border border-light my-2">
            <div class="card-title text-center pt-3">
              <i class="fa fa-shield fa-5x"></i>
              <h3>Secure</h3>
            </div>
            <div class="card-body pt-0">
              <hr class="bg-light">
              <p class="card-text">The system and database is protected using username and password.</p>
            </div>
          </div>
        </div>

      </div>
      <hr class="bg-light">
    </div>              
  </section>
  
  {{-- Posts --}}
  <section class="view">
    <div class="p-lg-5 py-5 overlay">
      <div class="container">

        <div class="row">
          <div class="col-md-12 text-white pt-2">
            <h2>Recent Announcements</h2>
            <hr class="bg-light">
          </div>
        </div>
        <div class="row">

          @foreach ($announcements as $post)

          <div class="col-md-4">
            <div class="card my-2">
              <img src="{{ route('announcement.image',['filename'=>$post->image]) }}" alt="" height="200px" class="card-img-top">
              <div class="card-body">
                <h6 class="card-title">{{$post->title}}</h6>
                <small>Posted: {{ date_format($post->created_at, "M j, Y")}}</small>
                <p class="card-text mt-0">
                  <small>{!!substr($post->body, 0, 300)!!}{!! strlen($post->body) > 300 ? "..." : "" !!}
                    <a href="{{ route('announcement.show',['id' => $post->id]) }}">Read More</a>
                  </small>
                </p>
              </div>
            </div>
          </div>

          @endforeach

        </div>

      </div>   
    </div>
  </section>

  {{-- Us --}}
  <section class="p-lg-5 py-5 bg-warning" id="about">
    <div class="container">
      <div class="row pt-2">
        <div class="col-md-12 text-black text-center">
          <h2>About Us</h2>
          <hr class="bg-dark">
        </div>
      </div>
      <div class="row py-0">

        <div class="col-md-3">
          <div class="card card-profile text-center">
            <img src="{{ asset('img/img1.jpg') }}" alt="" class="card-img-top">
            <div class="card-block">
              <img src="{{ asset('img/Julius.jpg') }}" width="150" height="150" alt="" class="card-img-profile">
              <h4 class="card-title">
                Julius Fidelis Hubilla
                <small>
                  System Analyst
                </small>
              </h4>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card card-profile text-center">
            <img src="{{ asset('img/img3.jpg') }}" alt="" class="card-img-top">
            <div class="card-block">
              <img src="{{ asset('img/Kimy.jpg') }}" width="150" height="150" alt="" class="card-img-profile">
              <h4 class="card-title">
                Kimy James Sanchez
                <small>
                  Front-End/Researcher
                </small>
              </h4>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card card-profile text-center">
            <img src="{{ asset('img/img6.jpg') }}" alt="" class="card-img-top">
            <div class="card-block">
              <img src="{{ asset('img/Lizeth.jpg') }}" width="150" height="150" alt="" class="card-img-profile">
              <h4 class="card-title">
                Lizeth Lopez
                <small>
                  Researcher/Documentation
                </small>
              </h4>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card card-profile text-center">
            <img src="{{ asset('img/img7.jpg') }}" alt="" class="card-img-top">
            <div class="card-block">
              <img src="{{ asset('img/Linda.jpg') }}" width="150" height="150" alt="" class="card-img-profile">
              <h4 class="card-title">
                Linda Salamanca
                <small>
                  Documentation
                </small>
              </h4>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection

@push('scripts')
  <script type="text/javascript">
    $(document).ready(function(){ 
       $('#student_id').mask('00-0000');
    });
  </script>
@endpush