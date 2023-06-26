<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Synthesis App</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('') }}assets/dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route("login") }}" class="h1"><b>LOGIN</b></a>
    </div>
    <div class="card-body">
      <!-- <p class="login-box-msg">&nbsp;</p> -->
        {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="input-group mb-3">
              <input type="text" name="username" class="form-control" placeholder="NIK">
              <div class="input-group-append">
                  <div class="input-group-text">
                  <span class="fas fa-user"></span>
                  </div>
              </div>


            </div>
            <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
              <select class="form-control select2" id="project" name="project" style="width: 100%;">
                <option option="">Pilih Project</option>
                @foreach($list_project as $data)
                    <option value="{{ $data->project_id }}|{{ $data->project }}">{{ $data->project }}</option>
                @endforeach
              </select>
            </div>
            <div class="input-group mb-3">
              <select class="form-control select2" id="company" name="company" style="width: 100%;">
                <option option="">Pilih Company</option>
                @foreach($list_company as $data)
                    <option value="{{ $data->company_id }}|{{ $data->company_name }}">{{ $data->company_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="input-group mb-3">
              <div class="company_select"></div>
            </div>
            <div class="row">
            <div class="col-8">
                {{-- <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                    Remember Me
                </label>
                </div> --}}
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
            </div>
        </form>

      <p class="mb-1">
        <a href="{{ route('forgot_password') }}">I forgot my password</a>
      </p>
      <p class="mb-1">
        <a href="{{ route('register') }}">Register</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('') }}assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('') }}assets/dist/js/adminlte.min.js"></script>

  <script>

    function project_selected(params) {
      var projectId = params.value;

      const master_company = {!! json_encode($list_project, JSON_HEX_TAG) !!};
      console.log(master_company);
    }

  </script>

</body>
</html>
