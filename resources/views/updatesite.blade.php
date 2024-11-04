
@extends('layouts.myapp')

@section('content')

  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Update your site details</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
       

        
        @foreach($data as $data)
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
              <div class="card-header">
                <h5 class="m-0">What you should know</h5>
              </div>

                <p class="card-text"><br>
                  1) Indicate the number of views you want to receive<br>
                  2) Indicate the number of ad clicks you want<br>
                  3) State your rules <br>
                  4) Add your Website keywords, and link <br>
                   
                  5) Indicate your country<br>
                  6) Indicate Page Visit after every _ days<br>
                  7) Save and you will be live and ready to receive visits ! <br>

                </p>
                <div class="card card-outline"></div>
               <center> <h5 class="mt-2">Your current rules</h5></center>
                <hr>
                <p class="card-text"><br>
                <p>{{$data->Rules}}</p>
                
                <div class="card card-outline">

                <!-- <a href="{{route('application')}}" class="btn btn-success">Click here to Apply</a>
                <a href="#" class="card-link">#Required</a> -->
              </div>
            </div>

              
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
      
          
          <div class="col-lg-6">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update your site details here </h3>
               
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             

              <form method="post" action="{{route('updatesiteform')}}">
                  @csrf
              <br>
              @include('inc.messages')
        
                <div class="card-body">

                <input type="hidden" name="workid" value="{{$data->id}}">

                  <div class="form-group">
                  <label for="views">Specify the views you need</label>          
                    
                    <input type="number" required class="form-control" id="views" value="{{$data->PageViews}}" name="views" placeholder="Number of views">
                  </div>
                  <div class="form-group">         
                  <label for="rules">Enter number of ad clicks </label>          
           
                    <input type="number" required class="form-control" id="ads" name="ads" value="{{$data->Adclicks}}" placeholder="Ad clicks">
                  </div>
                  <div class="form-group">
                  <label for="rules">Copy and paste your website address here</label>          
                    
                    <input type="url" required class="form-control" id="url" value="{{$data->Website}}"  name="url" placeholder="Website URL">
                  </div>
                  
                <script>
                  $('form').on('submit', function(e){
                    e.preventDefault();
                    console.log('valid URL');
                });

                </script>
            
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                  
                    <label for="rules">Describe your rules here</label>          
                    <textarea type="text" required class="form-control" value="{{$data->Adclicks}}" id="rules" name="rules" placeholder="Describe your rules" ></textarea>
                  
                  </div>
                  <br>
                  <center>
                  <button type="submit"  class="btn btn-success btn-lg btn-block text-center">Update Now</button>
                  </center>
                </div>

                </form>

                <!-- /.card-body -->
            </div>
            @endforeach

          
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