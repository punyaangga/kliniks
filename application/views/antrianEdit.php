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
    Klinik Nur Khadijah | Dashboard
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
            <a class="navbar-brand" href="">Dashboard</a>
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

      <!-- start content -->
      <div class="content">
    <!-- start = row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card" >
              <div class="card-header">
                <div class="row">
                  <div class="col-12">
                    <h4 class="card-title"> Tambah kunjungan </h4>
                    <hr>
                  </div>
                </div>
              </div>
              <!-- start = body form tambah kunjungan -->
              <div class="card-body">
                  <div class="row">
                    <?php
                      foreach ($query->result() as $kp ) { ?>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Jenis Pelayanan</label>
                              <br>
                              <input type="text" value="<?php echo $kp->nama_pelayanan;?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Pasien</label>
                                             
                                <input type="text" class="form-control" value="<?php echo $kp->nama_pasien;?>" readonly>
                           
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Dokter</label>
                            <input type="text" class="form-control" value="<?php echo $kp->nama_dokter;?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>No. Antrian</label>
                            <textarea id="noPelayanan" name="noAntrian" class="form-control" style="height:30px; padding-top: 5px; padding-left: 20px;" readonly><?php echo $kp->no_antrian;?> </textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tanggal Kunjungan</label>
                            <input type="text" name="tgl_antrian" class="form-control" placeholder="Tanggal Antrian" value="<?php echo $kp->tgl_antrian;?>" required readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Kode Antrian</label>
                            <input type="text" name="kode_antrian" class="form-control" placeholder="Kode Antrian" value="<?php echo $kp->kode_antrian;?>"readonly>
                          
                            
                          </div>
                        </div>
                       <?php } ?>
                      </div>
                      <div class="modal-footer">
                       <!--  <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                       
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</button> -->
                      </div>    
                

              </div>
              <!-- end = body form tambah kunjungan -->
              <?php 
                  $jenisPelayanan = $this->uri->segment(4);
                  if($jenisPelayanan == 'PemeriksaanKehamilan'){ ?>
              <!-- start form pemeriksaan kehamilan -->
                  <form method="post" action="#">     
                  <div id="1" class="myDiv">
                    <div class="modal-body">
                        <div class="row">                         
                          <div class="col-md-12">
                            <h3><b>Hasil Pemeriksaan Awal:</b></h3>
                          </div>
                          <?php foreach ($query->result() as $kp ) { ?>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Tanggal Lahir</label>
                              <input type="date" name="tglLahir" value="<?php echo $kp->tgl_lahir;?>" class="form-control" placeholder="Tanggal Lahir" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>NIK</label>
                              <input type="text" name="nik" class="form-control" value="<?php echo $kp->nik;?>" placeholder="NIK" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Umur</label>
                              <?php
                                //waktu sekarang
                                $tglSekarang = date('yy-m-d');
                                $waktuSekarang = explode('-', $tglSekarang);
                                //tgl lahir pasien
                                $tglPasien= $kp->tgl_lahir;
                                $waktuPasien = explode('-',$tglPasien);
                                //hitung umur
                                $getHari = $waktuSekarang[2] - $waktuPasien[2];
                                $getBulan = $waktuSekarang[1] - $waktuPasien [1];
                                $getTahun = $waktuSekarang[0] - $waktuPasien [0];
                                //hasil umur
                                $umurPasien=abs($getTahun)." Tahun ".abs($getBulan)." Bulan ".abs($getHari)." Hari"; 
                                
                              ?>
                              <input type="text" name="umur" value="<?php echo $umurPasien;?>"  class="form-control" placeholder="Umur" readonly required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Nama Suami</label>
                              <input type="text" name="namaSuami" value="<?php echo $kp->nama_suami;?>"class="form-control" placeholder="Nama Suami" readonly required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>No. KK</label>
                                  <input type="text" name="noKk" value="<?php echo $kp->no_kk;?>" class="form-control" placeholder="No. KK" readonly>  
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Alamat</label>
                              <textarea name="alamat" class="form-control" placeholder="Alamat" readonly><?php echo $kp->alamat_ktp_istri;?>  </textarea>
                            </div>
                          </div>
                          <?php } ?>

                          <!-- diagnosa pemeriksaan kehamilan-->
                          
                            <?php foreach ($getPk->result() as $gpk) { ?>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>KIA</label>
                                <select name="bukuKia" class="form-control">
                                  <option><?php echo $gpk->buku_kia;?></option>
                                  <option value="Lama">Lama</option>
                                  <option value="Laru">Baru</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>HPHT</label>
                                <input type="date" name="hpht" value="<?php echo $gpk->hpht;?>" class="form-control" placeholder="HPHT" >
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>TP</label>
                                <input type="date" name="tp" class="form-control" value="<?php echo $gpk->tp;?>" placeholder="TP" >
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>BB</label>
                                <input type="number" name="bb" class="form-control" value="<?php echo $gpk->bb;?>" placeholder="Berat Badan" >
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>TB</label>
                                <input type="number" name="tb" class="form-control"value="<?php echo $gpk->tb;?>" placeholder="Tinggi Badan" >
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Usia Kehamilan (minggu)</label>
                                <input type="text" name="usiaKehamilan" class="form-control" value="<?php echo $gpk->usia_kehamilan;?>"placeholder="Usia Kehamilan">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>GPA</label>
                                <input type="text" name="gpa" value="<?php echo $gpk->gpa;?>" class="form-control" placeholder="GPA" >
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>K1</label>
                                <select name="k1" class="form-control">
                                  <option value="<?php echo $gpk->k1;?>">
                                    <?php if($gpk->k1 == 1){
                                        echo "Ya";
                                      } else {
                                        echo "Tidak";
                                      }
                                    ?>
                                  </option>
                                  <option value="1">Ya</option>
                                  <option value="0">Tidak</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>K4</label>
                                <select name="k4" class="form-control">
                                  <option value="<?php echo $gpk->k4;?>">
                                    <?php if($gpk->k4 == 1){
                                        echo "Ya";
                                      } else {
                                        echo "Tidak";
                                      }
                                    ?>
                                  </option>
                                  <option value="1">Ya</option>
                                  <option value="0">Tidak</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>TT</label>
                                <input type="text" name="tt" value="<?php echo $gpk->tt; ?>" class="form-control" placeholder="TT">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>LILA (cm)</label>
                                <input type="number" name="lila" value="<?php echo $gpk->lila; ?>"class="form-control" placeholder="LILA (cm)" >
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Hb (g/dl)</label>
                                <input type="number" name="hb" class="form-control" value="<?php echo $gpk->hb; ?>"placeholder="Hb (g/dl)">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Resiko</label>
                                <textarea name="resiko" class="form-control"><?php echo $gpk->resiko; ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Keterangan (10 T, Jumlah Fe)</label>
                                <textarea name="keterangan" class="form-control"><?php echo $gpk->keterangan; ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Keterangan Hamil</label>
                                <select name="baruLama" class="form-control">
                                  <option value="<?php $gpk->baru_lama; ?>"><?php echo $gpk->baru_lama; ?></option>
                                  <option value="BARU">Baru</option>
                                  <option value="LAMA">Lama</option>
                                </select>
                              </div>
                            </div>  
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Catatan</label>
                                <textarea name="catatan" class="form-control"><?php echo $gpk->catatan?></textarea>
                              </div>
                            </div>
                            <?php } ?>
                          </div>
                          <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button> -->
                            <button class="btn btn-sm btn-success"><i class="fa fa-check"></i> Selesai</button>
                          </div>
                     
                    </div>
                  </div>
                  </form>
                  
                  <!-- start pemeriksaan kb -->
                        <?php } else if($jenisPelayanan == 'KB'){
                              echo "KB";
                            }
                        ?>
                          
            <!-- end form pemeriksaan kehamilan -->

            </div>
          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- end content -->
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
  <script src="<?php echo base_url('assets/js/admina.dashboard.js'); ?>" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/select2/js/select2.min.js'); ?>"></script>
  
  <!-- untuk antrian -->
  <script>
        $(document).ready(function() {
            $('#jp').change(function() {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Pasien/getNoPelayanan') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('#noPelayanan').html(response);

                    }
                });
            });
          $('#jp').select2({'theme': 'bootstrap4'});

            
        });
    </script>
  <!-- untuk antrian -->
  
   <!-- js untuk table by angga-->
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
                $('#tableHarusDilayani').dataTable();
                $('#tableSedangDilayani').dataTable();
            });
    </script>
  <!-- js untuk table by Angga -->

  <!-- js untuk pencarian di inputan select -->
  <script type="text/javascript">
   $(document).ready(function() {
       $('#namPenyakit').select2({'theme': 'bootstrap4'});
       $('#renUmur').select2({'theme': 'bootstrap4'});
       $('#tindakan').select2({'theme': 'bootstrap4'});
       $('#satUsia').select2({'theme': 'bootstrap4'});
       $('#pasBaru').select2({'theme': 'bootstrap4'});
       $('#pasCabut').select2({'theme': 'bootstrap4'});
       $('#alatKontra').select2({'theme': 'bootstrap4'});
       $('#fourT').select2({'theme': 'bootstrap4'});
       $('#macTindakan').select2({'theme': 'bootstrap4'});
       
       $('#pasien').select2({'theme': 'bootstrap4'});
       $('#dokter').select2({'theme': 'bootstrap4'});
   });
  </script>
  <!-- js untuk pencarian di inputan select -->
  
  <!-- js untuk hitung jumlah anak -->
  <script type="text/javascript">
    $(document).ready(function() {
        $("#anakL, #anakP").keyup(function() {
            var anakL  = $("#anakL").val();
            var anakP = $("#anakP").val();

            var jmlAnak = parseInt(anakL) + parseInt(anakP);
            $("#jmlAnak").val(jmlAnak);
        });
    });

    $(document).ready(function() {
        $("#anakLL, #anakPP").keyup(function() {
            var anakLL  = $("#anakLL").val();
            var anakPP = $("#anakPP").val();

            var jmlAnak = parseInt(anakLL) + parseInt(anakPP);
            $("#jmlAnakk").val(jmlAnakk);
        });
    });
  </script>
  <script>
    // function cetak() {
    //     return window.print();
    // }
    </script>
  <!-- js untuk hitung jumlah anak -->
</body>

</html>