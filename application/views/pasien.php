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
                			<button name="btn_add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</button>
                		</div>
                	</div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="tablePasien" class="table table-striped table-hover">
                    <thead class="text-primary">
                      <th>No.</th>
                      <!-- <th>Jenis Pasien</th> -->
                      <th>No. Rekam Medis</th>
                      <th>Nama Pasien</th>
                      <!-- <th>Tanggal Lahir</th>
                      <th>Penanggung Jawab</th>
                      <th>Tgl. Lahir</th>
                      <th>Kota</th>
                      <th>HPHT</th>
                      <th>Taksiran Partus</th> -->
                      <th style="min-width: 200px;">Aksi</th>
                    </thead>
                    <tbody>
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

          <div id="form" class="col-md-12" style="display: none;">
            <div class="card">
              <div class="card-header">
                <h4 id="formTitle" class="card-title"> Tambah Data</h4>
              </div>
              <div class="card-body">
                <form id="formData">
                	<div class="row">
                    <div class="col-md-12">
                      <h1>Data Umum</h1>
                    </div>
                    <!-- <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Pasien</label>
                        <select name="jenis_pasien" class="form-control">
                          <option value="Bersalin" selected="selected">Bersalin</option>
                          <option value="Sakit">Sakit</option>
                          <option value="Imunisasi">Imunisasi</option>
                          <option value="KB">KB</option>
                          <option value="Poli Gigi">Poli Gigi</option>
                          <option value="Hamil">Hamil</option>
                          <option value="Melahirkan">Melahirkan</option>
                        </select>
                      </div>
                    </div> -->
                		<div class="col-md-12">
                			<div class="form-group">
                				<label>No. Rekam Medis (RM)</label>
                				<input type="text" name="no_registrasi" class="form-control" placeholder="No. Buku / No. Reg" required readonly>
                			</div>
                		</div>
                    <hr>

                    <div class="col-md-12">
                      <h1>Data Pasien</h1>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" placeholder="NIK">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pendidikan Pasien</label>
                        <select name="pendidikan_istri" class="form-control">
                          <option value="Tidak Tamat" selected="selected">Tidak Tamat</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SLTA">SLTA</option>
                          <option value="D1">D1</option>
                          <option value="D3">D3</option>
                          <option value="D4">D4</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Agama Pasien</label>
                        <select name="agama_istri" class="form-control">
                          <option value="Islam" selected="selected">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Protestan">Protestan</option>
                          <option value="Kong Hu Chu">Kong Hu Chu</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pekerjaan Pasien</label>
                        <select name="pekerjaan_istri" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat KTP</label>
                        <input type="text" name="alamat_ktp_istri" class="form-control" placeholder="Alamat KTP">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Domisili</label>
                        <input type="text" name="alamat_istri" class="form-control" placeholder="Alamat Domisili">
                      </div>
                    </div>
                    <hr>

                    <div class="col-md-12">
                      <h1>Data Penanggung Jawab (Suami/Istri/Ibu)</h1>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Ayah Kandung</label>
                        <input type="text" name="nama_ayah_kandung" class="form-control" placeholder="Nama Ayah Kandung">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Penanggung Jawab</label>
                        <input type="text" name="nama_suami" class="form-control" placeholder="Penanggung Jawab" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir_suami" class="form-control" placeholder="Tanggal Lahir Penanggung Jawab" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pendidikan</label>
                        <select name="pendidikan_suami" class="form-control">
                          <option value="Tidak Tamat" selected="selected">Tidak Tamat</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SLTA">SLTA</option>
                          <option value="D1">D1</option>
                          <option value="D3">D3</option>
                          <option value="D4">D4</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Agama</label>
                        <select name="agama_suami" class="form-control">
                          <option value="Islam" selected="selected">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Protestan">Protestan</option>
                          <option value="Kong Hu Chu">Kong Hu Chu</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pekerjaan</label>
                        <select name="pekerjaan_suami" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat KTP</label>
                        <input type="text" name="alamat_ktp_suami" class="form-control" placeholder="Alamat KTP">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Domisili</label>
                        <input type="text" name="alamat_suami" class="form-control" placeholder="Alamat Domisili">
                      </div>
                    </div>
                    <hr>

                    <div class="col-md-12 formTambahan">
                      <h1>Data Tambahan</h1>
                      <!-- <div class="alert alert-danger" role="alert">
                        Catatan: Khusus untuk <b>Kabupaten Bandung Barat</b> silahkan pilih nama desa, selain itu nama desa biarkan "<b>Tidak Ada</b>".
                      </div> -->
                    </div>
                    <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>Kota</label>
                        <select name="id_kota" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>Desa</label>
                        <select name="id_desa" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>Golongan Darah</label>
                        <select name="gol_darah" class="form-control">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="AB">AB</option>
                          <option value="O">O</option>
                          <option value="-" selected="selected">-</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>No Telp / WA</label>
                        <input type="text" name="no_telp_pasien" class="form-control" placeholder="No Telepon">
                      </div>
                    </div>
                    <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>Alamat Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Alamat Email">
                      </div>
                    </div>
                    <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>Medsos</label>
                        <input type="text" name="medsos" class="form-control" placeholder="Medsos">
                      </div>
                    </div>
                    <!-- <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>Gravida (G)</label>
                        <input type="number" name="gravida" class="form-control" placeholder="Gravida">
                      </div>
                    </div>
                    <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>Para (P)</label>
                        <input type="number" name="para" class="form-control" placeholder="Para">
                      </div>
                    </div>
                    <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>Abortus (A)</label>
                        <input type="number" name="abortus" class="form-control" placeholder="Abortus">
                      </div>
                    </div>
                    <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>HPHT</label>
                        <input type="date" name="hpht" class="form-control" placeholder="HPHT">
                      </div>
                    </div>
                    <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>Siklus</label>
                        <input type="number" name="siklus" class="form-control" placeholder="Siklus">
                      </div>
                    </div>
                    <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>Durasi Haid</label>
                        <input type="number" name="durasi_haid" class="form-control" placeholder="Durasi Haid">
                      </div>
                    </div>
                    <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>Taksiran Partus</label>
                        <input type="date" name="taksiran_partus" class="form-control" placeholder="Taksiran Partus">
                      </div>
                    </div> -->
                    <div class="col-md-12 formTambahan">
                      <div class="form-group">
                        <label>Catatan Bidan</label>
                        <select name="catatan_bidan" class="form-control" multiple>
                          <option value="Metoda REFRESH">Metoda REFRESH</option>
                          <option value="TP (Catat & Masukan Ke KTP)">TP (Catat & Masukan Ke KTP)</option>
                          <option value="Rencana Persalinan">Rencana Persalinan</option>
                          <option value="Brosur">Brosur</option>
                          <option value="Tanda Persalinan >= 37 mgg">Tanda Persalinan >= 37 mgg</option>
                          <option value="Breast Care >= 37 mgg">Breast Care >= 37 mgg</option>
                        </select>
                      </div>
                    </div>
                	</div>
                </form>
              </div>
              <div class="card-footer row">
              	<div class="col-md-2">
            			<button id="0" name="btn_save" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save</button>
            		</div>
            		<div class="col-md-2">
            			<button name="btn_cancel" class="btn btn-danger btn-block"><i class="fa fa-times"></i> Cancel</button>
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
</body>

</html>