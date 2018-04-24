<li class="nav-item"><a href="{{ route('guardian.dashboard') }}" class="nav-link"><i class="fa fa-home"></i> Dashboard</a></li>

{{-- <li class="nav-item dropdown">
  <a href="" class="nav-link dropdown-toggle" id="manageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-files-o"></i> Manage
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="manageDropdown">
    <a href="#" class="dropdown-item"><i class="fa fa-book"></i> Manage Subjects</a>
    <a href="#" class="dropdown-item"><i class="fa fa-graduation-cap"></i> Manage Courses</a>
    <a href="#" class="dropdown-item"><i class="fa fa-users"></i> Manage Users</a>
  </div>
</li> --}}

{{-- <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-file"></i> Records</a></li> --}}

<li class="nav-item dropdown">
  <a href="#" class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ Auth::user()->name }}
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
    <a href="{{ route('guardian.setting.index') }}" class="dropdown-item"><i class="fa fa-cog"></i> Settings</a>
    <a href="{{ route('guardian.logout') }}" class="dropdown-item">
      <i class="fa fa-sign-out"></i>
      Logout
    </a>
  </div>
</li>