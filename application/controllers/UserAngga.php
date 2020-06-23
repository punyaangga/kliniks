<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAngga extends CI_Controller{
	private $userData;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', 'login');
		// $this->load->model('UserAngga_model', 'model'); sebelum dirubah
		$this->load->model('UserAngga_model');


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
		$data['query'] = $this->UserAngga_model->tampilDataPengguna();
		$this->load->view('userAngga',$data);
    }

    public function hapusDataPengguna()
	{
		$id = $this->uri->segment(3);
		$proses = $this->UserAngga_model->hapusDataPengguna($id);
		if (!$proses) {
				echo "<script>alert('Data Berhasil Di Hapus');history.go(-1);</script>";
				//redirect(base_url('index.php/userAngga'));
		} else {
			echo "Data Gagal dihapus";
			echo "<br>";
			echo "<a href='".base_url('index.php/userAngga')."'>Tampil data Dokter</a>";
		}
	}

	public function tampilPengguna(){
    	$id=$this->uri->segment(3);
    	$data['query'] = $this->UserAngga_model->editDataPengguna($id);
    	$this->load->view('crudUser',$data);
    }

    public function updateDataPengguna(){

	$id = $this->input->post('id');
	$data = array('id'=> $this->input->post('id'),'nik' => $this->input->post('nik'), 'name' => $this->input->post('name')
		,'email' => $this->input->post('email'),'password' => md5($this->input->post('password')),
		'type' => $this->input->post('type'));
	
	$proses = $this->UserAngga_model->updateDataPengguna($id, $data);
		if (!$proses) {
			echo "<script>alert('Data Berhasil Di Update');history.go(-2)</script>";
		} else {
			echo "<script>alert('Data Gagal Di Update');history.go(-1)</script>";
		}
	
	}



}