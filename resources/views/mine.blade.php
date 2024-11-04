
@extends('layouts.myapp')

@section('content')

  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



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
          <h3 class="card-title">These page displays all complete website visits from other members to (Your website)</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>

        @if($count >= 1)
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 17%">
                          Visitor Name
                      </th>
                       <th style="width: 8%">
                          Image 1
                      </th>
                       <th style="width: 8%">
                          Image 2
                      </th>
                      <!-- <th style="width: 15%">
                          Owner Name
                      </th> -->
                      <th style="width: 15%">
                          Date Visited
                      </th>
                      <th style="width: 9%">
                          Next Visit Date
                      </th>

                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              
                   
              
              @foreach($work as $w)
                  <tr>
                      <td>
                      {{$w->id}}
                      </td>
                      <td>
                      {{$w->ClickerName}}
                      </td>
                      
                       <td class="project-state">
                     <img data-enlargeable style="cursor: zoom-in" style="width:50px; height:50px; border-radius: 50px;" src="/public/public/image/{{$w->Image1}}" class="img-fluid" alt={{$w->Image1}}>

                     </td> 

                     <td class="project-state">
                     <img data-enlargeable style="cursor: zoom-in" style="width:50px; height:50px; border-radius: 50px;" src="/public/public/image/{{$w->Image2}}" class="img-fluid" alt={{$w->Image2}}>

                     </td> 
                  
                      <!-- <td>
                      {{$w->OwnerName}}
                      </td> -->
                      <td class="project_progress">
                          <a href="#" class="btn btn-primary btn-sm">{{ Carbon\Carbon::parse($w->created_at)->format('d-m-Y') }}</a>                     

                      </td>
                      <td>
                      <a href="#" class="btn btn-primary btn-sm">{{ Carbon\Carbon::parse($w->Next_visit)->format('d-m-Y') }}</a>                   
          
                    </td>
                      
                      <td class="project-state">
                        @if($w->Status == 1)
                          
                          <span class="badge badge-success">Success</span>
                         @else 
                         <span class="badge badge-danger">Not Approved</span>
                          @endif
                      </td>
                      <td class="project-actions text-right">
                        @if($w->Status == false)
                     
                          <a class="btn btn-success btn-sm" href="{{ route('approvework', $w->id) }}">
                              <i class="fas fa-tick">
                              </i>
                              Approve
                          </a>
                          @else

                              <a class="btn btn-info btn-sm  mr-3" >
                              <i class="fas fa-check">
                              </i>                                   
                              Approved
                          </a>
                          @endif
                         
                          <a class="btn btn-danger btn-sm ml-3" >
                              <i class="fas fa-trash">
                              </i>
                              Report
                          </a>
                      </td>
                  </tr>
                  @endforeach

                  @else
                  <center>  <h5 class="mt-5 ml-3" style="background-image:url('/storage/emoji/smilemoji.png'); height: 390px; background-repeat: no-repeat;   background-position: center;">Nothing here yet !, come back later</h5></center>
                   <!-- <img src="/storage/emoji/smilemojix.png" alt=""> -->
                   @endif
                   <br>
              </tbody>              
          </table>
          
    <center class="mb-4 mt-3">{{$work->links()}}</center>              

<style>
  .w-5{
    display: none;
  }
</style>
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