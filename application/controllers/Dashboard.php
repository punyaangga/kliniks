<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $userData;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', 'login');
		$this->load->model('Dashboard_model');


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
		// $data['query'] = $this->Dashboard_model->tampilPasienDilayani();
		$data['query'] = $this->Dashboard_model->tampilPasienDilayani();
		$data['harusDilayani'] = $this->Dashboard_model->tampilPasienHarusDilayani();
        //buat get data dari view di kirim ke model
        $this->controller=$this;
        
        
		
		
		$this->load->view('dashboard',$data);

    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect();
    }
    
    public function updateDataAntrian(){
    	// $id = $this->input->post('id');
    	$id = $this->uri->segment(3);
        $noAntrian = $this->uri->segment(4);
        $jenisPel  = $this->uri->segment(5);

    	$status="Selesai";
		$data = array('id'=> $id ,'status_antrian' => $status);
		
		$proses = $this->Dashboard_model->updateAntrian($id, $data);
			if (!$proses) {
				// echo "Berhasil";
				// echo $id;
				redirect('index.php/Dashboard/?panggil='.$noAntrian.'-'.$jenisPel);
				//echo "<script>history.go(-1)</script>";
			} else {
				echo "<script>alert('Data Gagal Di Update');history.go(-1)</script>";
			}
		
    }  
}
