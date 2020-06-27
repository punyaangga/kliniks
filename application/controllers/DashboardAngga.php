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
		// start komen sementara
		// $data['jenisPelayanan'] =$this->DashboardAngga_model->infoPelayanan();
		// $data['namaDokter'] =$this->DashboardAngga_model->infoDokter();
		// $data['namaPasien'] =$this->DashboardAngga_model->infoPasien();
		// end komen sementara

		$this->load->view('dashboardAngga',$data);

    }

    public function simpanDataPasien()
    {
    	$data = array('no_registrasi'=>$this->input->post('no_registrasi'),'nik'=>$this->input->post('nik'),'nama_pasien'=>$this->input->post('nama_pasien'),'tgl_lahir'=>$this->input->post('tgl_lahir'),'pendidikan_istri'=>$this->input->post('pendidikan_istri'),'agama_istri'=>$this->input->post('agama_istri'),'pekerjaan_istri'=>$this->input->post('pekerjaan_istri'),'alamat_ktp_istri'=>$this->input->post('alamat_ktp_istri'),'alamat_istri'=>$this->input->post('alamat_istri'),'nama_ayah_kandung'=>$this->input->post('nama_ayah_kandung'),'nama_suami'=>$this->input->post('nama_suami'),'tgl_lahir_suami'=>$this->input->post('tgl_lahir_suami'),'pendidikan_suami'=>$this->input->post('pendidikan_suami'),'agama_suami'=>$this->input->post('agama_suami'),'pekerjaan_suami'=>$this->input->post('pekerjaan_suami'),'alamat_ktp_suami'=>$this->input->post('alamat_ktp_suami'),'alamat_suami'=>$this->input->post('alamat_suami'),'id_kota'=>$this->input->post('id_kota'),'id_desa'=>$this->input->post('id_desa'),'gol_darah'=>$this->input->post('gol_darah'),'no_telp_pasien'=>$this->input->post('no_telp_pasien'),'email'=>$this->input->post('email'),'medsos'=>$this->input->post('medsos'),'catatan_bidan'=>$this->input->post('catatan_bidan'));
		$proses=$this->DashboardAngga_model->simpanDataPasien($data);
			if (!$proses) {
				echo "<script>alert('Data Berhasil Di Simpan');history.go(-1);</script>";
				
			} else {
				echo "Data Gagal Disimpan";
				echo "<br>";
				echo "<a href='".base_url('index.php/DataDokter/index/')."'>Kembali ke form</a>";
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
				echo "<script>history.go(-1)</script>";
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
