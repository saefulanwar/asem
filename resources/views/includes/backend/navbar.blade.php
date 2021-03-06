<header class="main-header">
  <!-- Logo -->
  <a href="/" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>ISPHE</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><img src="/images/logo-navbar-backend.png" width="164px"></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">


    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <?php $currentUser = Auth::user() ?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ $currentUser->gravatar() }}" class="user-image" alt="{{ $currentUser->name }}">
            <span class="hidden-xs">{{ $currentUser->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{ $currentUser->gravatar() }}" class="img-circle" alt="User Image">

              <p>
                {{ $currentUser->name }} - {{ $currentUser->roles()->first()->name }}               
              </p>
            </li>
            <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('/backend/edit-account') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">

                  
                  <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                            <i class="fa fa-sign-out fa-fw"></i> 
                            Sign Out</a>        
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                      {{ csrf_field() }}
                  </form>
                  {{-- @endif --}}

                </div>
              </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
