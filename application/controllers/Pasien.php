<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	private $userData;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', 'login');
		$this->load->model('Pasien_model');

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
		$data['tPasien']=$this->Pasien_model->tampilDataPasien();
		$this->load->view('pasien',$data);
    }

    public function getDataKunjungan(){
    	$id=$this->uri->segment(3);
    	$data['query'] = $this->Pasien_model->getDataKunjungan($id);
    	$data['pelayanan'] = $this->Pasien_model->getJenisPelayanan();
    	$data['kdAntrian'] = $this->Pasien_model->getKodeAntrian();
    	$data['tDokter'] = $this->Pasien_model->getDokter();
    	$this->load->view('kunjungan',$data);
    }



    public function getNoPelayanan()
    {
        $idpelayanan = $this->input->post('id');
        $data = $this->Pasien_model->getNoPelayanan($idpelayanan);
        
        $output = "";
     
        foreach ($data as $row) {
            $getNo = $row->no_antrian;

            $counterNumber = $getNo+1;
            $output .= $counterNumber; 
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function simpanKunjungan(){
    	$dateNow = $waktuSekarang = gmdate("Y-m-d H:i:s", time()+60*60*7);
        $statusAntrian = "Proses";
        $antrian = $this->input->post('noAntrian');
        $idLayanan = $this->input->post('jenisPelayanan');
        $getIdAntrian = $this->input->post('idAntrian');
        $kodeAntrian = $getIdAntrian + 1;
        if ($idLayanan == 1) {
            // start fungsi simpan data ke table pemeriksaan kehamilan
            if (empty($antrian)) {
            //untuk simpan ke table antrian
            $no = "1";
            $data = array('created_at'=>$dateNow,
                      'id_dokter'=>$this->input->post('namaDokter'),
                      'id_pasien'=>$this->input->post('namaPasien'),
                      'no_antrian'=>$no,
                      'status_antrian'=>$statusAntrian,
                      'id_jenis_pelayanan'=>$this->input->post('jenisPelayanan'),
                      'tgl_antrian'=>$dateNow,
                       'kode_antrian'=>$this->input->post('kode_antrian'));
            
            //untuk simpan ke table detail_pemeriksaan kehamilan
             
            $dataDpk = array('id_antrian'=>$kodeAntrian,
                'id_pasien'=>$this->input->post('namaPasien'),
                'tgl_lahir'=>$this->input->post('tglLahir'),
                'nik'=>$this->input->post('nik'),
                'umur'=>$this->input->post('umur'),
                'nama_suami'=>$this->input->post('namaSuami'),
                'no_kk'=>$this->input->post('noKk'),
                'buku_kia'=>$this->input->post('bukuKia'),
                'alamat'=>$this->input->post('alamat'),
                'hpht'=>$this->input->post('hpht'),
                'tp'=>$this->input->post('tp'),
                'bb'=>$this->input->post('bb'),
                'tb'=>$this->input->post('tb'),
                'usia_kehamilan'=>$this->input->post('usiaKehamilan'),
                'gpa'=>$this->input->post('gpa'),
                'k1'=>$this->input->post('k1'),
                'k4'=>$this->input->post('k4'),
                'tt'=>$this->input->post('tt'),
                'lila'=>$this->input->post('lila'),
                'hb'=>$this->input->post('hb'),
                'resiko'=>$this->input->post('resiko'),
                'keterangan'=>$this->input->post('keterangan'),
                'baru_lama'=>$this->input->post('baruLama'),
                'catatan'=>$this->input->post('catatan'));
                $prosesDpk = $this->Pasien_model->simpanPemeriksaanKehamilan($dataDpk); //simpan data ke table detail_pemeriksaan kehamilan ke table detail_pemeriksaan_kehamilan
                $proses = $this->Pasien_model->simpanAntrian($data); //simpan data antrian ke table antrian
                    
                    if (!$proses & !$prosesDpk) {
                            //script pake print nomor antrian
                            $url = base_url('index.php/cetakAntrian');
                            echo "<script>window.open('".$url."','_blank');</script>";
                            echo "<script>history.go(-2);</script>";

                            //script ga pake print
                            // echo "<script>alert('Data Berhasil Disimpan');window.location='index'</script>";
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
                    //untuk simpan ke db detail_pemeriksaan kehamilan
                    $dataDpk = array('id_antrian'=>$kodeAntrian,
                        'id_pasien'=>$this->input->post('namaPasien'),
                        'tgl_lahir'=>$this->input->post('tglLahir'),
                        'nik'=>$this->input->post('nik'),
                        'umur'=>$this->input->post('umur'),
                        'nama_suami'=>$this->input->post('namaSuami'),
                        'no_kk'=>$this->input->post('noKk'),
                        'buku_kia'=>$this->input->post('bukuKia'),
                        'alamat'=>$this->input->post('alamat'),
                        'hpht'=>$this->input->post('hpht'),
                        'tp'=>$this->input->post('tp'),
                        'bb'=>$this->input->post('bb'),
                        'tb'=>$this->input->post('tb'),
                        'usia_kehamilan'=>$this->input->post('usiaKehamilan'),
                        'gpa'=>$this->input->post('gpa'),
                        'k1'=>$this->input->post('k1'),
                        'k4'=>$this->input->post('k4'),
                        'tt'=>$this->input->post('tt'),
                        'lila'=>$this->input->post('lila'),
                        'hb'=>$this->input->post('hb'),
                        'resiko'=>$this->input->post('resiko'),
                        'keterangan'=>$this->input->post('keterangan'),
                        'baru_lama'=>$this->input->post('baruLama'),
                        'catatan'=>$this->input->post('catatan'));
                    $prosesDpk = $this->Pasien_model->simpanPemeriksaanKehamilan($dataDpk); 
                    $proses = $this->Pasien_model->simpanAntrian($data);
                    if (!$proses & !$prosesDpk) {
                            // header('Location: antrian.php');
                            //script pake print nomot antrian
                            $url = base_url('index.php/cetakAntrian');
                            echo "<script>window.open('".$url."','_blank');</script>";
                            echo "<script>history.go(-2);</script>";

                            //script ga pake print nomor antrian
                            // echo "<script>alert('Data Berhasil Disimpan');window.location='index'</script>";

                        } else {
                            echo "<script>alert('Data Gagal Di Simpan');history.go(-2)</script>";
                        }
                }
                // end fungsi simpan data ke table detail pemeriksaan kehamilan
      
        } else if ($idLayanan == 3){
                // start fungsi simpan data ke table persalinan
                if (empty($antrian)) {
                //untuk simpan ke table antrian
                $no = "1";
                $data = array('created_at'=>$dateNow,
                          'id_dokter'=>$this->input->post('namaDokter'),
                          'id_pasien'=>$this->input->post('namaPasien'),
                          'no_antrian'=>$no,
                          'status_antrian'=>$statusAntrian,
                          'id_jenis_pelayanan'=>$this->input->post('jenisPelayanan'),
                          'tgl_antrian'=>$dateNow,
                           'kode_antrian'=>$this->input->post('kode_antrian'));
                
                //untuk simpan ke table persalinan
                $dataPs = array('id_antrian'=>$kodeAntrian,
                    'id_pasien'=>$this->input->post('namaPasien'),
                    'umur'=>$this->input->post('umur'),
                    'alamat'=>$this->input->post('alamat'),
                    'anak_ke'=>$this->input->post('anakKe'),
                    'bb'=>$this->input->post('bb'),
                    'pb'=>$this->input->post('pb'),
                    'tgl_lahir'=>$this->input->post('tglLahir'),
                    'jam_lahir'=>$this->input->post('jamLahir'),
                    'jenis_kelamin'=>$this->input->post('jenisKelamin'),
                    'imd'=>$this->input->post('imd'),
                    'lingkar_kepala'=>$this->input->post('lingkarKepala'),
                    'resiko'=>$this->input->post('resikoPersalinan'),
                    'keterangan'=>$this->input->post('keteranganPersalinan'),
                    'catatan'=>$this->input->post('catatanPersalinan'));

                $prosesPs = $this->Pasien_model->simpanDataPersalinan($dataPs); // simpan data ke table detail_persalinan
                $proses = $this->Pasien_model->simpanAntrian($data); //simpan data antrian ke table antrian
                        
                        if (!$proses & !$prosesPs) {
                                //script pake print nomor antrian
                                $url = base_url('index.php/cetakAntrian');
                                echo "<script>window.open('".$url."','_blank');</script>";
                                echo "<script>history.go(-2);</script>";

                                //script ga pake print
                                // echo "<script>alert('Data Berhasil Disimpan');window.location='index'</script>";
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
                        //untuk simpan ke table persalinan
                        $dataPs = array('id_antrian'=>$kodeAntrian,
                            'id_pasien'=>$this->input->post('namaPasien'),
                            'umur'=>$this->input->post('umur'),
                            'alamat'=>$this->input->post('alamat'),
                            'anak_ke'=>$this->input->post('anakKe'),
                            'bb'=>$this->input->post('bb'),
                            'pb'=>$this->input->post('pb'),
                            'tgl_lahir'=>$this->input->post('tglLahir'),
                            'jam_lahir'=>$this->input->post('jamLahir'),
                            'jenis_kelamin'=>$this->input->post('jenisKelamin'),
                            'imd'=>$this->input->post('imd'),
                            'lingkar_kepala'=>$this->input->post('lingkarKepala'),
                            'resiko'=>$this->input->post('resikoPersalinan'),
                            'keterangan'=>$this->input->post('keteranganPersalinan'),
                            'catatan'=>$this->input->post('catatanPersalinan'));

                        $prosesPs = $this->Pasien_model->simpanDataPersalinan($dataPs); // simpan data ke table detail_persalinan
                        $proses = $this->Pasien_model->simpanAntrian($data);
                        if (!$proses & !$prosesPs ) {
                                // header('Location: antrian.php');
                                //script pake print nomot antrian
                                $url = base_url('index.php/cetakAntrian');
                                echo "<script>window.open('".$url."','_blank');</script>";
                                echo "<script>history.go(-2);</script>";

                                //script ga pake print nomor antrian
                                // echo "<script>alert('Data Berhasil Disimpan');window.location='index'</script>";

                            } else {
                                echo "<script>alert('Data Gagal Di Simpan');history.go(-2)</script>";
                            }
                    }
                    // end fungsi simpan data ke table persalinan
            
        } else if ($idLayana == 8){
            echo "Jalankan Imunisasi";
        }
        
            
        
			
    }
    public function simpanPendaftaranBaru(){
    	$dateNow = $waktuSekarang = gmdate("Y-m-d H:i:s", time()+60*60*7);
    	$data = array('created_at'=>$dateNow,
    			'jk_pasien'=>$this->input->post('jk_pasien'),
                'no_registrasi'=>$this->input->post('no_registrasi'),
                'nik'=>$this->input->post('nik'),
                'nama_pasien'=>$this->input->post('nama_pasien'),
                'tgl_lahir'=>$this->input->post('tgl_lahir'),
                'pendidikan_istri'=>$this->input->post('pendidikan_istri'),
                'agama_istri'=>$this->input->post('agama_istri'),
                'pekerjaan_istri'=>$this->input->post('pekerjaan_istri'),
                'alamat_ktp_istri'=>$this->input->post('alamat_ktp_istri'),
                'alamat_istri'=>$this->input->post('alamat_istri'),
                'nama_ayah_kandung'=>$this->input->post('nama_ayah_kandung'),
                'nama_suami'=>$this->input->post('nama_suami'),
                'tgl_lahir_suami'=>$this->input->post('tgl_lahir_suami'),
                'pendidikan_suami'=>$this->input->post('pendidikan_suami'),
                'agama_suami'=>$this->input->post('agama_suami'),
                'pekerjaan_suami'=>$this->input->post('pekerjaan_suami'),
                'alamat_ktp_suami'=>$this->input->post('alamat_ktp_suami'),
                'alamat_suami'=>$this->input->post('alamat_suami'),
                'id_kota'=>$this->input->post('id_kota'),
                'id_desa'=>$this->input->post('id_desa'),
                'gol_darah'=>$this->input->post('gol_darah'),
                'no_telp_pasien'=>$this->input->post('no_telp_pasien'),
                'email'=>$this->input->post('email'),
                'medsos'=>$this->input->post('medsos'),
                'catatan_bidan'=>$this->input->post('catatan_bidan'));
		$proses=$this->Pasien_model->simpanDataPasien($data);
			if (!$proses) {
				//script pake print kartu berobat
					$getId = $this->input->post('idPasien');
					$idPasien= $getId + 1;
                    $url = base_url('index.php/CetakKartuPasien');
					$urlKunjungan = base_url('index.php/Pasien/getDataKunjungan/'.$idPasien.'');
                    echo "<script>window.open('".$url."','_blank');</script>";
                    // echo "<script>history.go(-2);</script>";
				    
                	echo "<script>window.location='".$urlKunjungan."'</script>";
                //script ga pake print kartu berobat
                // echo "<script>alert('Data Berhasil Di Simpan');history.go(-2);</script>";
				
			} else {
				echo "Data Gagal Disimpan";
				echo "<br>";
				echo "<a href='".base_url('index.php/DataDokter/index/')."'>Kembali ke form</a>";
			}

    }
    public function pendaftaranBaru(){
    	$data['tNoRegis']=$this->Pasien_model->getNoRegis();
    	$data['tPekerjaan']=$this->Pasien_model->getPekerjaan();
    	$data['tKota'] = $this->Pasien_model->getKota();
    	$data['tDesa'] = $this->Pasien_model->getDesa();
    	$this->load->view('form_pendaftaran',$data);
    }
    



}