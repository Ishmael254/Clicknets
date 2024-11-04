
@extends('layouts.myapp')

@section('content')

  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div class="row">
              <?php
              $id = Auth::user()->id;
            $countmessage = DB::table('reply_users')->where('UserId', $id)->where('Status', false)->count();  
              
              ?>
            <h3 class="m-0">Welcome to Clicknet Org</h3><h5 class="mt-2 ml-5">@if($countmessage >= 1) <p class="text-red blink-soft"><a class="btn  btn-success btn-sm" style="width:180px; height:30px;" href="{{route('myreply')}}">You have {{$countmessage}} message(s)</a></p> 
              
              <div class="mycontainer">
                 
                  <style>
                   
                      .p {
                        float:right;
                        width: 50%;
                        text-align: center;
                        margin-top: 3rem;
                      }
                      .text-red {
                        color: blue;
                      }

                      .blink-soft {
                        animation: blinker 2.3s linear infinite;
                      }
                      @keyframes blinker {
                        50% {
                          opacity: 0;
                        }
                      }

                  </style>
              </div>
              @endif</h5>

            </div>
            
          </div><!-- /.col -->

          @if (session('message'))
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a>Home</a></li>
              <li > / Welcome Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
              <div class="card-header">
                <h5 class="m-0">Application Process</h5>
              </div>

                <p class="card-text"><br>
                  Considering the fact that these website is offering <br> you services for free,You need to give the admin the required <br> Pageviews/Clicks to be allowed to join.
                  <br>These helps support and maintain these website.
                </p>

                <a href="{{route('approval')}}" class="btn btn-success">Click here to Apply</a>
                <a href="#" class="card-link">#Required</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-body">
              <h5 class="m-0">How long does approval process take ?</h5><hr>

                <p class="card-text">
                  Approval process is 1-2 hours depending on the <br>region time.Most applications are approved immediately.
                  <br>You will get access to the dashboard once you are approved.
                </p>
                <!-- <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> -->
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Any Problem ?</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Contact Admin</h6>

                <p class="card-text">If you have any issue that needs to be <br>resolved by the admin kindly contact us .</p>
                <a href="{{route('contact')}}" class="btn btn-primary">Contact Now</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Application Status</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">How do i check my application status ?</h6>

                <p class="card-text">You can check whether your application <br>has been approved by clicking the button below</p>
                <a href="{{route('waiting')}}" class="btn btn-success">Check Application</a>
              </div>
            </div>
          </div>


           
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
      
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->



  @endsection