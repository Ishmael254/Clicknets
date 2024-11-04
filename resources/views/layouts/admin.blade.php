<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1317234510818453"
     crossorigin="anonymous"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin -ClickNet Org</title>
  <link href="{{ asset('homepage/img/click3.PNG') }}" rel="icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/logincode/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> -->
  

     
     
</head>


<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link">{{ ucfirst(request()->segment(1)) }}</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a  class="nav-link">ADMIN Dashboard</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}"  class="nav-link">User Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <div class="navbar-search-block">
          <form class="form-inline" method="post" action="{{route('adminsearchusers')}}">
            @csrf
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" required name="email" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

</nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link mt-3">
      <img src="{{ asset('homepage/img/click3.PNG') }}" alt="Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ClickNet Org</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('homepage/img/user2.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <style>
          .active {
          background:orange; color:blue;
        }
      
        </style>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="{{ (request()->segment(1) == 'admin') ? 'active' : '' }}">
            <a href="{{route('admin')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Admin Dashboard
              </p>
            </a>
            
          </li>
           
          <li class="{{ (request()->segment(1) == 'allusers') ? 'active' : '' }}">
            <a href="{{route('allusers')}}" class="nav-link">
            <i class="fas fa-list mr-2"></i>
              <p>
               All Users
                <!-- <span class="right badge badge-success">Active</span> -->
              </p>
            </a>
          </li>

          <li class="{{ (request()->segment(1) == 'activeusers') ? 'active' : '' }}">
            <a href="{{route('activeusers')}}" class="nav-link">
            <i class="fas fa-envelope mr-2"></i>
              <p>
               Active Users
                <!-- <span class="right badge badge-success">Active</span> -->
              </p>
            </a>
          </li>

          <li class="{{ (request()->segment(1) == 'inactiveusers') ? 'active' : '' }}">
            <a href="{{route('inactiveusers')}}" class="nav-link">
            <i class="fas fa-power-off mr-2"></i>
              <p>
               Inactive Users
                <!-- <span class="right badge badge-danger">Inactive</span> -->
              </p>
            </a>
          </li>
          <li class="{{ (request()->segment(1) == 'notaddedsite') ? 'active' : '' }}">
            <a href="{{route('notaddedsite')}}" class="nav-link">
            <i class="fa fa-laptop" aria-hidden="true"></i>
              <p>
               Not added site
                <!-- <span class="right badge badge-danger">Inactive</span> -->
              </p>
            </a>
          </li>

          <li class="{{ (request()->segment(1) == 'reportedusers') ? 'active' : '' }}">
            <a href="{{route('reportedusers')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Reported users
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
           
           
          </li>
          <li class="{{ (request()->segment(1) == 'adminsite') ? 'active' : '' }}">
            <a href="{{route('adminsite') }}" class="nav-link">
            <i class="fa fa-fast-forward" aria-hidden="true"></i>
              <p>
                &nbsp; Admin Website
              </p>
            </a>
            </li>

          
            <li class="{{ (request()->segment(1) == 'sendmail') ? 'active' : '' }}">
            <a href="{{ route('sendmail')}}" class="nav-link">
              <i class="nav-icon fas fa-envelope-open"></i>
              <p>
                Send Email
              </p>
            </a> 
            </li>
           
           
            <li class="{{ (request()->segment(1) == 'approvalrequests') ? 'active' : '' }}">
            <a href="{{ route('approvalrequests')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Approval Requests
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            </li>

            <li class="{{ (request()->segment(1) == 'feedbacks') ? 'active' : '' }}">
            <a href="{{ route('feedbacks') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Feedbacks
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>

          <li class="{{ (request()->segment(1) == 'facebookreqs') ? 'active' : '' }}">
            <a href="{{ route('facebookreqs') }}" class="nav-link">
            <i class="fab fa-facebook-f mr-1"></i>              <p>
                Facebook Reqs
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>

          <li class="{{ (request()->segment(1) == 'usermessages') ? 'active' : '' }}">
            <a href="{{ route('usermessages') }}" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Messages
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>

           
          <li class="nav-item">
            <a href="{{ route('logout') }}" method="POST" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>              <p>
                Logout
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
              
            </a>
            
          </li>
        
         


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>





        <main class="py-4">
            @yield('content')
        </main>
  
<footer class="main-footer" style="background-color: black">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Ad Revenue Booster !
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020-2021 <a href="#">ClickNet Org</a>.</strong> All rights reserved.
  </footer>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('/logincode/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/logincode/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/logincode/dist/js/adminlte.min.js') }}"></script>



<script type="text/javascript">
$('#search').on('keyup',function(){
$value=$(this).val();
$.ajax({
type : 'get',
url : '{{URL::to('search')}}',
data:{'search':$value},
success:function(data){
$('tbody').html(data);
}
});
})
</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>


</body>
</html>
