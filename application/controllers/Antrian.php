<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {

	private $userData;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', 'login');
		$this->load->model('Antrian_model');

		$this->userData = array(
			'session'	=> $this->session->userdata('userSession'),
			'host'		=> $this->input->get_request_header('Host', TRUE),
			'referer'	=> $this->input->get_request_header('Referer', TRUE),
			'agent'		=> $this->input->get_request_header('User-Agent', TRUE),
			'ipaddr'	=> $this->input->ip_address()
		);

		$auth = $this->login->auth($this->userData);
		if(!$auth){
			if ($this->agent->is_browser()) {
				redirect();
			} else{
				$response = array(
					'result'	=> false,
					'msg'		=> 'Unauthorized access.'
				);
				echo json_encode($response, JSON_PRETTY_PRINT);
			}
		}
	}

	public function index()
	{
		$data['kunjunganPasien'] = $this->Antrian_model->getKunjunganPasien();
		$this->load->view('antrian',$data);

		
    }
    public function hapusDataAntrian()
	{
		$id = $this->uri->segment(3);
		$proses = $this->Antrian_model->hapusDataAntrian($id);
		if (!$proses) {
				echo "<script>alert('Data Berhasil Di Hapus');history.go(-1);</script>";
				
		} else {
			echo "Data Gagal dihapus";
			echo "<br>";
			echo "<a href='".base_url('index.php/Antrian')."'>Tampil data Dokter</a>";
		}
	}
	
    //fungsi untuk halaman form edit kunjungan
    public function getDataAntrian(){
    	$id=$this->uri->segment(3);
    	$data['query'] = $this->Antrian_model->getDataAntrian($id);
    	$data['getPk'] = $this->Antrian_model->getPemeriksaanKehamilan($id);
    	$this->load->view('antrianEdit',$data);
    	
    }  
    //end fungsi untuk form edit kunjungan

}


  