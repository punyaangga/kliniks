<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	private $userData;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', 'login');
		$this->load->model('pasien_model', 'model');

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
		$this->load->view('pasien');
    }

    public function edit($id = 0)
    {
    	$response = $this->model->edit($id);
		echo json_encode($response, JSON_PRETTY_PRINT);	
    }

    public function datatable()
    {
		$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$param 		= $_GET;
		$response 	= $this->model->datatable($param);
    	echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function save()
    {
		$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$param = array(
			'userData' => $this->userData,
			'postData' => $_POST
		);
		$response = $this->model->save($param);

		echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function delete()
    {
		$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$param = array(
			'userData' => $this->userData,
			'postData' => $_POST
		);
		$response = $this->model->delete($param);

		echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function select_kota()
    {
    	$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$response = $this->model->select_kota();
    	echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function select_desa()
    {
    	$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$response = $this->model->select_desa();
    	echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function select_pekerjaan()
    {
    	$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$response = $this->model->select_pekerjaan();
    	echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function input_no_registrasi()
    {
    	$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$response = $this->model->input_no_registrasi();
    	echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function cetak($id = 0)
    {
    	$response = $this->model->cetak($id);
    	if ($response['result']) {
    		$this->load->view('pasien_cetak', $response);
    	} else{
    		redirect('pasien/');
    	}
    }

    public function detail()
    {
		$response 	= array(
			'result'	=> false,
			'msg'		=> ''
		);

		$param = array(
			'userData' => $this->userData,
			'postData' => $_POST
		);
		$response = $this->model->detail($param);

		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	public function query( $id = 0 )
	{
		$r = $this->model->query($id);
		echo $r;
	}
    
}