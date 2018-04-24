{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark border-bottom border-primary py-lg-2">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-icon d-inline-block align-top">
        {{ config('app.name') }}
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-target" aria-controls="nav-target" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="nav-target">
      <ul class="navbar-nav">
        @if (Auth::guest())
          <li class="nav-item"><a href="{{ route('announcements') }}" class="nav-link">Announcement</a></li>
          <li class="nav-item"><a href="{{ route('home') }}/#about" class="nav-link">About</a></li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" id="loginDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Login
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
              <a href="{{ route('teacher.dashboard') }}" class="dropdown-item">Instructor</a>
              <a href="{{ route('student.dashboard') }}" class="dropdown-item">Student</a>
              <a href="{{ route('guardian.dashboard') }}" class="dropdown-item">Guardian</a>
            </div>
          </li>
        @else
          @yield('admin-nav')
          @yield('registrar-nav')
          @yield('teacher-nav')
          @yield('student-nav')
          @yield('guardian-nav')
        @endif
      </ul>
    </div>
  </div>
</nav>
{{-- End Navbar --}}