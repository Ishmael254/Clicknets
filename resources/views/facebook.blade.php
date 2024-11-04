
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

            <style>
              .container {
                position: relative;
                text-align: center;
                color: white;
              }


              .centered {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
              }
            </style>

          <div class="container">
            <!-- <img src="img_snow_wide.jpg" alt="Snow" style="width:100%;"> -->
            
            <img src="{{ asset('homepage/img/fbpage.JPG') }}" style="width:100%; height: 500px;" alt="fbpage">


            <div class="centered" style="color:yellow;"> <strong> <h3>Request facebook advertising on our page <br>From as low as 20 USD we will place your ad <br> on our page. </h3></strong></div>
          </div>            
          <hr>
             <center> <h5>Fill out the form below</h5></center>
          <hr>

          <form method="post" action="{{route('facebookpost')}}">
            @csrf
            @include('inc.messages') 
          <div class="form-group">
              <!-- <label for="exampleInputEmail1">Name</label> -->
              <input type="hidden" name="Name" value="{{ $username}}" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputEmail1">Email</label> -->
              <input type="hidden" name="Email" value="{{ $user}}" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            
            </div>

            <div class="form-group">

              <label for="exampleInputEmail1">Mention your budget in (USD) </label>
              <!-- <textarea  type="text" required class="form-control" name="msg" placeholder="Enter Message" id="msg"></textarea> -->
              <input type="number" class="form-control" id="sub" min="20" name="budget" value="50" placeholder="Enter amount in Dollars">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">What you want to advertise with us</label>
              <textarea  type="text" required class="form-control" name="details" placeholder="Enter Details" id="msg"></textarea>
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