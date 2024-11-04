
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
          <h3 class="card-title">Total reported members : <a class="btn btn-primary btn-sm">Total Reports : {{$countreports}}</a> </h3>
          @include('inc.messages') 

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
                      <th style="width: 3%">
                        Reporting User
                      </th>
                      <th style="width: 3%">
                          Reported User
                      </th>

                      <th style="width: 5%">
                          Image 1
                      </th>

                      <th style="width: 5%">
                          Image 2
                      </th>
                     
                      <th style="width: 3%">
                          Created at
                      </th>
                    
                      <th style="width: 3%" > 
                      Status
                      </th>
                      <th style="width: 10%" > 
                      Action
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach($allreports as $w)
                  <tr>
                      <td>
                      {{$w->id}}
                      </td>
                      <td>                        
                     {{$w->ReportingUserId}}
                                                   
                      </td>
                  
                      <td>
                      {{$w->ReportedUserId}}
                      </td>
                      <td class="project-state">
                     <img data-enlargeable style="cursor: zoom-in" style="width:50px; height:50px; border-radius: 50px;" src="/public/public/image/{{$w->Image1}}" class="img-fluid" alt={{$w->Image1}}>

                     </td> 

                     <td class="project-state">
                     <img data-enlargeable style="cursor: zoom-in" style="width:50px; height:50px; border-radius: 50px;" src="/public/public/image/{{$w->Image2}}" class="img-fluid" alt={{$w->Image2}}>

                     </td> 

                     
                      <td class="project_progress">
                          <a class="btn btn-primary btn-sm">{{ Carbon\Carbon::parse($w->created_at)->format('d-m-Y') }}</a>                     

                      </td>

                      <td>
                      @if($w->Status == 1)
                        
                        <a class="btn btn-success btn-sm">
                        <i class="fas fa-check">
                                    </i>   
                        Reviewed
                      </a>

                      @elseif($w->Status == 0)

                      <a class="btn btn-danger btn-sm">Not Reviewed</a>
                      @else
                      <a class="btn btn-primary btn-sm">Undefined</a>

                      @endif
                      </td> 
                      
                     

                      <td>
                        @if($w->Status == 1)
                        
                        <a class="btn btn-success btn-sm">
                        <i class="fas fa-check">
                                    </i>  
                        Reviewed</a>

                      @elseif($w->Status == 0)
                      <a href="{{route('suspendreportedusers',['id'=>$w->id,'reportedid'=>$w->ReportedUserId])}}" class="btn btn-warning btn-sm mr-1">Suspend</a>
                      <a href="{{route('banreportedusers',['id'=>$w->id,'reportedid'=>$w->ReportedUserId])}}" class="btn btn-danger btn-sm mr-1">Ban</a>
                      <a href="{{route('ignorereportedusers',['id'=>$w->id,'reportedid'=>$w->ReportedUserId])}}" class="btn btn-success btn-sm">Ignore</a>
                      <a href="{{route('alertreportedusers',['id'=>$w->ReportingUserId,'reportedid'=>$w->ReportedUserId])}}" class="btn btn-warning btn-sm">Alert</a>
                      @else
                      <a class="btn btn-primary btn-sm">Denied Access</a>

                      @endif
                      </td> 
                                    
                                             
                      
                  </tr>
                  @endforeach
              
               
              </tbody>

              
          </table><center class="mb-4 mt-3">{{$allreports->links()}}</center>   
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