<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanKunjungan extends CI_Controller {

	private $userData;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', 'login');
		$this->load->model('LaporanKunjungan_model');

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
        for ($i=1; $i <= 31 ; $i++) { 
		    $data['laporanKehamilan'][$i] = $this->LaporanKunjungan_model->kehamilan($i);
		    $data['laporanPersalinan'][$i] = $this->LaporanKunjungan_model->persalinan($i);
		    $data['laporanImunisasi'][$i] = $this->LaporanKunjungan_model->imunisasi($i);
		    $data['laporanPemUmum'][$i] = $this->LaporanKunjungan_model->pemeriksaanUmum($i);
		    $data['laporanIspa'][$i] = $this->LaporanKunjungan_model->ispa($i);
		    $data['laporanKb'][$i] = $this->LaporanKunjungan_model->kb($i);
        }
		$this->controller=$this;
		$this->load->view('laporan_kunjungan',$data);	
    }

}