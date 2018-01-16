<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Log in</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href='/assets/bootstrap/css/bootstrap.min.css'>
  <link rel="stylesheet" href='/assets/font-awesome/css/font-awesome.min.css'>
  <link rel="stylesheet" href='/assets/dist/css/AdminLTE.min.css'>
  <link rel="stylesheet" href='/assets/dist/css/skins/skin-blue.min.css'>
  <link rel="stylesheet" href='/assets/plugins/datatables/dataTables.bootstrap.css'>
  <link rel="stylesheet" href='/assets/plugins/iCheck/square/blue.css'>
  <link rel="stylesheet" href='/assets/plugins/datepicker/datepicker3.css'>

</head>

<body class="hold-transition login-page">
  <!-- Body -->
  <div class="wrapper body-inverse"> <!-- wrapper -->
    <div class="container">
      <div class="row">
        <!-- Sign In form -->
        <div class="col-sm-5 col-sm-offset-1">
          <h3>Sign In to your account</h3>
          <p class="text-muted">
            Please fill out the form below to login to your account.
          </p>
          <div class="form-white">
            <form action="{{ route('login') }}" method="post">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                <label for="email">Email address</label>
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>

              <div class="checkbox">
                <label>
                  <input type="checkbox" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
              </div>

              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </form>
            <hr>
          </div>
        </div>






        <!-- Sign Up form -->
        <div class="col-sm-5">
          <h3 class="text-right-xs">Sign Up to your account</h3>
          <p class="text-muted text-right-xs">
            Please fill out the form below to create a new account.
          </p>
          <div class="form-white">
            <form role="form">
              <div class="form-group">
                <label for="name">Nama Bisnis</label>
                <input type="text" class="form-control" id="name" placeholder="Your name">
              </div>
              <div class="form-group">
                <label for="email2">Email</label>
                <input type="email" class="form-control" id="email2" placeholder="Enter email">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6">
                    <label for="password2">Password</label>
                    <input type="password" class="form-control" id="password2" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <label for="password2">Repeat password</label>
                    <input type="password" class="form-control" id="password3" placeholder="Password">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="telepon">No Telepon</label>
                <input type="telepon" class="form-control" id="telepon" placeholder="62+">
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> I agree to the <a .html#">Terms of Service</a> and <a href=".html#">Privacy Policy</a>
                </label>
              </div>
              <button type="submit" class="btn btn-primary btn-block btn-flat">Buat Akun Baru</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- / wrapper -->
</body>
</html>