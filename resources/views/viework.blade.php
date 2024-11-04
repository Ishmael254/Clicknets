
@extends('layouts.myapp')

@section('content')

  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ClickNet Members Area</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">clickzone</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Click on image to see clear image</h3>

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

            <div class="card">
              <div class="card-body">
              <h4>Image 1</h4>

                <!-- image 1 -->
                <center>  <img data-enlargeable style="cursor: zoom-in" style="width:500px; height:250px; border-radius: 50px;" src="/storage/image/{{$clicks->Image1}}" class="img-fluid" alt={{$clicks->OwnerName}}></center> 
               
                
                <!-- <a href="{{route('application')}}" class="btn btn-success">Click here to Apply</a>
                <a href="#" class="card-link">#Required</a> -->
              </div>
            </div>

            <div class="card card-outline">
              
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->

<!-- image 2 -->

           <div class="col-lg-6">

            <div class="card">
              <div class="card-body">
             <h4>Image 2</h4>
                <!-- image 1 -->
                <center>  <img data-enlargeable style="cursor: zoom-in" style="width:500px; height:250px; border-radius: 50px;" src="/storage/image/{{$clicks->Image2}}" class="img-fluid" alt={{$clicks->OwnerName}}></center> 

                <!-- <a href="{{route('application')}}" class="btn btn-success">Click here to Apply</a>
                <a href="#" class="card-link">#Required</a> -->
              </div>
            </div>

            <div class="card card-outline">
              
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->

<!-- image 3 -->
          <div class="col-lg-6">

              <div class="card">
                <div class="card-body">
              <h4>Image 3</h4>
                  <!-- image 1 -->
                  <center>  <img data-enlargeable style="cursor: zoom-in" style="width:500px; height:250px; border-radius: 50px;" src="/storage/image/{{$clicks->Image3}}" class="img-fluid" alt={{$clicks->OwnerName}}></center> 

                  <!-- <a href="{{route('application')}}" class="btn btn-success">Click here to Apply</a>
                  <a href="#" class="card-link">#Required</a> -->
                </div>
              </div>

              <div class="card card-outline">
                
              </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->


          <!-- action buttons here -->
          <div class="col-lg-6">

              <div class="card">
                <div class="card-body">
             <center><h3>Action Tab</h3></center><br>
                <center>
                 <!--  <div class="row"> -->
                   <a class="btn btn-success" href="">Approve Work</a>

                   <a class="btn btn-danger ml-3" href="">Report user</a>
                 <!-- </div>-->
                 </center> 
                  <!-- <a href="{{route('application')}}" class="btn btn-success">Click here to Apply</a>
                  <a href="#" class="card-link">#Required</a> -->
                </div>
              </div>

              <div class="card card-outline">
                
              </div><!-- /.card -->
              </div>
              <!-- /.col-md-6 -->
      
          

    </section>
    <!-- /.content -->
   

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