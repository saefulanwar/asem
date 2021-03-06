<header class="main-header">
  <!-- Logo -->
  <a href="/" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>M</b>B</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Seminar</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a> -->

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <?php $currentUser = Auth::user() ?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo e($currentUser->gravatar()); ?>" class="user-image" alt="<?php echo e($currentUser->name); ?>">
            <span class="hidden-xs"><?php echo e($currentUser->name); ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo e($currentUser->gravatar()); ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo e($currentUser->name); ?> - <?php echo e($currentUser->roles()->first()->name); ?>               
              </p>
            </li>
            <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo e(url('/backend/edit-account')); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">

                  
                  <a href="<?php echo e(url('/logout')); ?>"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                            <i class="fa fa-sign-out fa-fw"></i> 
                            Sign Out</a>        
                  <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST">
                      <?php echo e(csrf_field()); ?>

                  </form>
                  

                </div>
              </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
