<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetakAntrian extends CI_Controller {

	private $userData;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', 'login');
		 $this->load->model('CetakAntrian_model');


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
		$data['cetak'] = $this->CetakAntrian_model->cetak();
		$this->load->view('cetakAntrian',$data);

    }
}
?>