<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian_model extends CI_Model {

    public function getKunjunganPasien(){
        $kunjunganPasien = $this->db->query('SELECT a.id,a.id_pasien,a.kode_antrian,a.no_antrian,a.status_antrian,a.tgl_antrian,d.nama_dokter, p.nama_pasien, j.nama_pelayanan 
                                            FROM antrians AS a JOIN dokters AS d ON a.id_dokter = d.id 
                                            JOIN pasiens AS p ON a.id_pasien = p.id 
                                            JOIN jenis_pelayanans AS j ON a.id_jenis_pelayanan = j.id ORDER BY a.tgl_antrian DESC ');
        return $kunjunganPasien;
    }   
     public function hapusDataAntrian($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('antrians');
    }
    public function simpanAntrian($data){
        $this->db->insert('antrians',$data);
    }
    public function getKodeAntrian(){
        $kdAntrian = $this->db->query("SELECT kode_antrian FROM antrians order by id DESC LIMIT 1 ");
        return $kdAntrian;
    }








    //fungsi untuk halaman Form Edit Kunjungan
    public function getDataAntrian($id)
    {
        $query = $this->db->query(" SELECT jp.id as idPelayanan,jp.nama_pelayanan, p.id as idPasien,p.nama_pasien,d.id as idDokter, d.nama_dokter, a.no_antrian, a.kode_antrian, a.tgl_antrian
                                    FROM antrians as a 
                                    JOIN jenis_pelayanans as jp  ON a.id_jenis_pelayanan = jp.id 
                                    JOIN pasiens as p ON p.id = a.id_pasien 
                                    JOIN dokters as d ON d.id = a.id_dokter
                                    where a.id='$id'");
        return $query;
    }
    public function updateDataAntrian($id,$data){
        $this->db->update('antrians',$data, array('id' => $id));
    }

    //get semua data kunjungan
    public function getJenisPelayanan(){
        return $this->db->get('jenis_pelayanans')->result_array();
    }
    public function getNoPelayanan($idpelayanan)
    {
        $dateNow=date('yy-m-d');
        return $this->db->query("SELECT * FROM antrians WHERE id_jenis_pelayanan LIKE '$idpelayanan' and tgl_antrian LIKE '$dateNow%' ORDER BY no_antrian DESC LIMIT 1")->result();
    }
    public function getAllPasien(){
        $allPasien = $this->db->get('pasiens');
        return $allPasien;
    }
    public function getAllDokter(){
        $allDokter = $this->db->get('dokters');
        return $allDokter;
    }
    //end get semua data kunjungan

    public function updateDataKunjungan($id,$data){
        $this->db->update('antrians',$data, array('id' => $id));
    }
    //end fungsi untuk halaman form edit kunjungan

}