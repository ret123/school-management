<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
          <div class="ulogo">
            <a href="index.html">
              <!-- logo for regular state and mobile devices -->
              <div class="d-flex align-items-center justify-content-center">					 	
                  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                  <h3>Admin</h3>
              </div>
            </a>
          </div>
        </div>

        @php
          $prefix = Request::route()->getPrefix();
          $route = Route::current()->getName();
        @endphp
      
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
      <li class="{{$route == 'dashboard' ? 'active' : ''}}">
          <a href="{{route('dashboard')}}">
            <i data-feather="pie-chart"></i>
			      <span>Dashboard</span>
          </a>
      </li>  
		
        <li class="treeview {{$prefix == '/users' ? 'active': ''}}">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('users.all')}}"> <i data-feather="users"></i><span style="margin-left:10px">View Users<span></a></li>
            <li><a href="{{route('users.add')}}"> <i data-feather="user-plus"></i><span style="margin-left:10px">Add User</span></a></li>
          </ul>
        </li> 
		  
        <li class="treeview {{$prefix == '/profile' ? 'active': ''}}">
          <a href="#">
            <i data-feather="user"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{route('profile.show')}}"><i class="fa fa-user-circle"></i>View Profile</a></li>
          <li><a href="{{route('profile.password')}}"><i class="fa fa-key"></i>Change Password</a></li>
           
          </ul>
        </li>
		
      	  
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
           
          </ul>
        </li>
		  </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>