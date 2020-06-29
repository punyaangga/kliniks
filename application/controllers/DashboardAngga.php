<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAngga extends CI_Controller {

	private $userData;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', 'login');
		$this->load->model('DashboardAngga_model');

		$this->userData = array(
			'session'	=> $this->session->userdata('userSession'),
			'host'		=> $this->input->get_request_header('Host', TRUE),
			'referer'	=> $this->input->get_request_header('Referer', TRUE),
			'agent'		=> $this->input->get_request_header('User-Agent', TRUE),
			'ipaddr'	=> $this->input->ip_address()
		);

		$auth = $this->login->auth($this->userData);
		if(!$auth){
			redirect();
		}
	}

	public function index()
	{
		// $data['query'] = $this->DashboardAngga_model->tampilPasienDilayani();
		$data['query'] = $this->DashboardAngga_model->tampilPasienDilayani();
		$data['harusDilayani'] = $this->DashboardAngga_model->tampilPasienHarusDilayani();
		$data['sedangDilayani'] = $this->DashboardAngga_model->tampilPasienSedangDilayani();
		$data['hitungPengunjung'] = $this->DashboardAngga_model->counterKunjungan();
		$data['penyakit'] = $this->DashboardAngga_model->getJenisPenyakit();
		$data['rUmur'] = $this->DashboardAngga_model->getRentangUmur();
		$data['tindakan'] = $this->DashboardAngga_model->getTindakan();
		$data['satuanUsia'] = $this->DashboardAngga_model->getSatuanUsia();
		$data['alatKontra'] = $this->DashboardAngga_model->getAlatKontrasepsi();
		
		// start komen sementara
		// $data['bbLahir'] = $this->DashboardAngga_model->getBbLahir();
		// $data['jenisPelayanan'] =$this->DashboardAngga_model->infoPelayanan();
		// $data['namaDokter'] =$this->DashboardAngga_model->infoDokter();
		// $data['namaPasien'] =$this->DashboardAngga_model->infoPasien();
		// end komen sementara

		$this->load->view('dashboardAngga',$data);

    }

    public function simpanDataPasien()
    {
    	$data = array('jk_pasien'=>$this->input->post('jk_pasien'),'no_registrasi'=>$this->input->post('no_registrasi'),'nik'=>$this->input->post('nik'),'nama_pasien'=>$this->input->post('nama_pasien'),'tgl_lahir'=>$this->input->post('tgl_lahir'),'pendidikan_istri'=>$this->input->post('pendidikan_istri'),'agama_istri'=>$this->input->post('agama_istri'),'pekerjaan_istri'=>$this->input->post('pekerjaan_istri'),'alamat_ktp_istri'=>$this->input->post('alamat_ktp_istri'),'alamat_istri'=>$this->input->post('alamat_istri'),'nama_ayah_kandung'=>$this->input->post('nama_ayah_kandung'),'nama_suami'=>$this->input->post('nama_suami'),'tgl_lahir_suami'=>$this->input->post('tgl_lahir_suami'),'pendidikan_suami'=>$this->input->post('pendidikan_suami'),'agama_suami'=>$this->input->post('agama_suami'),'pekerjaan_suami'=>$this->input->post('pekerjaan_suami'),'alamat_ktp_suami'=>$this->input->post('alamat_ktp_suami'),'alamat_suami'=>$this->input->post('alamat_suami'),'id_kota'=>$this->input->post('id_kota'),'id_desa'=>$this->input->post('id_desa'),'gol_darah'=>$this->input->post('gol_darah'),'no_telp_pasien'=>$this->input->post('no_telp_pasien'),'email'=>$this->input->post('email'),'medsos'=>$this->input->post('medsos'),'catatan_bidan'=>$this->input->post('catatan_bidan'));
		$proses=$this->DashboardAngga_model->simpanDataPasien($data);
			if (!$proses) {
				echo "<script>alert('Data Berhasil Di Simpan');history.go(-1);</script>";
				
			} else {
				echo "Data Gagal Disimpan";
				echo "<br>";
				echo "<a href='".base_url('index.php/DataDokter/index/')."'>Kembali ke form</a>";
			}

    }

    public function simpanPemeriksaanUmum(){
	    $data = array('id_antrian'=>$this->input->post('idAntrian'),
	    		'jenis_kelamin'=>$this->input->post('jenisKelamin'),
	    		'id_penyakit'=>$this->input->post('idPenyakit'),
	    		'id_rentang_umur'=>$this->input->post('idRentangUmur'),
	    		'id_macam_tindakan_imunisasi'=>$this->input->post('idTindakan'),
	    		'catatan'=>$this->input->post('catatanDokter'));
		$proses=$this->DashboardAngga_model->simpanPemeriksaanUmum($data);
			if (!$proses) {
				// header('Location: index');
				echo "<script>alert('Data Berhasil Disimpan');window.location='index#pasienSedangDilayani'</script>";
			} else {
				echo "<script>alert('Data Gagal Di Update');history.go(-1)</script>";
			}
    }

    public function simpanPemeriksaanKb(){
    	$satu = $this->input->post('jmlAnakLaki');
    	$dua =  $this->input->post('jmlAnakPerempuan');
    	$hitung = $satu + $dua;
    	$data = array('id_antrian'=>$this->input->post('idAntrian'),
    			'umur'=>$hitung,
    			'nama_suami'=>$this->input->post('namaSuami'),
    			'alamat'=>$this->input->post('alamatPasien'),
    			'jml_anak_laki'=>$this->input->post('jmlAnakLaki'),
    			'jml_anak_perempuan'=>$this->input->post('jmlAnakPerempuan'),
    			'jml_anak'=>$this->input->post('jmlAnak'),
    			'usia_anak_terkecil'=>$this->input->post('usiaAnakTerkecil'),
    			'id_satuan_usia'=>$this->input->post('idSatuanUsia'),
    			'pasang_baru'=>$this->input->post('pasangBaru'),
    			'pasang_cabut'=>$this->input->post('pasangCabut'),
    			'id_alat_kontrasepsi'=>$this->input->post('idAlatKontra'),
    			'akli'=>$this->input->post('akli'),
    			't_4'=>$this->input->post('t4'),
    			'ganti_cara'=>$this->input->post('gantiCara'),
    			'catatan'=>$this->input->post('catatan'));
    	$proses=$this->DashboardAngga_model->simpanPemeriksaanKb($data);
    		if (!$proses) {
				// header('Location: index');
				echo "<script>alert('Data Berhasil Disimpan');window.location='index#pasienSedangDilayani'</script>";
			} else {
				echo "<script>alert('Data Gagal Di Update');history.go(-1)</script>";
			}
    }

    public function simpanDataProgramIspa(){
    	$data=array('id_antrian'=>$this->input->post('idAntrian'),
    		'nama_anak'=>$this->input->post('namaAnak'),
    		'jenis_kelamin'=>$this->input->post('jk'),
    		'umur_tahun'=>$this->input->post('umurTahun'),
    		'umur_bulan'=>$this->input->post('umurBulan'),
    		'tb_pb'=>$this->input->post('tbPb'),
    		'bb'=>$this->input->post('bb'),
    		'catatan'=>$this->input->post('catatan'));
    	$proses=$this->DashboardAngga_model->simpanDataProgramIspa($data);
    		if (!$proses) {
				// header('Location: index');
				echo "<script>alert('Data Berhasil Disimpan');window.location='index#pasienSedangDilayani'</script>";
			} else {
				echo "<script>alert('Data Gagal Di Update');history.go(-1)</script>";
			}
    }
    public function simpanDataImunisasi(){
    	$data=array('id_antrian'=>$this->input->post('idAntrian'),
    		 'nama_anak'=>$this->input->post('namaAnak'),
    		 'no_kk'=>$this->input->post('noKk'),
    		 'alamat'=>$this->input->post('alamat'),
    		 'tgl_lahir'=>$this->input->post('tglLahir'),
    		 'bb_lahir'=>$this->input->post('bbLahir'),
    		 'bb'=>$this->input->post('bb'),
    		 'pb'=>$this->input->post('pb'),
    		 'catatan'=>$this->input->post('catatan'),
    		 'hb0'=>$this->input->post('hb0'),
    		 'bcg'=>$this->input->post('bcg'),
    		 'polio1'=>$this->input->post('polio1'),
    		 'polio2'=>$this->input->post('polio2'),
    		 'polio3'=>$this->input->post('polio3'),
    		 'polio4'=>$this->input->post('polio4'),
    		 'pentabio1'=>$this->input->post('pentabio1'),
    		 'pentabio2'=>$this->input->post('pentabio2'),
    		 'pentabio3'=>$this->input->post('pentabio3'),
    		 'campak'=>$this->input->post('campak'),
    		 'tt'=>$this->input->post('tt'),
    		 'pentabio_ulang'=>$this->input->post('pentabioUlang'),
    		 'campak_ulang'=>$this->input->post('campakUlang'),
    		 'id_macam_tindakan_imunisasi'=>$this->input->post('idMacamTindakanImunisasi'));
    
			$proses=$this->DashboardAngga_model->simpanDataImunisasi($data);
    		if (!$proses) {
				// header('Location: index');
				echo "<script>alert('Data Berhasil Disimpan');window.location='index#pasienSedangDilayani'</script>";
			} else {
				echo "<script>alert('Data Gagal Di Update');history.go(-1)</script>";
			}
    }
    public function simpanDataPemeriksaanKehamilan(){
    	$data = array('id_antrian'=>$this->input->post('idAntrian'),
    			'id_pasien'=>$this->input->post('idPasien'),
    			'tgl_lahir'=>$this->input->post('tglLahir'),
    			'nik'=>$this->input->post('nik'),
    			'umur'=>$this->input->post('umur'),
    			'nama_suami'=>$this->input->post('namaSuami'),
    			'no_kk'=>$this->input->post('noKk'),
    			'buku_kia'=>$this->input->post('bukuKia'),
    			'alamat'=>$this->input->post('alamat'),
    			'hpht'=>$this->input->post('hpht'),
    			'tp'=>$this->input->post('tp'),
    			'bb'=>$this->input->post('bb'),
    			'tb'=>$this->input->post('tb'),
    			'usia_kehamilan'=>$this->input->post('usiaKehamilan'),
    			'gpa'=>$this->input->post('gpa'),
    			'k1'=>$this->input->post('k1'),
    			'k4'=>$this->input->post('k4'),
    			'tt'=>$this->input->post('tt'),
    			'lila'=>$this->input->post('lila'),
    			'hb'=>$this->input->post('hb'),
    			'resiko'=>$this->input->post('resiko'),
    			'keterangan'=>$this->input->post('keterangan'),
    			'baru_lama'=>$this->input->post('baruLama'),
    			'catatan'=>$this->input->post('catatan'));
		$proses=$this->DashboardAngga_model->simpanDataPemeriksaanKehamilan($data);
    		if (!$proses) {
				// header('Location: index');
				echo "<script>alert('Data Berhasil Disimpan');window.location='index#pasienSedangDilayani'</script>";
			} else {
				echo "<script>alert('Data Gagal Di Update');history.go(-1)</script>";
			}
    }
    public function simpanDataPersalinan(){
    	$data = array('id_antrian'=>$this->input->post('idAntrian'),
    			'id_pasien'=>$this->input->post('idPasien'),
    			'umur'=>$this->input->post('umur'),
    			'alamat'=>$this->input->post('alamat'),
    			'anak_ke'=>$this->input->post('anakKe'),
    			'bb'=>$this->input->post('bb'),
    			'pb'=>$this->input->post('pb'),
    			'tgl_lahir'=>$this->input->post('tglLahir'),
    			'jam_lahir'=>$this->input->post('jamLahir'),
    			'jenis_kelamin'=>$this->input->post('jenisKelamin'),
    			'imd'=>$this->input->post('imd'),
    			'lingkar_kepala'=>$this->input->post('lingkarKepala'),
    			'resiko'=>$this->input->post('resiko'),
    			'keterangan'=>$this->input->post('keterangan'),
    			'catatan'=>$this->input->post('catatan'));
   		$proses=$this->DashboardAngga_model->simpanDataPersalinan($data);
    		if (!$proses) {
				// header('Location: index');
				echo "<script>alert('Data Berhasil Disimpan');window.location='index#pasienSedangDilayani'</script>";
			} else {
				echo "<script>alert('Data Gagal Di Update');history.go(-1)</script>";
			}
    }


    public function updateDataAntrian(){
    	// $id = $this->input->post('id');
    	$id = $this->uri->segment(3);
    	$status="Sedang Dilayani";
		$data = array('id'=> $id ,'status_antrian' => $status);
		
		$proses = $this->DashboardAngga_model->updateAntrian($id, $data);
			if (!$proses) {
				// echo "Berhasil";
				// echo $id;
				redirect('index.php/DashboardAngga/#pasienharusdilayani');
				//echo "<script>history.go(-1)</script>";
			} else {
				echo "<script>alert('Data Gagal Di Update');history.go(-1)</script>";
			}
		
    }


   


