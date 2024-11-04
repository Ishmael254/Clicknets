
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
            <h1 class="m-0">Welcome to Clicknet Org</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Application Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card card-outline ml-2 mr-2 text-center">
             <br><br> 
             <h5 class="ml-4">You already have a pending application <br>
                Kindly note that you can submit one application at 
                <br>time.<br>
                <h5>Check your email/spam for a notification from us</h5><br>
            </h5>
            <h5 class="ml-3 btn btn-primary">Your application status is <button class="btn btn-success ml-1 mr-1" style="width: 190px;">Pending</button> Check back in a few minutes</h5>

    </div><!-- /.card -->
    
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
              <div class="card-header">
                <h5 class="m-0">Rules to follow</h5>
              </div>

                <p class="card-text"><br>
                  1) . Search on google wordpress.digitalafrica<br>
                  2) . Give 20 pageviews, 3pageviews per minute. <br>
                  3) . Give 1 high cpc ad click after every 10pageviews(total 2 ad clicks) <br>
                  4) . Stay on ad page for 5 mins,click on links on ad page <br>
                   after every 2 mins. <br>
                  5) . Take a screenshot of your browser history <br>
                  It should be very clear showing date and time of work. <br>
                  Upload the screenshot on the form on your right side <br>
                  and fill the form. <br>
                  6) . Submit the form and wait for approval <br>
                  7) . Once approved,  you will have access to the dashborad <br>
                  where you will find other ad revenue boosters.
                </p>

                <!-- <a href="{{route('application')}}" class="btn btn-success">Click here to Apply</a>
                <a href="#" class="card-link">#Required</a> -->
              </div>
            </div>

            <div class="card card-outline">
              
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Submit work here </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {!! Form::open(['action' => 'App\Http\Controllers\HomeController@submitapp', 'method' => 'POST', 'id' => 'myform', 'enctype' => 'multipart/form-data']) !!}
              @csrf
              <br>
              @include('inc.messages')
        
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Did you do 20 pageviews ?</label>
                    <select class="form-control select2bs4" required name="views" style="width: 100%;">
                    <option selected="selected" value="Yes">Yes</option>
                    <option value="No">No</option>
                    
                  </select>
                    <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Did you give 2 high cpc ads ?</label>
                    <select class="form-control select2bs4" name="ads"  style="width: 100%;">
                    <option value="Yes" selected="selected">Yes</option>
                    <option value="No">No</option>
                    
                  </select>
                    <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Upload screenshot as evidence of work done</label>
                    <div class="input-group mt-3">

                    Image 1  <input type="file" id="file-input" class="ml-3" onchange="loadPreview(this)" name="image1"   multiple/><br>
                    </div>
                    <div class="input-group mt-3">
                    Image 2  <input type="file" id="file-input" class="ml-3" onchange="loadPreview(this)" name="image2"   multiple/><br>
                    </div>
                    <div class="input-group mt-3">
                    Image 3  <input type="file" id="file-input" class="ml-3" onchange="loadPreview(this)" name="image3"   multiple/><br>
                    
                    </div>
                  </div>
              
                </div>

                {!! Form::close() !!}
                <!-- /.card-body -->
            </div>

      
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
      
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  @endsection