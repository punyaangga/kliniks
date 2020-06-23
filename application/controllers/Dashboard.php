<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $userData;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', 'login');
		$this->load->model('dashboard_model', 'model');

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

	private function get_param($param = '', $needNumber = false)
	{
		if (isset($_GET[$param])) {
			return $_GET[$param];
		} else{
			if ($needNumber) {
				return 0;
			} else{
				return '';
			}
		}
	}

	public function index()
	{
		$this->load->view('dashboard');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect();
    }

    public function datatable_dilayani()
    {
		$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$param 		= $_GET;
		$response 	= $this->model->datatable_dilayani($param);
    	echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function datatable_proses()
    {
		$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$param 		= $_GET;
		$response 	= $this->model->datatable_proses($param);
    	echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function datatable_terlayani()
    {
		$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$param 		= $_GET;
		$response 	= $this->model->datatable_terlayani($param);
    	echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function layani()
    {
		$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$param = array(
			'userData' => $this->userData,
			'postData' => $_POST
		);
		$response = $this->model->layani($param);

		echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function pre_selesai($id = 0)
    {
    	$response = $this->model->pre_selesai($id);
		echo json_encode($response, JSON_PRETTY_PRINT);	
    }

    public function selesai()
    {
		$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$param = array(
			'userData' => $this->userData,
			'postData' => $_POST
		);
		$response = $this->model->selesai($param);

		echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function info()
    {
    	$response = $this->model->info();
		echo json_encode($response, JSON_PRETTY_PRINT);	
    }

    public function select_penyakit($id = 0)
    {
    	$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$response = $this->model->select_penyakit($id);
    	echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function select_rentang_umur($id = 0)
    {
    	$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$response = $this->model->select_rentang_umur($id);
    	echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function select_macam_imunisasi($id = 0)
    {
    	$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$response = $this->model->select_macam_imunisasi($id);
    	echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function select_satuan_usia($id = 0)
    {
    	$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$response = $this->model->select_satuan_usia($id);
    	echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function select_alat_kontrasepsi($id = 0)
    {
    	$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$response = $this->model->select_alat_kontrasepsi($id);
    	echo json_encode($response, JSON_PRETTY_PRINT);
    }
    
}
