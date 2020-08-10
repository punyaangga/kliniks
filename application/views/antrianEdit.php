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
    Klinik Nur Khadijah | Kunjungan
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
            <a class="navbar-brand" href="">Kunjungan</a>
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
          <div id="table" class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-6">
                    <h4 class="card-title">Form Edit Kunjungan</h4>
                  </div>
                </div>
              </div>
              <div class="card-body">

                <form class="needs-validation" action="<?php echo base_url('Antrian/updateDataKunjungan');?>" method="POST">
                  <div class="row">
                    
                    <div class="col-md-6">
                      <div class="form-group">

                        <input type="text" hidden name="id" value="<?php echo $this->uri->segment(3);?>">
                        <label>Jenis Pelayanan</label>
                        <select class="form-control" name="namaPelayanan" id="sJp">
                          <?php foreach ($query->result() as $row) { ?>
                            <option value="<?php echo $row->idPelayanan;?>"><?php echo $row->nama_pelayanan;?></option>
                          <?php } ?>

                          <?php foreach ($pelayanan as $pel) : ?>
                            <option value="<?= $pel['id']; ?>"><?= $pel['nama_pelayanan']; ?></option>
                          <?php endforeach; ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Pasien</label>
                        <select class="form-control" name="namaPasien" id="sNamaPasien">
                          <?php foreach ($query->result() as $row) { ?>
                          <option value="<?php echo $row->idPasien;?>"><?php echo $row->nama_pasien;?></option>
                          <?php } ?>

                          <?php foreach ($allPasien->result() as $ap) { ?>
                          <option value="<?php echo $ap->id;?>"><?php echo $ap->nama_pasien;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Dokter</label>
                        <select class="form-control" name="namaDokter" id="sDokter">
                          <?php foreach ($query->result() as $row) { ?>
                          <option value="<?php echo $row->idDokter;?>"><?php echo $row->nama_dokter;?></option>
                          <?php } ?>

                          <?php foreach ($allDokter->result() as $ad) { ?>
                          <option value="<?php echo $ad->id;?>"><?php echo $ad->nama_dokter;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No Antrian</label>
                        <?php foreach ($query->result() as $row) { ?>
                        <textarea class="form-control" name="noAntrian" id="noPelayanan" style="height:30px; padding-top: 5px; padding-left: 20px;" readonly> <?php echo $row->no_antrian;?> </textarea>
                       
                        <?php } ?>
                        
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal Kunjungan</label>
                        <?php foreach ($query->result() as $row) { ?>
                          <input type="text" name="tglAntrian" class="form-control" value="<?php echo $row->tgl_antrian;?>" readonly>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kode Antrian</label>
                        <?php foreach ($query->result() as $row) { ?>
                          <input type="text" name="kodeAntrian" class="form-control" value="<?php echo $row->kode_antrian;?>" readonly>
                        <?php } ?>
                      </div>
                    </div>
                  </div>

                  <div class="card-footer row">
                    <div class="col-md-2">
                      <button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save</button>
                    </div>
                    <div class="col-md-2">
                      <a href="<?php echo base_url('index.php/Antrian');?>" class="btn btn-danger btn-block" ><i class="fa fa-times"></i> Cancel</a>
                    </div>
                  </div>
                </form>

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
  <script src="<?php echo base_url('assets/js/admina.antrian.js'); ?>" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/select2/js/select2.min.js'); ?>"></script>
</body>

 <!-- js untuk form tipe select -->
    <script>
        $(document).ready(function() {
            $('#sJp').change(function() {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Antrian/getNoPelayanan') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('#noPelayanan').html(response);

                    }
                });
            });
          $('#sJp').select2({'theme': 'bootstrap4'});
          $('#sNamaPasien').select2({'theme': 'bootstrap4'});
          $('#sDokter').select2({'theme': 'bootstrap4'});

            
        });
    </script>
  <!-- js untuk form tipe select -->


<!-- js untuk table by angga-->
    <script>
            $(document).ready(function () {
                //ordering:false,targets:0 berfungsi untuk mematikan fitur ordering data tables pada kolom 1
                $('#dataTables-example').dataTable({"ordering": false,"targets":0});
                $('#tableHarusDilayani').dataTable();
                $('#tableSedangDilayani').dataTable();
            });
    </script>
  <!-- js untuk table by Angga -->

 

</html>