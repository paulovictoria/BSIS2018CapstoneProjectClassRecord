<li class="nav-item"><a href="{{ route('student.dashboard') }}" class="nav-link"><i class="fa fa-home"></i> Dashboard</a></li>

<li class="nav-item dropdown">
  <a href="#" class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ Auth::user()->fname }} {{ Auth::user()->lname }}
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
    <a href="{{ route('student.setting.index') }}" class="dropdown-item"><i class="fa fa-cog"></i> Settings</a>
    <a href="{{ route('student.logout') }}" class="dropdown-item">
      <i class="fa fa-sign-out"></i>
      Logout
    </a>
  </div>
</li>