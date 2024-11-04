
@extends('layouts.myapp')

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
          <h3 class="card-title">Total search count : <a class="btn btn-success btn-sm"> :{{$searchcount}}</a> </h3>

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
                          Id
                      </th>

                      <th style="width: 10%">
                          Owner Name
                      </th>
                      <th style="width: 10%">
                          Website Name
                      </th>
                      <th style="width: 10%">
                          Date Joined
                      </th>
                      <th style="width: 5%" class="text-center">
                          Status
                      </th>
                      <th style="width: 10%" class="mr-5"> 
                      </th>
                  </tr>
              </thead>
              <tbody> 
              
                              
                          
              @foreach($search as $w)

                  <tr>
                      <td>
                      {{$w->id}}
                      </td>
                      <td>
                          <a>
                              {{$w->Membername}}
                          </a>                        
                         
                      </td>
                  
                      <td>
                      {{$w->Website}}
                      </td>
                      <td class="project_progress">
                          <a href="#" class="btn btn-primary btn-sm">{{ Carbon\Carbon::parse($w->created_at)->format('d-m-Y') }}</a>                     

                      </td>


                      
                      <td class="project-state">
                        @if($w->Status == 1)
                          
                          <span class="badge badge-success">Success</span>
                         @else 
                         <span class="badge badge-danger">Not Viewed</span>
                          @endif
                      </td>      
                      
                      <td class="project-actions text-right">

                          @if(Auth::user()->id == $w->UserId)
                          
                          <a class="btn btn-info btn-sm">
                              <i class="fas fa-folder">
                              </i>
                              Your site
                          </a>
                           @else  <!--{{Crypt::encrypt('id')}} -->
                           @php $UserId= Crypt::encrypt($w->UserId); @endphp

                          <!-- <a class="btn btn-success btn-sm" href="{{ route('view', $w->UserId) }}"> -->
                          <a class="btn btn-success btn-sm" href="{{ route('view', $UserId) }}">
                            
                              <i class="fas fa-eye">
                              </i>
                              Visit
                          </a>
                          @endif
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

              
          </table>
          <br>
          




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