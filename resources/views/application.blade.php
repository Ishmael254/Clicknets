
@extends('layouts.myapp')

@section('content')

  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div class="row"><h4>
            <h3 class="m-0">Welcome to Clicknet Org</h3> <h5 class="mt-2 ml-3">@if($countmessage >= 1) <p class="text-red blink-soft"><a class="btn  btn-success btn-sm" style="width:180px; height:30px;" href="{{route('myreply')}}">You have {{$countmessage}} message(s)</a></p> 
             
           
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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a >You need to visit the admin website and submit screenshot evidence for approval</a></li>
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
                <h5 class="m-0">Rules to follow</h5>
              </div> 
              @foreach($data as $data)

                <p class="card-text"><br>
                Follow the rules below;  <br>     
                1) Search on google digitalafrica.us (must) or <a href="https://www.google.com/search?q=digitalafrica.us&sxsrf=APq-WBs0dt3jZhZzUhCN0oENylpz-Yi0iw%3A1643809198511&ei=ron6YevlHoeM8gK6j4eoCQ&ved=0ahUKEwjr9Ou6kuH1AhUHhlwKHbrHAZUQ4dUDCA4&uact=5&oq=digitalafrica.us&gs_lcp=Cgdnd3Mtd2l6EAMyBAgjECcyBAgjECcyBggAEA0QHjIGCAAQDRAeMgYIABANEB4yBggAEA0QHjIGCAAQDRAeMgYIABANEB4yBggAEA0QHjIGCAAQDRAeOgcIIxCwAhAnOgIIJkoECEEYAEoECEYYAFBIWOcKYKQMaABwAHgAgAGCBIgBmwuSAQkxLjMtMS4xLjGYAQCgAQHAAQE&sclient=gws-wiz">Click here</a>
                <br>
                2) Open the second website link after Themeforest.<br>
                3) My website name on google shows as Home - ThemeArena.<br>
                4) Visit 10 pages, click one high cpc ad.<br>
                5) Visit 10 more pages, give one high cpc ad.<br>
                6) You will have given  a total of 20pageviews <br>
                      and 2 ad clicks.<br>
                7) Screenshot your browser history showing the work.<br>
                8) Date and time should be clearly visible.<br>
                9) Upload the screenshots on the right pane here.<br>
                10) You will be approved after reviewing your work.<br>
                </p>

                <!-- <a href="{{route('application')}}" class="btn btn-success">Click here to Apply</a>
                <a href="#" class="card-link">#Required</a> -->
              </div>
            </div>

            <div class="card">
              <div class="card-body" >
              <div class="card-header">
                <h5 class="m-0">Click to see website image on google search</h5>
              </div>              
              <img data-enlargeable style="cursor: zoom-in height:100px;" src="/storage/emoji/dafrica.JPG" class="img-fluid" >

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
              {!! Form::open(['action' => 'App\Http\Controllers\HomeController@submitapp', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
              @csrf
              <br>
              @include('inc.messages')
       
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Did you do {{$data->Admin_views}} pageviews ?</label>
                    <select class="form-control select2bs4" required name="views" style="width: 100%;">
                    <option selected="selected" value="Yes">Yes</option>
                    <option value="No">No</option>
                    
                  </select>
                    <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Did you give {{$data->Admin_ads}} high cpc ads ?</label>
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
                    <!-- <div class="input-group mt-3">
                    Image 3  <input type="file" id="file-input" class="ml-3" onchange="loadPreview(this)" name="image3"   multiple/><br>
                    
                    </div> -->
                  </div><br>
                  <center>
                  <button type="submit" class="btn btn-success btn-lg btn-block text-center">Submit</button>
                  </center>
                </div>
@endforeach
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