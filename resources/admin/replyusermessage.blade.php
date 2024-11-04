
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

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Remove">
              <i class="fas fa-times"></i>
            </button>

            
          </div>
          <h3>Leave us a message here and we'll get back to you</h3>


          <form method="post" action="{{route('contactuspost')}}">
            @csrf
            @include('inc.messages') 
          <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" name="Name" value="{{ $username}}" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" name="Email" value="{{ $user}}" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            
            </div>

           

            <div class="form-group">

              <label for="exampleInputEmail1">Enter Subject</label>
              <!-- <textarea  type="text" required class="form-control" name="msg" placeholder="Enter Message" id="msg"></textarea> -->
              <input class="form-control" id="sub" name="subject" placeholder="Enter subject">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Enter Message</label>
              <textarea  type="text" required class="form-control" name="message" placeholder="Enter Message" id="msg"></textarea>
              <!-- <input class="form-control" id="msg" name="msg" placeholder="Enter Message"> -->
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
           
          
            <button type="submit" class="btn btn-success">Send Now</button>
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