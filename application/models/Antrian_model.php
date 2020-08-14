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
    
    //fungsi untuk halaman Form Edit Kunjungan
    public function getDataAntrian($id)
    {
        $query = $this->db->query(" SELECT jp.id as idPelayanan,jp.nama_pelayanan, p.id as idPasien,
                                    p.nama_pasien,p.tgl_lahir,p.nik,p.nama_suami,p.alamat_ktp_istri,p.no_kk,d.id as idDokter,
                                    d.nama_dokter, a.no_antrian, a.kode_antrian, a.tgl_antrian
                                    FROM antrians as a 
                                    JOIN jenis_pelayanans as jp  ON a.id_jenis_pelayanan = jp.id 
                                    JOIN pasiens as p ON p.id = a.id_pasien 
                                    JOIN dokters as d ON d.id = a.id_dokter
                                    where a.id='$id'");
        return $query;
    }

    public function getPemeriksaanKehamilan($idAntrian){
        $getPk = $this->db->query("SELECT * FROM detail_pemeriksaan_kehamilan where id_antrian='$idAntrian'");
        return $getPk;
    }
 


}