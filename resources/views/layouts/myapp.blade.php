<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ClientArea - ClickNets Org</title>
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

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/614611cfd326717cb6822a61/1ffsrb5tl';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

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
        <a href="{{route('contact')}}" class="nav-link">Contact</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://www.facebook.com/clicknets.org" target="_blank" class="nav-link">Follow us on facebook</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline" method="post" action="{{route('usersearch')}}">
            @csrf
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" required name="email" type="search" placeholder="Search by name" aria-label="Search">
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

    
          <div class="dropdown-divider"></div>
         
        
     
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

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

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="{{ (request()->segment(1) == 'home') ? 'active' : '' }}">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
           
          <li class="{{ (request()->segment(1) == 'addmysite') ? 'active' : '' }}">
            <a href="{{route('addmysite')}}" class="nav-link">
            <i class="fas fa-plus mr-2"></i>
              <p>
                Add my site <span class="ml-2" style="color:red"><strong>New</strong> </span>
              </p>
            </a>
          </li>
          <li class="{{ (request()->segment(1) == 'rules') ? 'active' : '' }}">
            <a href="{{route('rules')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Plartform Rules
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
           
           
          </li>
          <li class="{{ (request()->segment(1) == 'mine') ? 'active' : '' }}">
            <a href="{{route('mine') }}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                My Work (My Website)
              </p>
            </a>
            </li>

            <li class="{{ (request()->segment(1) == 'allvisits') ? 'active' : '' }}">
            <a href="{{route('allvisits') }}" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Websites you visited
              </p>
            </a>
            </li>

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i> 
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
             
            </ul>
          </li> -->
          <li class="{{ (request()->segment(1) == 'completework') ? 'active' : '' }}">
            <a href="{{ route('completework')}}" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Completed Visits
              </p>
            </a> 
            </li>
           
           
            <li class="{{ (request()->segment(1) == 'pendingwork') ? 'active' : '' }}">
            <a href="{{ route('pendingwork')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pending work
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            </li>

            <li class="{{ (request()->segment(1) == 'userfeedback') ? 'active' : '' }}">
            <a href="{{ route('userfeedback') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Feedback
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>

          <li class="{{ (request()->segment(1) == 'facebook') ? 'active' : '' }}">
            <a href="{{ route('facebook') }}" class="nav-link">
            <i class="fab fa-facebook-f mr-1"></i>              <p>
                Request FB Advert
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>

        <style>
          .active {
          background:#238508; color:white;
        }
        </style>

          <li class="{{ (request()->segment(1) == 'helppage') ? 'active' : '' }}">
            <a href="{{ route('helppage') }}" class="nav-link">
            <i class="fa fa-question-circle ml-2" aria-hidden="true"></i>

              <p>
                Faq
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
    <strong>Copyright &copy; 2020-2021 <a href="">ClickNet Org </a> . All rights reserved . <a href="https://www.facebook.com/clicknets.org">Follow us on Facebook</a>. </strong>  

  </footer>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('/logincode/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/logincode/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/logincode/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
