
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
         
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
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
                        Email
                      </th>
                      <th style="width: 5%">
                        Subject
                      </th>

                      <th style="width: 5%">
                          Message
                      </th>
                     
                      <th style="width: 5%">
                          Created on
                      </th>
                      
                       <th style="width: 5%">
                      </th>
                        <th style="width: 5%">
                      </th>
                    
                     
                  </tr>
              </thead>
              <tbody>
              @foreach($feed as $w)
                  <tr>
                      <td>
                      {{$w->id}}
                      </td>
                      
                      <td>                        
                     {{$w->UserId}}
                                                   
                      </td>
                      <td>                        
                     {{$w->Email}}
                                                   
                      </td>
                      <td>                        
                     {{$w->Subject}}
                                                   
                      </td>
                  
                      <td>
                      {{$w->Message}}
                      </td>

                    
                      <td class="project_progress">
                          <a href="#" class="btn btn-primary btn-sm">{{ Carbon\Carbon::parse($w->created_at)->format('d-m-Y') }}</a>                     

                      </td>

                    <td class="project_progress">
                          <a href="{{route('readusermessages', $w->id)}}" class="btn btn-success btn-sm">Read</a>                     

                      </td>
                      
                        <td class="project_progress">
                          <a href="{{route('replyuser', ['id'=>$w->id,'userid'=>$w->UserId])}}" class="btn btn-danger btn-sm">Reply</a>                     

                      </td>

                       
                                    
                                             
                     
                  </tr>
                  @endforeach
              
               
              </tbody>

              
          </table><center class="mb-4 mt-3">{{$feed->links()}}</center>   
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