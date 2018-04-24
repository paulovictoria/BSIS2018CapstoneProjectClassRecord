<li class="nav-item"><a href="{{ route('registrar.dashboard') }}" class="nav-link"><i class="fa fa-home"></i> Dashboard</a></li>

<li class="nav-item dropdown">
  <a href="" class="nav-link dropdown-toggle" id="postDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-flag-o"></i> Announcement
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="postDropdown">
    <a href="{{ route('registrar.announcement.index') }}" class="dropdown-item"><i class="fa fa-file-o"></i> Manage Announcement</a>
    <a href="{{ route('registrar.announcement.create') }}" class="dropdown-item"><i class="fa fa-files-o"></i> Create Announcement</a>
  </div>
</li>

<li class="nav-item dropdown">
  <a href="" class="nav-link dropdown-toggle" id="manageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-flag-o"></i> Manage
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="manageDropdown">
    <a href="{{ route('registrar.section.index') }}" class="dropdown-item"><i class="fa fa-file-o"></i> Create Section</a>
    <a href="{{ route('registrar.semester.index') }}" class="dropdown-item"><i class="fa fa-calendar-o"></i> Manage School Term</a>
    <a href="{{ route('registrar.irregular.index') }}" class="dropdown-item"><i class="fa fa-user"></i> Manage Irregular Students</a>
    <a href="{{ route('registrar.student.index') }}" class="dropdown-item"><i class="fa fa-graduation-cap"></i> Manage Students</a>
  </div>
</li>

<li class="nav-item"><a href="{{ route('registrar.record.index') }}" class="nav-link"><i class="fa fa-file"></i> Records</a></li>

<li class="nav-item dropdown">
  <a href="#" class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ Auth::user()->fname }} {{ Auth::user()->lname }}
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
    <a href="{{ route('registrar.setting.index') }}" class="dropdown-item"><i class="fa fa-cog"></i> Settings</a>
    <a href="{{ route('registrar.logout') }}" class="dropdown-item">
      <i class="fa fa-sign-out"></i>
      Logout
    </a>
  </div>
</li>