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
      <div class="content">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header card-antrian">
                <div class="card-category d-flex justify-content-center">0</div>
                <div class="card-title d-flex justify-content-center">Kunjungan</div>
              </div>
              <div class="card-body d-flex justify-content-center">
                <i class="fa fa-users fa-10x"></i>
              </div>
              <div class="card-footer">
                <a href="#tambahKunjungan">Tambah Kunjungan <i class="fa fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header card-pembayaran">
                <div class="card-category d-flex justify-content-center">0</div>
                <div class="card-title d-flex justify-content-center">Pembayaran</div>
              </div>
              <div class="card-body d-flex justify-content-center">
                <i class="fa fa-money-bill-wave fa-10x"></i>
              </div>
              <div class="card-footer">
                <a href="<?php echo base_url('pembayaran/'); ?>">Tambah Pembayaran <i class="fa fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header card-pasien">
                <div class="card-category d-flex justify-content-center">!</div>
                <div class="card-title d-flex justify-content-center">Pasien</div>
              </div>
              <div class="card-body d-flex justify-content-center">
                <i class="fa fa-book fa-10x"></i>
              </div>
              <div class="card-footer">
                <a href="#tambahPasien">Tambah Pasien Baru <i class="fa fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div id="table" class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                	<div class="col-6">
                		<h4 class="card-title"> Pasien yang harus dilayani: </h4>
                	</div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="tableDilayani" class="table table-striped table-hover">
                    <thead class="table-danger">
                      <th>No. Antrian</th>
                      <th>Nama Pasien</th>
                      <th>Jenis Pelayanan</th>
                      <th>Dokter</th>
                      <th>Status</th>
                      <th>Waktu</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div id="table" class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-6">
                    <h4 class="card-title"> Pasien yang sedang dilayani: </h4>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="tableProses" class="table table-striped table-hover">
                    <thead class="table-warning">
                      <th>No. Antrian</th>
                      <th>Nama Pasien</th>
                      <th>Jenis Pelayanan</th>
                      <th>Dokter</th>
                      <th>Status</th>
                      <th>Waktu</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div id="table" class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-6">
                    <h4 class="card-title"> Pasien yang sudah dilayani: </h4>
                  </div>
                  <div class="col-3">
                    
                  </div>
                  <div class="col-3 form-group">
                    <label><b>Filter Hari:</b></label>
                    <input type="date" name="filterDate" class="form-control">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="tableTerlayani" class="table table-striped table-hover table-success">
                    <thead class="text-primary">
                      <th>No. Antrian</th>
                      <th>Nama Pasien</th>
                      <th>Jenis Pelayanan</th>
                      <th>Dokter</th>
                      <th>Status</th>
                      <th>Tanggal</th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="tambahKunjungan" role="dialog" aria-labelledby="tambahKunjunganLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tambahKunjunganLabel">Tambah Kunjungan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formDataTambahKunjungan">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jenis Pelayanan</label>
                        <select name="id_jenis_pelayanan" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Pasien</label>
                        <select name="id_pasien" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Dokter</label>
                        <select name="id_dokter" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. Antrian</label>
                        <input type="number" name="no_antrian" class="form-control" placeholder="No. Antrian" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal Kunjungan</label>
                        <input type="text" name="tgl_antrian" class="form-control" placeholder="Tanggal Antrian" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kode Antrian</label>
                        <input type="text" name="kode_antrian" class="form-control" placeholder="Kode Antrian" readonly>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button id="0" name="btn_tambah_kunjungan" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="tambahPasien" role="dialog" aria-labelledby="tambahPasienLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tambahPasienLabel">Tambah Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formDataTambahPasien">
                  <div class="row">
                    <div class="col-md-12">
                      <h1>Data Umum</h1>
                    </div>
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
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button id="0" name="btn_tambah_Pasien" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="pemeriksaanUmum" role="dialog" aria-labelledby="pemeriksaanUmumLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="pemeriksaanUmumLabel">Pemeriksaan Umum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formDataPemeriksaanUmum">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>No. Antrian</label>
                        <input type="text" name="no_antrian" class="form-control" placeholder="No. Antrian" readonly>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Pelayanan</label>
                        <input type="hidden" name="id_jenis_pelayanan">
                        <input type="text" name="nama_pelayanan" class="form-control" placeholder="Jenis Pelayanan" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <h3><b>Hasil Pemeriksaan:</b></h3>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                          <option value="L" selected>Laki-laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Penyakit</label>
                        <select name="id_penyakit" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Rentang Umur</label>
                        <select name="id_rentang_umur" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tindakan: </label>
                        <select name="id_macam_tindakan_imunisasi_pemeriksaan_umum" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="catatan" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button id="0" name="btn_selesai_pemeriksaan_umum" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Selesai</button>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="modal fade" id="pemeriksaanUmum" role="dialog" aria-labelledby="pemeriksaanUmumLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="pemeriksaanUmumLabel">Pemeriksaan Umum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formDataPemeriksaanUmum">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>No. Antrian</label>
                        <input type="text" name="no_antrian" class="form-control" placeholder="No. Antrian" readonly>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Pelayanan</label>
                        <input type="hidden" name="id_jenis_pelayanan">
                        <input type="text" name="nama_pelayanan" class="form-control" placeholder="Jenis Pelayanan" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <h3><b>Hasil Pemeriksaan:</b></h3>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Penyakit</label>
                        <select name="id_penyakit" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Rentang Umur</label>
                        <select name="id_rentang_umur" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="catatan" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button id="0" name="btn_selesai_pemeriksaan_umum" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Selesai</button>
              </div>
            </div>
          </div>
        </div> -->

        <div class="modal fade" id="programIspa" role="dialog" aria-labelledby="programIspaLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="programIspaLabel">Program ISPA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formDataProgramIspa">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>No. Antrian</label>
                        <input type="text" name="no_antrian" class="form-control" placeholder="No. Antrian" readonly>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Pelayanan</label>
                        <input type="hidden" name="id_jenis_pelayanan">
                        <input type="text" name="nama_pelayanan" class="form-control" placeholder="Jenis Pelayanan" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <h3><b>Hasil Pemeriksaan:</b></h3>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Anak</label>
                        <input type="text" name="nama_anak" class="form-control" placeholder="Nama Anak" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                          <option value="L" selected>Laki-laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Umur (tahun)</label>
                        <input type="number" name="umur_tahun" class="form-control" placeholder="Umur (tahun)">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Umur (bulan)</label>
                        <input type="number" name="umur_bulan" class="form-control" placeholder="Umur (bulan)">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>TB/PB</label>
                        <input type="number" name="tb_pb" class="form-control" placeholder="Tinggi / Panjang Badan">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>BB</label>
                        <input type="number" name="bb" class="form-control" placeholder="Berat Badan">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="catatan" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button id="0" name="btn_selesai_program_ispa" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Selesai</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="imunisasi" role="dialog" aria-labelledby="imunisasiLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="imunisasiLabel">Imunisasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formDataImunisasi">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>No. Antrian</label>
                        <input type="text" name="no_antrian" class="form-control" placeholder="No. Antrian" readonly>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Pelayanan</label>
                        <input type="hidden" name="id_jenis_pelayanan">
                        <input type="text" name="nama_pelayanan" class="form-control" placeholder="Jenis Pelayanan" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <h3><b>Hasil Pemeriksaan:</b></h3>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Anak</label>
                        <input type="text" name="nama_anak" class="form-control" placeholder="Nama Anak" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. KK Ortu</label>
                        <input type="text" name="no_kk" class="form-control" placeholder="No. KK Orang Tua">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>BB Lahir (Gram)</label>
                        <input type="number" name="bb_lahir" class="form-control" placeholder="Berat Badan Lahir">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>BB (Gram)</label>
                        <input type="number" name="bb" class="form-control" placeholder="Berat Badan">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>PB (cm)</label>
                        <input type="number" name="pb" class="form-control" placeholder="Panjang Badan">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="catatan" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <h3><b>Macam Imunisasi:</b></h3>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Hb0</label>
                        <select name="hb0" class="form-control">
                          <option value="0" selected>Tidak</option>
                          <option value="1">Ya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>BCG</label>
                        <select name="bcg" class="form-control">
                          <option value="0" selected>Tidak</option>
                          <option value="1">Ya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Polio 1</label>
                        <select name="polio1" class="form-control">
                          <option value="0" selected>Tidak</option>
                          <option value="1">Ya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Polio 2</label>
                        <select name="polio2" class="form-control">
                          <option value="0" selected>Tidak</option>
                          <option value="1">Ya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Polio 3</label>
                        <select name="polio3" class="form-control">
                          <option value="0" selected>Tidak</option>
                          <option value="1">Ya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Polio 4</label>
                        <select name="polio4" class="form-control">
                          <option value="0" selected>Tidak</option>
                          <option value="1">Ya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Pentabio 1</label>
                        <select name="pentabio1" class="form-control">
                          <option value="0" selected>Tidak</option>
                          <option value="1">Ya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Pentabio 2</label>
                        <select name="pentabio2" class="form-control">
                          <option value="0" selected>Tidak</option>
                          <option value="1">Ya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Pentabio 3</label>
                        <select name="pentabio3" class="form-control">
                          <option value="0" selected>Tidak</option>
                          <option value="1">Ya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Campak</label>
                        <select name="campak" class="form-control">
                          <option value="0" selected>Tidak</option>
                          <option value="1">Ya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>TT</label>
                        <select name="tt" class="form-control">
                          <option value="0" selected>Tidak</option>
                          <option value="1">Ya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Pentabio Ulang</label>
                        <select name="pentabio_ulang" class="form-control">
                          <option value="0" selected>Tidak</option>
                          <option value="1">Ya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Campak Ulang</label>
                        <select name="campak_ulang" class="form-control">
                          <option value="0" selected>Tidak</option>
                          <option value="1">Ya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label><b>Tindakan: </b></label>
                        <select name="id_macam_tindakan_imunisasi" class="form-control"></select>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button id="0" name="btn_selesai_imunisasi" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Selesai</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="persalinan" role="dialog" aria-labelledby="persalinanLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="persalinanLabel">Persalinan / Partus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formDataPersalinan">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>No. Antrian</label>
                        <input type="text" name="no_antrian" class="form-control" placeholder="No. Antrian" readonly>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="hidden" name="id_pasien" class="form-control">
                        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Pelayanan</label>
                        <input type="hidden" name="id_jenis_pelayanan">
                        <input type="text" name="nama_pelayanan" class="form-control" placeholder="Jenis Pelayanan" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <h3><b>Hasil Pemeriksaan:</b></h3>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Umur</label>
                        <input type="number" name="umur" class="form-control" placeholder="Umur" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Anak Ke</label>
                        <input type="number" name="anak_ke" class="form-control" placeholder="Anak Ke" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>BB (kg)</label>
                        <input type="number" name="bb" class="form-control" placeholder="Berat Badan" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>PB (cm)</label>
                        <input type="number" name="pb" class="form-control" placeholder="Panjang Badan" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jam</label>
                        <input type="text" name="jam_lahir" class="form-control" placeholder="Jam Lahir" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                          <option value="L" selected>Laki-laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>IMD</label>
                        <select name="imd" class="form-control">
                          <option value="1" selected>Ya</option>
                          <option value="1">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Lingkar Kepala</label>
                        <input type="number" name="lingkar_kepala" class="form-control" placeholder="Lingkar Kepala" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Resiko</label>
                        <textarea name="resiko" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="catatan" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button id="0" name="btn_selesai_persalinan" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Selesai</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="pemeriksaanKehamilan" role="dialog" aria-labelledby="pemeriksaanKehamilanLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="pemeriksaanKehamilanLabel">Pemeriksaan Kehamilan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formDataPemeriksaanKehamilan">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>No. Antrian</label>
                        <input type="text" name="no_antrian" class="form-control" placeholder="No. Antrian" readonly>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="hidden" name="id_pasien" class="form-control">
                        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Pelayanan</label>
                        <input type="hidden" name="id_jenis_pelayanan">
                        <input type="text" name="nama_pelayanan" class="form-control" placeholder="Jenis Pelayanan" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <h3><b>Hasil Pemeriksaan:</b></h3>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" placeholder="NIK">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Umur</label>
                        <input type="number" name="umur" class="form-control" placeholder="Umur" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Suami</label>
                        <input type="text" name="nama_suami" class="form-control" placeholder="Nama Suami" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. KK</label>
                        <input type="text" name="no_kk" class="form-control" placeholder="No. KK">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>KIA</label>
                        <!-- <input type="text" name="buku_kia" class="form-control" placeholder="Buku KIA"> -->
                        <select name="buku_kia" class="form-control">
                          <option value="baru">Baru</option>
                          <option value="lama">Lama</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>HPHT</label>
                        <input type="date" name="hpht" class="form-control" placeholder="HPHT" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>TP</label>
                        <input type="date" name="tp" class="form-control" placeholder="TP" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>BB</label>
                        <input type="number" name="bb" class="form-control" placeholder="Berat Badan" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>TB</label>
                        <input type="number" name="tb" class="form-control" placeholder="Tinggi Badan" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Usia Kehamilan (minggu)</label>
                        <input type="text" name="usia_kehamilan" class="form-control" placeholder="Usia Kehamilan" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>GPA</label>
                        <input type="text" name="gpa" class="form-control" placeholder="GPA" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>K1</label>
                        <select name="k1" class="form-control">
                          <option value="1" selected>Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>K4</label>
                        <select name="k4" class="form-control">
                          <option value="1" selected>Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>TT</label>
                        <input type="text" name="tt" class="form-control" placeholder="TT">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>LILA (cm)</label>
                        <input type="number" name="lila" class="form-control" placeholder="LILA (cm)" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Hb (g/dl)</label>
                        <input type="number" name="hb" class="form-control" placeholder="Hb (g/dl)">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Resiko</label>
                        <textarea name="resiko" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Keterangan (10 T, Jumlah Fe)</label>
                        <textarea name="keterangan" class="form-control"></textarea>
                      </div>
                    </div>
                    <!-- <div class="col-md-6">
                      <div class="form-group">
                        <label>VCT</label>
                        <input type="text" name="vct" class="form-control" placeholder="VCT" required>
                      </div>
                    </div> -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Keterangan Hamil</label>
                        <select name="baru_lama" class="form-control">
                          <option value="BARU" selected>Baru</option>
                          <option value="LAMA">Lama</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="catatan" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button id="0" name="btn_selesai_pemeriksaan_kehamilan" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Selesai</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="pemeriksaanKB" role="dialog" aria-labelledby="pemeriksaanKBLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="pemeriksaanKBLabel">Pemeriksaan KB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formDataKB">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>No. Antrian</label>
                        <input type="text" name="no_antrian" class="form-control" placeholder="No. Antrian" readonly>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="hidden" name="id_pasien" class="form-control">
                        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Pelayanan</label>
                        <input type="hidden" name="id_jenis_pelayanan">
                        <input type="text" name="nama_pelayanan" class="form-control" placeholder="Jenis Pelayanan" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <h3><b>Hasil Pemeriksaan:</b></h3>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Umur</label>
                        <input type="number" name="umur" class="form-control" placeholder="Umur" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Suami</label>
                        <input type="text" name="nama_suami" class="form-control" placeholder="Nama Suami">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jumlah Anak Laki-laki</label>
                        <input type="number" name="jml_anak_laki" class="form-control" placeholder="Jumlah Anak Laki-laki" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jumlah Anak Perempuan</label>
                        <input type="number" name="jml_anak_perempuan" class="form-control" placeholder="Jumlah Anak Perempuan" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jumlah Anak</label>
                        <input type="number" name="jml_anak" class="form-control" placeholder="Jumlah Anak" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Usia Anak Terkecil</label>
                        <input type="number" name="usia_anak_terkecil" class="form-control" placeholder="Usia Anak Terkecil" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Satuan Usia</label>
                        <select name="id_satuan_usia" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Pasang Baru</label>
                        <select name="pasang_baru" class="form-control">
                          <option value="1" selected>Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Pemasangan / Pencabutan</label>
                        <select name="pasang_cabut" class="form-control">
                          <option value="PEMASANGAN" selected>Pemasangan</option>
                          <option value="PENCABUTAN">Pencabutan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Alat Kontrasepsi</label>
                        <select name="id_alat_kontrasepsi" class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>AKLI</label>
                        <input type="text" name="akli" class="form-control" placeholder="AKLI">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>4T</label>
                        <select name="t_4" class="form-control">
                          <option value="1" selected>Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Ganti Cara</label>
                        <input type="text" name="ganti_cara" class="form-control" placeholder="Ganti Cara">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="catatan" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button id="0" name="btn_selesai_kb" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Selesai</button>
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
  <script src="<?php echo base_url('assets/js/admina.dashboard.js'); ?>" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/select2/js/select2.min.js'); ?>"></script>
</body>

</html>