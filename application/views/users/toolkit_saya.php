<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasai Peminjaman Toolkit </title>

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


</head>
<style>
  .container1 {
    width: 350px;
    margin: auto;
  }

  .progressbar {
    counter-reset: step;
  }

  .progressbar li {
    list-style-type: none;
    width: 16.6667%;
    float: left;
    font-size: 12px;
    position: relative;
    text-align: center;
    text-transform: uppercase;
    color: #7d7d7d;
  }

  .progressbar li:before {
    width: 30px;
    height: 30px;
    content: counter(step);
    counter-increment: step;
    line-height: 30px;
    border: 2px solid #7d7d7d;
    display: block;
    text-align: center;
    margin: 0 auto 10px auto;
    border-radius: 50%;
    background-color: white;
  }

  .progressbar li:after {
    width: 100%;
    height: 2px;
    content: counter(step);
    position: absolute;
    background-color: #7d7d7d;
    top: 15px;
    left: -50%;
    z-index: -1;
    border-bottom-color: yellowgreen;
  }

  .progressbar li:first-child:after {
    content: none;
  }

  .progressbar li.active {
    color: green;
  }

  .progressbar li.active:before {
    border-color: #55b776;
  }

  .progressbar li.active+li:after {
    background-color: #55b776;
  }

  .progressbar li.declined {
    color: red;
  }

  .progressbar li.declined:before {
    border-color: #FF0000;
  }

  .progressbar li.declined+li:after {
    background-color: #FF0000;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?php echo base_url('dist/img/AdminLTELogo.png'); ?>" alt="AdminLTELogo" height="60" width="60">
    </div>





    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Sistem Informasi Peminjaman Toolkit</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active"> Toolkit Saya</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <!-- Small boxes (Stat box) -->



          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Toolkit Saya</h3>
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
                        <th>ID Toolkit</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Waktu Pinjam</th>
                        <th>Alamat</th>

                        <th class="text-center">Tracking</th>
                        <th class="text-center">
                          <i class="fas fa-edit"></i> /
                          <i class="fas fa-paper-plane"></i>
                        </th>
                      </tr>

                    </thead>
                    <tbody>
                      <?php
                      foreach ($toolkit as $row) { ?>
                        <tr>

                          <td><?php echo $row->id_toolkit;  ?></td>
                          <td><?php echo $row->id_peminjam; ?></td>
                          <td><?php echo $row->nama; ?></td>
                          <td><?php echo $row->waktu_pinjam; ?></td>
                          <td><?php echo $row->alamat; ?></td>

                          <td>
                            <ul class='progressbar' style="overflow:hidden; white-space:nowrap">
                              <?php
                              $progress = $row->status;
                              if (1 <= $progress and $progress <= 6) {
                                $class_name = 'active';
                              }
                              if (2 <= $progress and $progress < 6) {
                                $class_name2 = 'active';
                              }
                              if (3 <= $progress and $progress < 6) {
                                $class_name3 = 'active';
                              }
                              if (4 <= $progress and $progress < 6) {
                                $class_name4 = 'active';
                              }
                              if (5 <= $progress and $progress < 6) {
                                $class_name5 = 'active';
                              }
                              if ($progress == 6) {
                                $class_name6 = 'declined';
                              } ?>
                              <li class='<?php echo $class_name; ?>' data-toggle='tooltip' title='Pengajuan'>Pengajuan</li>
                              <li class='<?php echo $class_name6; ?>' data-toggle='tooltip' title='Selesai'>Ditolak</li>
                              <li class='<?php echo $class_name2; ?>' data-toggle='tooltip' title='Dikirim'>Dikirim</li>
                              <li class='<?php echo $class_name3; ?>' data-toggle='tooltip' title='Diterima'>Diterima</li>
                              <li class='<?php echo $class_name4; ?>' data-toggle='tooltip' title='Diterima'>Dikembalikan</li>
                              <li class='<?php echo $class_name5; ?>' data-toggle='tooltip' title='Selesai'>Selesai</li>

                            </ul>
                          </td>
                          <td class="text-center" style="white-space:">
                            <a href="#toolkit<?php echo $row->id_toolkit; ?>" data-toggle="modal" data-target="#toolkit<?php echo $row->id_toolkit; ?>" class="btn btn-primary <?php if ($row->status != 2) {
                                                                                                                                                                                  echo 'disabled';
                                                                                                                                                                                } ?>">
                              <i class="fas fa-edit"></i>

                              Diterima
                            </a>


                            <a href="#toolkitKembalikan<?php echo $row->id_toolkit; ?>" data-toggle="modal" data-target="#toolkitKembalikan<?php echo $row->id_toolkit; ?>" class="btn btn-success <?php $x = $row->status;
                                                                                                                                                                                                    if ($x != 3) {
                                                                                                                                                                                                      echo 'disabled';
                                                                                                                                                                                                    } ?>">kembalikan
                              <i class="fas fa-paper-plane"></i>
                            </a>

                            <!-- <a href="<?php echo base_url('akun/dikembalikan/' . $row->id_peminjaman . ''); ?>" class="btn btn-success <?php $x = $row->status;
                                                                                                                                            if ($x != 3) {
                                                                                                                                              echo 'disabled';
                                                                                                                                            } ?>">kembalikan
                              <i class="fas fa-paper-plane"></i>
                            </a>
 -->


                          </td>

                        </tr>
                      <?php

                      } ?>

                      <?php foreach ($toolkit as $row) { ?>
                        <div class="modal fade" id="toolkit<?php echo $row->id_toolkit; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Notifikasi</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="<?php echo base_url('akun/disetujui/' . $row->id_peminjaman . ''); ?>" method="post">
                                  <div class="form-group">
                                    <label for="peminjam">Nomor Resi Pengiriman</label>
                                    <input type="text" name="id_toolkit" class="form-control" id="id_toolkit" value="<?php echo $row->id_toolkit; ?> " hidden>
                                    <input type="text" class="form-control" id="resi" value="<?php echo $row->resi_peminjaman; ?>" readonly>
                                  </div>
                                  <p>Apakah Toolkit sudah diterima?</p>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"> Konfirmasi Penerimaan </button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>



                      <?php foreach ($toolkit as $row) { ?>
                        <div class="modal fade" id="toolkitKembalikan<?php echo $row->id_toolkit; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Notifikasi</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="text" name="id_toolkit" class="form-control" id="id_toolkit" value="<?php echo $row->id_toolkit; ?>" hidden>
                                <form action="<?php echo base_url('akun/dikembalikan/' . $row->id_peminjaman . ''); ?>" method="post">
                                  <p>Apakah anda yakin untuk mengembalikan Toolkit pada Admin?</p>
                                  <input type="text" class="form-control" name="resikembali" id="resikembali" value="" required>
                              </div>
                              <div class="modal-footer justify-content-between">

                                <button type="submit" class="btn btn-primary"> Kembalikan </button>
                                </form>
                                <form action="<?php echo base_url('akun/diselesaikan/' . $row->id_peminjaman . ''); ?>" method="post">
                                  <input type="text" name="id_toolkit" class="form-control" id="id_toolkit" value="<?php echo $row->id_toolkit; ?>" hidden>
                                  <button type="submit" class="btn btn-primary"> Selesaikan </button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Daftar Permintaan</h3>
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
                        <th>ID Toolkit</th>
                        <th>NIM</th>
                        <th>Nama Peminjam</th>
                        <th>Waktu Pinjam</th>
                        <th>Alamat</th>
                        <th>kontak</th>

                        <th class="text-center">
                          <i class="fas fa-edit"></i> /
                          <i class="fas fa-user-times"></i>
                        </th>
                      </tr>

                    </thead>
                    <tbody>
                      <?php
                      foreach ($peminjaman as $row0) { ?>
                        <tr>

                          <td><?php echo $row0->id_toolkit;  ?></td>
                          <td><?php echo $row0->id_peminjam; ?></td>
                          <td><?php echo $row0->nama; ?></td>
                          <td><?php echo $row0->waktu_pinjam; ?></td>
                          <td><?php echo $row0->alamat; ?></td>
                          <td><?php echo $row0->nomor_hp; ?></td>

                          <td class="text-center" style="white-space:">
                            <a href="#toolkitKirimu<?php echo $row0->id_peminjaman; ?>" data-toggle="modal" data-target="#toolkitKirimu<?php echo $row0->id_peminjaman; ?>" class="btn btn-primary">
                              <i class="fas fa-edit"></i>

                              Setujui
                            </a>


                            <a href="#toolkitTolaku<?php echo $row0->id_peminjaman; ?>" data-toggle="modal" data-target="#toolkitTolaku<?php echo $row0->id_peminjaman; ?>" class="btn btn-danger">Tolak
                              <i class="fas fa-user-times"></i>
                            </a>



                          </td>

                        </tr>
                      <?php

                      } ?>
                    </tbody>
                  </table>
                </div>
                <?php foreach ($peminjaman as $row0) { ?>
                  <div class="modal fade" id="toolkitKirimuu<?php echo $row0->id_peminjaman; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Setujui Permintaan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <form action="<?php echo base_url('toolkit/penyetujuanuu/' . $row0->id_peminjaman . ''); ?>" method="post">
                          <div class="modal-body">
                            <input type="text" name="id_toolkit" value="<?php echo $row0->id_toolkit; ?>" hidden>

                            <p>Masukkan Data Resi Pengiriman</p>
                            <input type="text" class="form-control" name="resi" id="resi" value="" required>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> Konfirmasi </button>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>


                <?php } ?>
                <?php foreach ($peminjaman as $row0) { ?>
                  <div class="modal fade" id="toolkitKirimu<?php echo $row0->id_peminjaman; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Setujui Permintaan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <form action="<?php echo base_url('toolkit/penyetujuanuu/' . $row0->id_peminjaman . ''); ?>" method="post">
                          <div class="modal-body">
                            <input type="text" name="id_toolkit" value="<?php echo $row0->id_toolkit; ?>" hidden>

                            <p>Masukkan Data Resi Pengiriman</p>
                            <input type="text" class="form-control" name="resi" id="resi" value="" required>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> Konfirmasi </button>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>


                <?php } ?>


                <?php foreach ($peminjaman as $row0) { ?>
                  <div class="modal fade" id="toolkitTolaku<?php echo $row0->id_peminjaman; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Notifikasi</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo base_url('toolkit/penolakanu/' . $row0->id_peminjaman . ''); ?>" method="post">
                            <input type="text" name="id_toolkit" value="<?php echo $row0->id_toolkit; ?>" hidden>
                            <p>Apakah anda yakin untuk Menolak Peminjaman?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary"> Tolak </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <!-- /.row -->
              <!-- Control Sidebar -->
              <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
              </aside>
              <!-- /.control-sidebar -->
            </div>

            <!-- /.modal-content -->




            <!-- /.modal -->
            <!-- ./wrapper -->

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
            <aside class="control-sidebar control-sidebar-dark">
              <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
          </div>
        </div>
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