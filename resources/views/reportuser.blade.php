
@extends('layouts.myapp')

@section('content')

  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

         

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    


    

  <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    @foreach($work as $work)
    <h3 class="card-title">Provide the details below to report <span style="color: blue">{{$work->Membername}}</span> </h3>
    @endforeach
    @include('inc.messages') 
    <!-- <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div> -->
  </div>
 

</section>
<!-- /.content -->

  
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
                  {{$work->Rules}}
                </p>

                <!-- <a href="{{route('application')}}" class="btn btn-success">Click here to Apply</a>
                <a href="#" class="card-link">#Required</a> -->
              </div>
            </div>
                  
        <!-- report user -->
        <div class="row ml-5">
        <center><a href="{{route('home')}}" class="btn btn-success mt-5 mr-6 ml-3">Back</a></center>

        <center><a class="btn btn-danger mt-5 ml-3">You are Reporting {{$work->Membername}}</a></center>
        </div>
        <!-- end report user -->

            

            <div class="card card-outline">
              
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Submit your report here </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form method="post" action="{{route('reportuserform')}}" enctype="multipart/form-data">

              @csrf
              <br>
             
              
              <input type="hidden" value="{{$work->UserId}}" name="reporteduser">
        
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select a reason for reporting user</label>
                                    <select name="optiontype" id="optiontype" required class="form-control select2bs4">
                                        <option></option>
                                        <option value="Did not return my work">{{$work->Membername}} Did not return my work</option>
                                        <option value="Did not return by my rules">{{$work->Membername}} Did not return by my rules</option>
                                    </select>                   
                </div>
                 
                  <div class="form-group">
                  <input type="hidden" name="ownerid" value="">

                    <label for="exampleInputFile">Upload screenshot as evidence of work done</label>
                    <div class="input-group mt-3">

                    Image 1  <input type="file" id="file-input" class="ml-3" name="image1"   multiple/><br>
                    </div>
                    <div class="input-group mt-3">
                    Image 2  <input type="file" id="file-input" class="ml-3"  name="image2"   multiple/><br>
                    </div>
                    
                  </div><br>
                  <center>
                  <button type="submit" class="btn btn-success btn-lg btn-block text-center">Submit</button>
                  </center>
                </div>

                {!! Form::close() !!}
                <!-- /.card-body -->
              

      
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
      
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->








</div>



<script>


$('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
  var src = $(this).attr('src');
  var modal;

  function removeModal() {
    modal.remove();
    $('body').off('keyup.modal-close');
  }
  modal = $('<div>').css({
    background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
    backgroundSize: 'contain',
    width: '100%',
    height: '100%',
    position: 'fixed',
    zIndex: '10000',
    top: '0',
    left: '0',
    cursor: 'zoom-out'
  }).click(function() {
    removeModal();
  }).appendTo('body');
  //handling ESC
  $('body').on('keyup.modal-close', function(e) {
    if (e.key === 'Escape') {
      removeModal();
    }
  });
});

</script>
@endsection