<li class="nav-item"><a href="{{ route('teacher.dashboard') }}" class="nav-link"><i class="fa fa-home"></i> Dashboard</a></li>

<li class="nav-item dropdown">
  <a href="" class="nav-link dropdown-toggle" id="manageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-files-o"></i> Manage
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="manageDropdown">
    <a href="{{ route('teacher.matrix.index') }}" class="dropdown-item"><i class="fa fa-calculator"></i> Grade</a>
  </div>
</li>

<li class="nav-item dropdown">
  <a href="#" class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ Auth::user()->fname }} {{ Auth::user()->lname }}
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
    <a href="{{ route('teacher.setting.index') }}" class="dropdown-item"><i class="fa fa-cog"></i> Settings</a>
    <a href="{{ route('teacher.logout') }}" class="dropdown-item">
      <i class="fa fa-sign-out"></i>
      Logout
    </a>
  </div>
</li>