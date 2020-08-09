<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakAntrian_model extends CI_Model {
	public function cetak(){
		$cetak = $this->db->query('SELECT a.id,d.nama_dokter,p.nama_pasien,jp.nama_pelayanan,
								 a.no_antrian,a.tgl_antrian,a.kode_antrian
								 FROM antrians as a JOIN dokters as d ON a.id_dokter = d.id
								 JOIN pasiens as p ON a.id_pasien = p.id
								 JOIN jenis_pelayanans as jp ON jp.id=a.id_jenis_pelayanan ORDER BY a.id DESC LIMIT 1');
		return $cetak;
	}
}