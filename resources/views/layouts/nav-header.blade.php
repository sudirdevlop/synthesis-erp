<style>
  @keyframes pulse {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.2);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    100% {
      transform: scale(1);
    }
  }

  #project-name {
    display: inline-block;
    animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    background-color: #1a237e;
    color: #fff;
  }
  </style>
 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link pushmenu-btn" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route("dashboard") }}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      {{-- user --}}
      @if(!empty(session("project_name")))
        <li class="nav-item dropdown">
          <span class="btn btn-outline-warning" id="project-name">{{ session("project_name") }}</span>
        </li>
      @endif

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <div class="image">
            <img src="{{ asset('')}}assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" width="20px"> {{ session("employee_name") }}
            <i class="right fas fa-angle-down"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">User Menu</span>
          
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Profle
            {{-- <span class="float-right text-muted text-sm">Now</span> --}}
          </a>
          <div class="dropdown-divider"></div>
            @if(Auth::user()->is_monitoring == true)
              <a href="{{ route('logout_monitoring') }}" class="dropdown-item"> 
                <i class="fas fa-sign-out-alt mr-2"></i> Log Out
              </a>
            @else
              <a href="{{ route('logout') }}" class="dropdown-item"> 
                <i class="fas fa-sign-out-alt mr-2"></i> Log Out
              </a>
            @endif
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->