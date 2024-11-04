
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ClickNet | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/logincode/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/logincode/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/logincode/dist/css/adminlte.min.css') }}">
</head>


<body class="hold-transition login-page" style="background-image: url('{{ asset('/Backgrounds/thumbimg_25361957thumbejpg.jpg') }}'); background-position: center;
  background-repeat: no-repeat;
  background-size: cover;" >
<div class="login-box">
<div class="register-logo">
    <a href="#" style="color: white;"><b>CLick</b>Net</a>
  </div>

  <!-- <img src="/storage/image/ishi.jpg" alt="ishii"> -->
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Confirm your email to complete your registration</p>
      <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">{{ __('Verify Your Email Address') }}</div> -->

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},

                    <br><br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        
                        <button type="submit" class="btn btn-primary mr-3">Request Another</button>

                    </form>
                    <!-- <a href="" ><img src="{{ asset('homepage/img/logout.jpg') }}" alt="" class="img-fluid"></a> -->

                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm ml-3">Logout</a>


                </div>
            </div>
        </div>
    </div>
</div>
   
     

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>


