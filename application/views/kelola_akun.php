<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIP Toolkit | Kelola Akun</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/jqvmap/jqvmap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/summernote/summernote-bs4.min.css'); ?>">
  <style>
    section {

      width: 80%;
      margin-right: auto;
      margin-left: auto;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">





    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Kelola Akun</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Kelola Akun</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Akun</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <?php foreach ($users as $row) { ?>
                <form action="<?php echo base_url('Akun/updateAkun/' . $row->nim); ?>" method="post">
                  <div class="card-body">
                    <div class="form-group">

                      <label for="inputClientCompany">NIM</label>
                      <input type="text" name="nim" id="inputClientCompany" class="form-control" value="<?php echo $access = $row->nim; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="inputClientCompany">Nama</label>
                      <input type="text" name="nama" id="inputClientCompany" class="form-control" value="<?php echo $access = $row->nama; ?>">
                    </div>
                    <div class="form-group">
                      <label for="inputClientCompany">Alamat</label>
                      <input type="text" name="alamat" id="inputClientCompany" class="form-control" value="<?php echo $access = $row->alamat; ?>">
                    </div>
                    <div class="form-group">
                      <label for="inputClientCompany">Nomor Hp</label>
                      <input type="text" name="nomor_hp" id="inputClientCompany" class="form-control" value="<?php echo $access = $row->nomor_hp; ?>">
                    </div>
                    <div class="form-group">
                      <label for="inputClientCompany">Password</label>
                      <input type="password" name="password" id="inputClientCompany" class="form-control" value="">
                    </div>
                  <?php } ?>
                  </div>
                  <!-- /.card-body -->
            </div>
            <div class="row">
              <div class="col-12">
                <a href="<?php echo base_url("Welcome/homepage"); ?>" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Perbarui Data" class="btn btn-success float-right">
              </div>

            </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.card -->
  </div>

  </div>

  <!-- /.content-wrapper -->


  <script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("<?php echo $mq_solarium; ?>");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("chiudi_dimensione")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "flex";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url('plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- ChartJS -->
  <script src="<?php echo base_url('plugins/chart.js/Chart.min.js'); ?>"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url('plugins/sparklines/sparkline.js'); ?>"></script>
  <!-- JQVMap -->
  <script src="<?php echo base_url('plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url('plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url('plugins/moment/moment.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
  <!-- Summernote -->
  <script src="<?php echo base_url('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('dist/js/adminlte.js'); ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('dist/js/demo.js'); ?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url('dist/js/pages/dashboard.js'); ?>"></script>
</body>

</html>