// 	private function get_param($param = '', $needNumber = false)
// 	{
// 		if (isset($_GET[$param])) {
// 			return $_GET[$param];
// 		} else{
// 			if ($needNumber) {
// 				return 0;
// 			} else{
// 				return '';
// 			}
// 		}
// 	}


//     public function logout()
//     {
//         $this->session->sess_destroy();
//         redirect();
//     }

//     public function datatable_dilayani()
//     {
// 		$response 	= array(
// 			'result'	=> false,
// 			'msg'		=> ''
// 		);

// 		$param 		= $_GET;
// 		$response 	= $this->model->datatable_dilayani($param);
//     	echo json_encode($response, JSON_PRETTY_PRINT);
//     }

//     public function datatable_proses()
//     {
// 		$response 	= array(
// 			'result'	=> false,
// 			'msg'		=> ''
// 		);

// 		$param 		= $_GET;
// 		$response 	= $this->model->datatable_proses($param);
//     	echo json_encode($response, JSON_PRETTY_PRINT);
//     }

//     public function datatable_terlayani()
//     {
// 		$response 	= array(
// 			'result'	=> false,
// 			'msg'		=> ''
// 		);

// 		$param 		= $_GET;
// 		$response 	= $this->model->datatable_terlayani($param);
//     	echo json_encode($response, JSON_PRETTY_PRINT);
//     }

