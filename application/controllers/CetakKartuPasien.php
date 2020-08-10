<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetakKartuPasien extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
	}

	public function cetak(){
		$this->load->view('cetakKartuPasien');
	}

}