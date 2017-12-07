  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php $currentUser = Auth::user() ?>
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ $currentUser->gravatar() }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ $currentUser->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <?php $currentUser = Auth::user() ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
       <li>
          <a href="/backend/home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        @role('admin')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>Site Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Deadline Setting</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Price List</a></li>
            @if (check_user_permissions(request(), "Users@index"))
            <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
            @endif            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tag"></i>
            <span>Tickets Payment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Payment Pending</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Payment Approved</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Papers List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Abstract Pending</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Abstract Approved</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Papers Pending</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Papers Approved</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Revised Papers</a></li>            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Participant Lists</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> All Participant</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Paid Participant</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Unpaid Participant</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Change Participant</a></li>
          </ul>
        </li>
        <li>
          <a href="#">

            <i class="fa fa-user"></i> <span>Reviewer</span>

            <span class="pull-right-container">
            </span>
          </a>
        </li>
       <li>
          <a href="#">
            <i class="fa fa-send"></i> <span>Send LoA</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
       <li>
          <a href="pages/calendar.html">
            <i class="fa fa-check-square"></i> <span>Attendance</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-external-link-square"></i> <span>Manage Proceeding</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil-square"></i> <span>Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('blog.index') }}"><i class="fa fa-circle-o"></i> All Posts</a></li>
            @if (check_user_permissions(request(), "Categories@index"))
            <li><a href="{{ route('categories.index') }}"><i class="fa fa-folder"></i> <span>Categories</span></a></li>
            @endif
          </ul>
        </li>
        @endrole
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>