//     public function layani()
//     {
// 		$response 	= array(
// 			'result'	=> false,
// 			'msg'		=> ''
// 		);

// 		$param = array(
// 			'userData' => $this->userData,
// 			'postData' => $_POST
// 		);
// 		$response = $this->model->layani($param);

// 		echo json_encode($response, JSON_PRETTY_PRINT);
//     }

//     public function pre_selesai($id = 0)
//     {
//     	$response = $this->model->pre_selesai($id);
// 		echo json_encode($response, JSON_PRETTY_PRINT);	
//     }

//     public function selesai()
//     {
// 		$response 	= array(
// 			'result'	=> false,
// 			'msg'		=> ''
// 		);

// 		$param = array(
// 			'userData' => $this->userData,
// 			'postData' => $_POST
// 		);
// 		$response = $this->model->selesai($param);

// 		echo json_encode($response, JSON_PRETTY_PRINT);
//     }

//     public function info()
//     {
//     	$response = $this->model->info();
// 		echo json_encode($response, JSON_PRETTY_PRINT);	
//     }

//     public function select_penyakit($id = 0)
//     {
//     	$response 	= array(
// 			'result'	=> false,
// 			'msg'		=> ''
// 		);

// 		$response = $this->model->select_penyakit($id);
//     	echo json_encode($response, JSON_PRETTY_PRINT);
//     }

//     public function select_rentang_umur($id = 0)
//     {
//     	$response 	= array(
// 			'result'	=> false,
// 			'msg'		=> ''
// 		);

// 		$response = $this->model->select_rentang_umur($id);
//     	echo json_encode($response, JSON_PRETTY_PRINT);
//     }

//     public function select_macam_imunisasi($id = 0)
//     {
//     	$response 	= array(
// 			'result'	=> false,
// 			'msg'		=> ''
// 		);

// 		$response = $this->model->select_macam_imunisasi($id);
//     	echo json_encode($response, JSON_PRETTY_PRINT);
//     }

//     public function select_satuan_usia($id = 0)
//     {
//     	$response 	= array(
// 			'result'	=> false,
// 			'msg'		=> ''
// 		);

// 		$response = $this->model->select_satuan_usia($id);
//     	echo json_encode($response, JSON_PRETTY_PRINT);
//     }

//     public function select_alat_kontrasepsi($id = 0)
//     {
//     	$response 	= array(
// 			'result'	=> false,
// 			'msg'		=> ''
// 		);

// 		$response = $this->model->select_alat_kontrasepsi($id);
//     	echo json_encode($response, JSON_PRETTY_PRINT);
//     }
    
}
