
@extends('layouts.myapp')

@section('content')

  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">ClickNet Rules</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
       

        
    
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card mt-3" style="background-color:white">
              <div class="card-body">
              <div class="card-header">
                <h5 class="m-0">Read the rules below:</h5>
              </div>

                <p class="card-text"><br>
                  1) You must return work <br>
                  2) Maximum period of returning work is 48hrs<br>
                  3) If your work is not returned after 48hrs, report<br> the user by clicking on report button <br>on your chat window. <br>
                  4) If you are reported, and report approved, <br>you will be banned for 7 days.If you are reported more than 3 times,
                   <br>your account will be disabled. <br>                   
                  5) If you dont return using the requested rules, <br>you will be suspended for 7 days<br>
                 

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
          <div class="card card-danger mt-3">
              <div class="card-header">
                <h3 class="card-title">Consequences of not following the rules</h3>
              </div>
              <div class="card">
              <div class="card-body">
            
                <p class="card-text"><br>
                  1) Account suspension for 7 days - not following return rules<br>
                  2) Account ban - Failure to return work<br>
                  3) Account Disabled - Failure to return work more than 3 times <br>                                 
                

                </p>
                <!-- <a href="{{route('application')}}" class="btn btn-success">Click here to Apply</a>
                <a href="#" class="card-link">#Required</a> -->
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
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
   



@endsection