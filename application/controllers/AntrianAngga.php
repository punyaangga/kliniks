<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AntrianAngga extends CI_Controller {

	private $userData;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', 'login');
		$this->load->model('AntrianAngga_model');

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
		$data['pelayanan'] = $this->AntrianAngga_model->getJenisPelayanan();
		$data['kunjunganPasien'] = $this->AntrianAngga_model->getKunjunganPasien();
		$data['allPasien'] = $this->AntrianAngga_model->getAllPasien();
    	$data['allDokter'] = $this->AntrianAngga_model->getAllDokter();
		$this->load->view('antrianAngga',$data);

		
    }
    public function hapusDataAntrian()
	{
		$id = $this->uri->segment(3);
		$proses = $this->AntrianAngga_model->hapusDataAntrian($id);
		if (!$proses) {
				echo "<script>alert('Data Berhasil Di Hapus');history.go(-1);</script>";
				//redirect(base_url('index.php/userAngga'));
		} else {
			echo "Data Gagal dihapus";
			echo "<br>";
			echo "<a href='".base_url('index.php/AntrianAngga')."'>Tampil data Dokter</a>";
		}
	}
	public function simpanAntrian(){
        $dateNow = $waktuSekarang = gmdate("Y-m-d H:i:s", time()+60*60*7);
        $statusAntrian = "Proses";
        $antrian = $this->input->post('noAntrian');
        
        if (empty($antrian)) {
            $no = "1";
            $data = array('created_at'=>$dateNow,
                      'id_dokter'=>$this->input->post('namaDokter'),
                      'id_pasien'=>$this->input->post('namaPasien'),
                      'no_antrian'=>$no,
                      'status_antrian'=>$statusAntrian,
                      'id_jenis_pelayanan'=>$this->input->post('jenisPelayanan'),
                      'tgl_antrian'=>$dateNow,
                          'kode_antrian'=>$this->input->post('kode_antrian'));
            $proses = $this->AntrianAngga_model->simpanAntrian($data);
            if (!$proses) {
                    // header('Location: index');
                    echo "<script>alert('Data Berhasil Disimpan');window.location='index'</script>";
                } else {
                    echo "<script>alert('Data Gagal Di Simpan');history.go(-2)</script>";
                }


        } else {
            $data = array('created_at'=>$dateNow,
                      'id_dokter'=>$this->input->post('namaDokter'),
                      'id_pasien'=>$this->input->post('namaPasien'),
                      'no_antrian'=>$this->input->post('noAntrian'),
                      'status_antrian'=>$statusAntrian,
                      'id_jenis_pelayanan'=>$this->input->post('jenisPelayanan'),
                      'tgl_antrian'=>$dateNow,
                      'kode_antrian'=>$this->input->post('kode_antrian'));
            $proses = $this->AntrianAngga_model->simpanAntrian($data);
            if (!$proses) {
                    // header('Location: index');
                    echo "<script>alert('Data Berhasil Disimpan');window.location='index'</script>";
                } else {
                    echo "<script>alert('Data Gagal Di Simpan');history.go(-2)</script>";
                }

        }
    }






    //fungsi untuk halaman form edit kunjungan
    public function getDataAntrian(){
    	$id=$this->uri->segment(3);
    	$data['query'] = $this->AntrianAngga_model->getDataAntrian($id);
    	$data['pelayanan'] = $this->AntrianAngga_model->getJenisPelayanan();
    	$data['allPasien'] = $this->AntrianAngga_model->getAllPasien();
    	$data['allDokter'] = $this->AntrianAngga_model->getAllDokter();
    	$this->load->view('antrianEdit',$data);
    	
    }
    public function getNoPelayanan()
    {
        $idpelayanan = $this->input->post('id');
        $data = $this->AntrianAngga_model->getNoPelayanan($idpelayanan);
        
        $output = "";
     
        foreach ($data as $row) {
            $getNo = $row->no_antrian;

            $counterNumber = $getNo+1;
            $output .= $counterNumber; 
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function updateDataKunjungan(){
    	$id = $this->input->post('id');
    	$antrian = $this->input->post('noAntrian');

	    	if (empty($antrian)) {
	            $no = "1";
	            $data = array('id_jenis_pelayanan' => $this->input->post('namaPelayanan'), 
						  'id_pasien' => $this->input->post('namaPasien'),
						  'id_dokter' => $this->input->post('namaDokter'),
						  'no_antrian' => $no);
						 	
				$proses = $this->AntrianAngga_model->updateDataKunjungan($id, $data);
					if (!$proses) {
						echo "<script>alert('Data Berhasil Di Update');history.go(-2)</script>";
					} else {
						echo "<script>alert('Data Gagal Di Update');history.go(-1)</script>";
					}


	        } else {
	        	$data = array('id_jenis_pelayanan' => $this->input->post('namaPelayanan'), 
						  'id_pasien' => $this->input->post('namaPasien'),
						  'id_dokter' => $this->input->post('namaDokter'),
						  'no_antrian' => $antrian);
						 	
				$proses = $this->AntrianAngga_model->updateDataKunjungan($id, $data);
					if (!$proses) {
						echo "<script>alert('Data Berhasil Di Update');history.go(-2)</script>";
					} else {
						echo "<script>alert('Data Gagal Di Update');history.go(-1)</script>";
					}
				 
		        }		
		}
    //end fungsi untuk form edit kunjungan

}


  