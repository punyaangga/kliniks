<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Klinik Nur Khadijah | Pasien
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="<?php echo base_url('assets/css/gf.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/fa/css/all.min.css'); ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/now-ui-dashboard.css?v=1.3.0'); ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url('assets/demo/demo.css'); ?>" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.min.css'); ?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/select2/css/select2.min.css'); ?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/select2/css/select2-bootstrap4.css'); ?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css'); ?>">
  <script type="text/javascript">
    var baseurl = "<?php echo base_url(); ?>";
  </script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    	-->
      <div class="logo">
        <a href="<?php echo base_url(); ?>" class="simple-text logo-mini">
          <i class="now-ui-icons media-2_sound-wave"></i>
        </a>
        <a href="<?php echo base_url(); ?>" class="simple-text logo-normal">
          Klinik Nur Khadijah
        </a>
      </div>
      <?php $this->load->view('sidebar'); ?>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="">Pasien</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="menuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuProfile">
                  <a class="dropdown-item" href="#">
										<i class="now-ui-icons users_single-02"></i>
										<p>Profile</p>
									</a>
									<a class="dropdown-item" href="<?php echo base_url('dashboard/logout/'); ?>">
										<i class="now-ui-icons media-1_button-power"></i>
										<p>Logout</p>
									</a>
                </div>
							</li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div id="table" class="col-md-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                	<div class="col-6">
                		<h4 class="card-title"> Tabel Pasien</h4>
                	</div>
                	<div class="col-6">
                		<div class="pull-right">
                			<a href="<?php echo base_url('Pasien/pendaftaranBaru');?>"class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                		</div>
                	</div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="dataTables-example" class="table table-striped table-hover">
                    <thead class="text-primary">
                      <th>No.</th>
                      <th>No. Rekam Medis</th>
                      <th>Nama Pasien</th>
                      <th style="min-width: 200px;">Aksi</th>
                    </thead>
                    <tbody>
                      <?php
                          $no=1;
                          foreach ($tPasien->result() as $tp) {
                      ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $tp->no_registrasi;?></td>
                        <td><?php echo $tp->nama_pasien;?></td>
                        <td>
                          <?php  echo anchor('Pasien/getDataKunjungan/'.$tp->id,'<button class="btn btn-success btn-sm" title="Layani"><i class="fa fa-check"></i></button>'); ?>
                          <a href="<?php echo base_url('Pasien/detailPasien/'.$tp->id.'');?>"><button class="btn btn-default btn-sm" title="Lihat Detail"><i class="fa fa-search"></i></button> 
                          <a href="<?php echo base_url('CetakKartu/CetakKartuPasien/'.$tp->id.'');?>"target="_blank"><button class="btn btn-warning btn-sm" title="Cetak Karu Pasien"><i class="fa fa-print"></i></button></a>
                          <button class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-edit"></i></button>
                          <button class="btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></button></td>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 table-detail">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="tableDetail" class="table table-striped table-hover">
                    <tbody>
                      <tr>
                        <td>No. RM</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>NIK</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Tgl. Lahir</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Pendidikan</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Pekerjaan</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Alamat KTP</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Domisili</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Ayah Kandung</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Suami</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Tgl. Lahir Suami</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Pendidikan Suami</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Agama Suami</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Pekerjaan Suami</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Alamat KTP Suami</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Domisili Suami</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Kontak</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Medsos</td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="table-responsive" style="max-height: 500px;">
                  <table id="tableRM" class="table table-striped table-hover">
                    <thead>
                      <th>Waktu Kunjungan</th>
                      <th>Jenis Pelayanan</th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/js/core/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/core/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/core/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js'); ?>"></script>
  <!-- Chart JS -->
  <script src="<?php echo base_url('assets/js/plugins/chartjs.min.js'); ?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js'); ?>"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('assets/js/now-ui-dashboard.min.js?v=1.3.0'); ?>" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url('assets/demo/demo.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/admina.pasien.js'); ?>" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/select2/js/select2.min.js'); ?>"></script>

    <!-- untuk table -->
  <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable({"ordering": false});
            });
    </script>
</body>

</html>