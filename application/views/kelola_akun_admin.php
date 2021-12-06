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

      width: 70%;
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
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Akun</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>No. Handphone</th>
                      <th class="text-center">
                        <i class="fas fa-edit"></i> /
                        <i class="fas fa-trash-alt"></i>
                      </th>
                    </tr>

                  </thead>
                  <tbody>
                    <?php $int_temp = 1;
                    foreach ($user_all as $row) { ?>
                      <tr>

                        <td><?php echo $int_temp;  ?></td>
                        <td><?php echo $row->nim; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->alamat; ?></td>
                        <td><?php echo $row->nomor_hp; ?></td>
                        <td class="text-center" style="white-space:">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row->id_user; ?>">
                            <i class="fas fa-edit"></i>

                            Edit
                          </button>



                          <a href="#akunhapus<?php echo $row->nim; ?>" data-toggle="modal" data-target="#akunhapus<?php echo $row->nim; ?>" class="btn btn-danger">Hapus
                            <i class="fas fa-user-times"></i>
                          </a>



                        </td>

                      </tr>
                    <?php
                      $int_temp += 1;
                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        <!-- Modal -->

        <?php foreach ($user_all as $row) { ?>
          <div class="modal fade" id="akunhapus<?php echo $row->nim; ?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Notifikasi</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?php echo base_url('admin/delet_akun/' . $row->nim . ''); ?>" method="post">
                    <input type="text" name="nim" value="<?php echo $row->nim; ?>" hidden>
                    <p>Apakah anda yakin untuk menghapus Akun?</p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary"> Hapus </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>


        <?php foreach ($user_all as $row) { ?>
          <div class="modal fade" id="exampleModalCenter<?php echo $row->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Edit Akun</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?php echo base_url('admin/edit/' . $row->nim . ''); ?>" method="post">
                    <div class="card-body">
                      <div class="form-group">

                        <label for="inputClientCompany">NIM</label>
                        <input type="text" name="nim" id="inputClientCompany" class="form-control" value="<?php echo $row->nim; ?>">
                      </div>
                      <div class="form-group">
                        <label for="inputClientCompany">Nama</label>
                        <input type="text" name="nama" id="inputClientCompany" class="form-control" value="<?php echo $row->nama; ?>">
                      </div>
                      <div class="form-group">
                        <label for="inputClientCompany">Alamat</label>
                        <input type="text" name="alamat" id="inputClientCompany" class="form-control" value="<?php echo $row->alamat; ?>">
                      </div>
                      <div class="form-group">
                        <label for="inputClientCompany">Nomor Hp</label>
                        <input type="text" name="nomor_hp" id="inputClientCompany" class="form-control" value="<?php echo $row->nomor_hp; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cars">Access Level :</label>
                        <select name="access">
                          <option value="2" <?php if ($row->access == 2) echo "selected"; ?>>User</option>
                          <option value="1" <?php if ($row->access == 1) echo "selected"; ?>>Admin</option>

                        </select>
                        <br><br>
                      </div>
                      <div class="form-group">
                        <label for="inputClientCompany">Password</label>
                        <input type="password" name="password" id="inputClientCompany" class="form-control" value="">
                      </div>

                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" value="Save Changes">
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>


      </section>
      <!-- /.content -->
    </div>
    <!-- /.card -->
  </div>

  </div>

  <!-- /.content-wrapper -->



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