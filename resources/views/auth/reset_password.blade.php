<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('') }}assets/dist/css/adminlte.min.css">

  
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/sweetalert2/sweetalert2.min.css">

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1">Reset Password</a>
    </div>
    <div class="card-body">

        <div class="input-group mb-3">
          <input type="text" id="employee_code" class="form-control" placeholder="NIK" value="{{ $employee_code }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" type="retype_password" id="retype_password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
               &nbsp;
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" onclick="submit()" class="btn btn-primary btn-block">Reset</button>
          </div>
          <!-- /.col -->
        </div>
        
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->




<!-- jQuery -->
<script src="{{ asset('') }}assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="{{ asset('')}}assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('') }}assets/dist/js/adminlte.min.js"></script>

<script>

  function submit() {
    
    var employee_code = $('#employee_code').val();
    var password = $('#password').val();
    var retype_password = $('#retype_password').val();

    if(password != retype_password) {
      Swal.fire({
        title: 'Warning !',
        text: 'Password and retype password do not match',
        icon: 'error',
        confirmButtonText: 'Okay'
      });
    }else{
      if(password=='' || retype_password=='') {
        Swal.fire({
          title: 'Warning !',
          text: 'Password and retype password do not empty',
          icon: 'error',
          confirmButtonText: 'Okay'
        });
      }else{

        Swal.fire({
          title: 'Loading',
          html: 'Sending data...',
          allowOutsideClick: false,
          didOpen: function () {
            Swal.showLoading();
          }
        });

        // AJAX POST request
        $.ajax({
          url: "{{ route('reset_password') }}",
          type: 'POST',
          data: {
            _token: '{{ csrf_token() }}',
            employee_code: employee_code,
            password: password
          },
          success: function (response) {
            // Berhasil
            Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: response.message
            }).then(function() {
              window.location.href = "{{ route('login') }}";
            });
          },
          error: function (xhr, status, error) {
            // Error
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Terjadi kesalahan saat mengirim data'
            });
          },
          complete: function () {
            // Selesai, tutup loading
            // Swal.close();
          }
        });

      }

    }
  }


</script>



</body>
</html>
