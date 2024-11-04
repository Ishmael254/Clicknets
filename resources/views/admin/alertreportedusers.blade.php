
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

          <form method="post" action="{{route('alertreportedusersform')}}">
            @csrf
            @include('inc.messages') 
          <div class="form-group">
              <label for="exampleInputEmail1">{{$reportingname}} reported {{$reportedname}}</label>
             
            </div>
            <input type="hidden" value="{{$id}}" name="reportingid">
            <input type="hidden" value="{{$reportingname}}" name="reportingname">
            <input type="hidden" value="{{$reportedname}}" name="reportedname">
            <input type="hidden" value="{{$ReportedUserId}}" name="reporteduserid">       

            <div class="form-group">

              <label for="exampleInputEmail1">Enter Subject</label>
              <!-- <textarea  type="text" required class="form-control" name="msg" placeholder="Enter Message" id="msg"></textarea> -->
              <input class="form-control" id="sub" name="subject" placeholder="Enter subject" value="Reported for violation of rules">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Enter Message</label>
              <textarea  type="text" required class="form-control" name="message" placeholder="Enter Message" id="msg" >
                Hello {{$reportedname}}, you have been reported by {{$reportingname}} for not returning work based on the stated rules.Return the work as indicated 
               before you are suspended.You have 36 hours to  your suspesion time!.</textarea>
              <!-- <input class="form-control" id="msg" name="msg" placeholder="Enter Message"> -->
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>           
          
            <button type="submit" class="btn btn-primary">Send Now</button>
          </form>
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