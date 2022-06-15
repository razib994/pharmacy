<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">




        <li class="nav-item dropdown">

        <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="fas fa-th-large"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i>
            @if(Auth::check())
            {{ Auth::user()->name }}
            @endif
          </a>

          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fas fa-key mr-2"></i>{{ __('Logout') }}
          </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i>Profile
          </a>

        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
