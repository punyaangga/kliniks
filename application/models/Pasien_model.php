<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {

	public function tampilDataPasien(){
        $tPasien = $this->db->get('pasiens');
        return $tPasien;
    }
    public function getDataKunjungan($id){
        $query = $this->db->query("SELECT * FROM pasiens WHERE id='$id'");
        return $query;
    }
    public function getDokter(){
        $tDokter = $this->db->get('dokters');
        return $tDokter;
    }

    public function getJenisPelayanan(){
        return $this->db->get('jenis_pelayanans')->result_array();
    }

    public function getNoPelayanan($idpelayanan)
    {
        $dateNow=date('yy-m-d');
        return $this->db->query("SELECT * FROM antrians WHERE id_jenis_pelayanan LIKE '$idpelayanan' and tgl_antrian LIKE '$dateNow%' ORDER BY no_antrian DESC LIMIT 1")->result();
    }

    public function getKodeAntrian(){
        $kdAntrian = $this->db->query("SELECT kode_antrian,id FROM antrians order by id DESC LIMIT 1 ");
        return $kdAntrian;
    }
    public function getNoRegis(){
        $tNoRegis=$this->db->query("SELECT * FROM pasiens ORDER BY id DESC LIMIT 1");
        return $tNoRegis;
    }
    public function getPekerjaan(){
        $tPekerjaan=$this->db->get('pekerjaans');
        return $tPekerjaan;
    }
    public function getKota(){
        $tKota=$this->db->get('kotas');
        return $tKota;
    }
    public function getDesa(){
        $tDesa = $this->db->get('desas');
        return $tDesa;
    }
    public function simpanAntrian($data){
        $sAntrian=$this->db->insert('antrians',$data);
    }
    public function simpanPemeriksaanKehamilan($data){
        $sKunjungan= $this->db->insert('detail_pemeriksaan_kehamilan',$data);
    }
    public function simpanDataPasien($data){
        $sPasien=$this->db->insert('pasiens',$data);
    }

}