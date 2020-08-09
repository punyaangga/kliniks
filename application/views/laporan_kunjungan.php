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
            <a class="navbar-brand" href="">Laporan Kunjungan</a>
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
                    <?php
                    $bulan = date('yy-m-d');
                    $pecahBulan = explode('-', $bulan);
                    if ($pecahBulan[1] == '01') {
                      echo "<h4 class='card-title'>"."Tabel Laporan Kunjungan Bulan Januari"."</h4>";
                    }else if($pecahBulan[1]=='02'){
                      echo "<h4 class='card-title'>"."Tabel Laporan Kunjungan Bulan Februari"."</h4>";
                    }else if($pecahBulan[1]=='03'){
                      echo "<h4 class='card-title'>"."Tabel Laporan Kunjungan Bulan Maret"."</h4>";
                    }else if($pecahBulan[1]=='04'){
                      echo "<h4 class='card-title'>"."Tabel Laporan Kunjungan Bulan April"."</h4>";
                    }else if($pecahBulan[1]=='05'){
                      echo "<h4 class='card-title'>"."Tabel Laporan Kunjungan Bulan Mei"."</h4>";
                    }else if($pecahBulan[1]=='06'){
                      echo "<h4 class='card-title'>"."Tabel Laporan Kunjungan Bulan Juni"."</h4>";
                    }else if($pecahBulan[1]=='07'){
                      echo "<h4 class='card-title'>"."Tabel Laporan Kunjungan Bulan Juli"."</h4>";
                    }else if($pecahBulan[1]=='08'){
                      echo "<h4 class='card-title'>"."Tabel Laporan Kunjungan Bulan Agustus"."</h4>";
                    }else if($pecahBulan[1]=='09'){
                      echo "<h4 class='card-title'>"."Tabel Laporan Kunjungan Bulan September"."</h4>";
                    }else if($pecahBulan[1]=='10'){
                      echo "<h4 class='card-title'>"."Tabel Laporan Kunjungan Bulan Oktober"."</h4>";
                    }else if($pecahBulan[1]=='11'){
                      echo "<h4 class='card-title'>"."Tabel Laporan Kunjungan Bulan November"."</h4>";
                    }
                    else if($pecahBulan[1]=='12'){
                      echo "<h4 class='card-title'>"."Tabel Laporan Kunjungan Bulan Desember"."</h4>";
                    }
                    ?>
                  </div>
                  
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table  class="table table-striped table-hover" id="dataTables-example">
                    <thead class="text-primary">
                      <tr>
                      	<th rowspan="2">Jenis Pelayanan</th>
                      	<th colspan="30"><center>Tanggal</center></th>
                      </tr>
                      <tr>
                        <?php for ($i=1; $i <= 31 ; $i++) { 
                          echo "<th>".$i."</th>";
                        }?>
                      	
                      </tr>
                    </thead>
                    <tbody>
                    	<tr>
                    		<td>Pemeriksaan Kehamilan</td>
                        <?php
                          for ($i=1; $i <= 31 ; $i++) { 
                            echo "<td>";
                              foreach ($laporanKehamilan[$i] as $a[$i]){
                                  echo $a[$i]->jmlKunjungan;
                              }
                            echo "</td>";
                    
                          }
                        ?>
                    	</tr>
                    	<tr>
                    		<td>Persalinan</td>
                        <?php
                          for ($i=1; $i <= 31 ; $i++) { 
                            echo "<td>";
                              foreach ($laporanPersalinan[$i] as $a[$i]){
                                  echo $a[$i]->jmlKunjungan;
                              }
                            echo "</td>";
                    
                          }
                        ?>
                    	</tr>
                    	<tr>
                    		<td>Imunisasi</td>
                        <?php
                          for ($i=1; $i <= 31 ; $i++) { 
                            echo "<td>";
                              foreach ($laporanImunisasi[$i] as $a[$i]){
                                  echo $a[$i]->jmlKunjungan;
                              }
                            echo "</td>";
                    
                          }
                        ?>
                    	</tr>
                    	<tr>
                    		<td>Pemeriksaan Umum</td>
                    		<?php
                          for ($i=1; $i <= 31 ; $i++) { 
                            echo "<td>";
                              foreach ($laporanPemUmum[$i] as $a[$i]){
                                  echo $a[$i]->jmlKunjungan;
                              }
                            echo "</td>";
                    
                          }
                        ?>
                    	</tr>
                    	<tr>
                    		<td>Program ISPA</td>
                    		<?php
                          for ($i=1; $i <= 31 ; $i++) { 
                            echo "<td>";
                              foreach ($laporanIspa[$i] as $a[$i]){
                                  echo $a[$i]->jmlKunjungan;
                              }
                            echo "</td>";
                    
                          }
                        ?>
                    	</tr>
                    	<tr>
                    		<td>KB</td>
                    		<?php
                          for ($i=1; $i <= 31 ; $i++) { 
                            echo "<td>";
                              foreach ($laporanKb[$i] as $a[$i]){
                                  echo $a[$i]->jmlKunjungan;
                              }
                            echo "</td>";
                    
                          }
                        ?>
                    	</tr>                 
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
                $('#dataTables-example').dataTable({"ordering": false});
                $('#tableHarusDilayani').dataTable();
                $('#tableSedangDilayani').dataTable();
            });
    </script>
  <!-- js untuk table by Angga -->

</html>