
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

          <form method="post" action="{{route('sendmailform')}}">
            @csrf
            @include('inc.messages') 
          <div class="form-group">
              <label for="exampleInputEmail1">Send Email to Users</label>
              <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> -->
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
              <select name="sendto" required class="form-control" id="">
              <option></option>
              <option value="2">All</option>
              <option value="1">Active Only</option>
              <option value="0">Inactive Users</option>
              <option value="3">Not added site</option>

              </select>
            </div>


            <div class="form-group">

              <label for="exampleInputEmail1">Enter Subject</label>
              <!-- <textarea  type="text" required class="form-control" name="msg" placeholder="Enter Message" id="msg"></textarea> -->
              <input class="form-control" id="sub" name="subject" placeholder="Enter subject" value="ClickNet Account">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Enter Message</label>
              <textarea  type="text" required class="form-control" name="message" placeholder="Enter Message" id="msg">
            We are happy to inform you that your request to join
            Clicknet was approved. We are waiting for you to add your site so that you can start receiving visits and ad clicks on
            your site. Login to your account by clicking the button below , then click on add my site on your dashboard.
            Wishing you all the best!. 
              Hello there, i hope you are doing well. I just realized you created an account but you are not yet active. Kindly proceed and activate your account by logging in. Click the button below. Welcome to clicknet team. Lets improve on our ad revenue together.
              You can access your account at any point using the link below.</textarea>
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