<li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fa fa-home"></i> Dashboard</a></li>

<li class="nav-item dropdown">
  <a href="" class="nav-link dropdown-toggle" id="postDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-flag-o"></i> Announcement
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="postDropdown">
    <a href="{{ route('admin.announcement.index') }}" class="dropdown-item"><i class="fa fa-file-o"></i> Manage Announcement</a>
    <a href="{{ route('admin.announcement.create') }}" class="dropdown-item"><i class="fa fa-files-o"></i> Create Announcement</a>
  </div>
</li>

<li class="nav-item dropdown">
  <a href="" class="nav-link dropdown-toggle" id="manageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-book"></i> Manage
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="manageDropdown">
    <a href="{{ route('admin.subject.index') }}" class="dropdown-item"><i class="fa fa-files-o"></i> Manage Subject</a>
    <a href="{{ route('admin.department.index') }}" class="dropdown-item"><i class="fa fa-university"></i> Manage Department</a>
    <a href="{{ route('admin.load.index') }}" class="dropdown-item"><i class="fa fa-users"></i> Manage Teacher</a>
  </div>
</li>

<li class="nav-item"><a href="{{ route('admin.record.index') }}" class="nav-link"><i class="fa fa-file"></i> Records</a></li>

<li class="nav-item dropdown">
  <a href="#" class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ Auth::user()->fname }} {{ Auth::user()->lname }}
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
    <a href="{{ route('admin.setting.index') }}" class="dropdown-item"><i class="fa fa-cog"></i> Settings</a>
    <a href="{{ route('admin.logout') }}" class="dropdown-item">
      <i class="fa fa-sign-out"></i>
      Logout
    </a>
  </div>
</li>