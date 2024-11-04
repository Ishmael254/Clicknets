
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
          <h3 class="card-title">Admin website Clicks : <a class="btn btn-success btn-sm">Total count :{{$adminclickcount}}</a> </h3>

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
                      ClickerName
                      </th>
                      <th style="width: 3%">
                          Image 1
                      </th>
                      <th style="width: 3%">
                            Image 2
                      </th>
                      <th style="width: 3%">
                          Created on
                      </th>
                    
                      <th style="width: 3%" > 
                      Status
                      </th>
                      
                  </tr>
              </thead>
              <tbody>
              @foreach($adminclick as $w)
                  <tr>
                      <td>
                      {{$w->id}}
                      </td>
                      <td>                        
                     {{$w->ClickerName}}
                                                   
                      </td>
                  
                      <td>
                      <img data-enlargeable style="cursor: zoom-in" style="width:50px; height:50px; border-radius: 50px;" src="/public/public/image/{{$w->Image1}}" class="img-fluid" alt={{$w->Image1}}>
                      </td>

                      <td>
                      <img data-enlargeable style="cursor: zoom-in" style="width:50px; height:50px; border-radius: 50px;" src="/public/public/image/{{$w->Image1}}" class="img-fluid" alt={{$w->Image1}}>
                      </td> 
                      <td class="project_progress">
                          <a href="#" class="btn btn-primary btn-sm">{{ Carbon\Carbon::parse($w->created_at)->format('d-m-Y') }}</a>                     

                      </td>

                      <td>
                        @if($w->Status == 1)
                        
                        <a class="btn btn-success btn-sm">
                        <i class="fas fa-check">
                                    </i>  
                        Approved</a>

                      @elseif($w->Status == 0)  
                      <a href="{{route('approvework', $w->id)}}" class="btn btn-danger btn-sm">Approve</a>
                      @else
                      <a class="btn btn-primary btn-sm">Undefined</a>

                      @endif
                      </td> 
                  </tr>
                  @endforeach
              
               
              </tbody>

              
          </table>
          <center class="mb-4 mt-3">{{$adminclick->links()}}</center>   
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