<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{'assets/bower_components/bootstrap/dist/css/bootstrap.min.css'}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{'assets/bower_components/font-awesome/css/font-awesome.min.css'}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{'assets/bower_components/Ionicons/css/ionicons.min.css'}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{'assets/css/AdminLTE.min.css'}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{'assets/plugins/iCheck/square/blue.css'}}">
  <script src="{{ 'assets/js/jquery.js' }}"></script>
  <style>
      .invalid-feedback {
          color: #dd4b39;
      }
      .remember {
        margin: 10px 10px 13px -13px !important;
      }
  </style>

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        Admin
    </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="form-group has-feedback">
            <input
                id="email"
                name="email"
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                required autocomplete="email" 
                placeholder="Enter your email" autofocus/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @error('email')
                <span class="invalid-feedback" role="alert">
                   {{ $message }}
                </span>
            @enderror
        </div>


        <div class="form-group has-feedback">
            <input
                id="password"
                name="password"
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                autocomplete="current-password"
                placeholder="Enter your password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @error('password')
                <span class="invalid-feedback" role="alert" >
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="row col-md-12 remember">
            <div class="col-md-6" style="padding:0px;">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember" style="font-weight:100">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div class="col-md-6">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
           
        </div>
        <div class="social-auth-links text-center">
            <button type="submit" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-address-book" aria-hidden="true"></i>Login with a membership</button>
            
        </div>
    </form>

    
    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{'assets/bower_components/jquery/dist/jquery.min.js'}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{'assets/bower_components/bootstrap/dist/js/bootstrap.min.js'}}"></script>
<!-- iCheck -->
<script src="{{'assets/plugins/iCheck/icheck.min.js'}}"></script>
<script>
  $(function () {

    $('#stay').click(function () {
      if($('#stay').is(':checked') == true)
        $('#signin').attr('disabled', false);
      else
        $('#signin').attr('disabled', true);
    })
  });
</script>

</body>
</html>
