
@extends('layouts.admin')

@section('content')

  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">

  <!-- zoom image script here -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List of Inactive members : <a class="btn btn-danger btn-sm">Total Users :{{$countusers}}</a> </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>

                     <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto ml-5">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <div class="navbar-search-block">
          <form class="form-inline" method="post" action="{{route('adminsearchworking')}}">
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

      
        </div>            @include('inc.messages') 

        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 5%">
                        UserId
                      </th>
                      <th style="width: 5%">
                          Name
                      </th>
                      <th style="width: 6%">
                            Email
                      </th>
                      <th style="width: 5%">
                          Joined on
                      </th>
                    
                      <th style="width: 10%" > 
                      Status
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach($theusers as $w)
                  <tr>
                      <td>
                      {{$w->id}}
                      </td>
                      <td>                        
                     {{$w->id}}
                                                   
                      </td>
                  
                      <td>
                      {{$w->name}}
                      </td>

                      <td>
                      {{$w->email}}
                      </td> 
                      <td class="project_progress">
                          <a href="#" class="btn btn-primary btn-sm">{{ Carbon\Carbon::parse($w->created_at)->format('d-m-Y') }}</a>                     

                      </td>

                       
                                    
                                             
                      <td class="project-actions text-right">

                     
                          <a class="btn btn-danger btn-sm" href="{{route('sendmailtouseraddsite', $w->id)}}">
                             
                             Send add site email
                          </a>
                          <!-- <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Submit
                          </a>
                          <a class="btn btn-danger btn-sm" >
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a> -->
                      </td>
                  </tr>
                  @endforeach
              
               
              </tbody>

              
          </table><center class="mb-4 mt-3">{{$theusers->links()}}</center>   
          <br>
          



          <style>
            .w-5{
              display: none;
            }
          </style>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
   
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