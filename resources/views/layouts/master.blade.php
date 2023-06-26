<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Synthesis App | Dashboard')</title>
  <link rel="icon" href="{{ asset('')}}assets/logo/favicon.ico" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('')}}assets/plugins/fontawesome-free/css/all.min.css">
  @stack('custom-css')
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('')}}assets/dist/css/adminlte.min.css">
  
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/sweetalert2/sweetalert2.min.css">

  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/jquery-ui/jquery-ui.css">
  
  <link rel="stylesheet" href="{{ asset('')}}assets/plugins/jsgrid/jsgrid.min.css">
  <link rel="stylesheet" href="{{ asset('')}}assets/plugins/jsgrid/jsgrid-theme.min.css">
  
  <link rel="stylesheet" href="{{ asset('')}}assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('')}}assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('')}}assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  
  <script src="{{ asset('')}}assets/plugins/jquery/jquery.min.js"></script>
  
  <style>
    .select2-selection__choice {
        background-color: blue !important;
    }
  </style>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('')}}assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

<!-- NAVBAR-->
@include('layouts.nav-header')

<!-- SIDEBAR-->
@include('layouts.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- FOOTER -->
  @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('')}}assets/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('')}}assets/plugins/jquery-ui/jquery-ui.js"></script>
<script src="{{ asset('') }}assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<link href="{{ asset('')}}assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<script src="{{ asset('')}}assets/plugins/select2/js/select2.min.js"></script>

<script src="{{ asset('')}}assets/plugins/jsgrid/demos/db.js"></script>
<script src="{{ asset('')}}assets/plugins/jsgrid/jsgrid.min.js"></script>

<script src="{{ asset('')}}assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('')}}assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('')}}assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('')}}assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('')}}assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('')}}assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
@stack('custom-script')
<!-- AdminLTE App -->
{{-- <script src="{{ asset('')}}assets/dist/js/adminlte.js"></script> --}}
<script src="{{ asset('')}}assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('')}}assets/dist/js/demo.js"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('')}}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>  
// datepicker
  $( function() {
    $( ".datepicker" ).datepicker();
  } );


  // format rupiah
  $(".rupiah").on("input", function() {
    var value = $(this).val();
    // Hapus karakter selain angka
    value = value.replace(/[^\d]/g, "");

    // Format menjadi rupiah
    value = formatRupiah(value);

    // Set nilai input dan atur text align menjadi right
    if (value !== "") {
      $(this).val("Rp " + value).css("text-align", "right");
    } else {
      $(this).val(value).css("text-align", "right");
    }
  });

  function formatRupiah(angka) {
    var number_string = angka.toString().replace(/[^,\d]/g, ""),
        split    = number_string.split(","),
        sisa     = split[0].length % 3,
        rupiah     = split[0].substr(0, sisa),
        ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return rupiah;
  }


  // format angka
  $(".angka").on("input", function() {
    var value = $(this).val();
    // Hapus karakter selain angka
    value = value.replace(/[^\d]/g, "");

    // Format menjadi angka
    value = formatAngka(value);

    // Set nilai input dan atur text align menjadi right
    $(this).val(value).css("text-align", "right");
  });

  function formatAngka(angka) {
    var number_string = angka.toString().replace(/[^,\d]/g, ""),
        split    = number_string.split(","),
        sisa     = split[0].length % 3,
        angka     = split[0].substr(0, sisa),
        ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      separator = sisa ? "." : "";
      angka += separator + ribuan.join(".");
    }

    angka = split[1] != undefined ? angka + "," + split[1] : angka;
    return angka;
  }

  function formatRupiahToNumber(angka) {
    var number_string = angka.toString().replace(/[^,\d]/g, ""),
        split = number_string.split(","),
        rupiah = split[0].replace(/\./g, ""),
        result = parseInt(rupiah);

    return result;
  }
</script>

</body>
</html>
