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
    public function getDataPenyakit(){
        $getDp = $this->db->get('jenis_penyakit');
        return $getDp;
    }
    public function getDataRentangUmur(){
        $getRu = $this->db->get('rentang_umur');
        return $getRu;
    }
    public function getDataMacamTindakan(){
        $getMt = $this->db->get('macam_tindakan_imunisasi');
        return $getMt;
    }


    public function getPemeriksaanKehamilan($idAntrian){
        $getPk = $this->db->query("SELECT * FROM detail_pemeriksaan_kehamilan where id_antrian='$idAntrian'");
        return $getPk;
    }
    public function getPemeriksaanUmum($idAntrian){
        $getPu = $this->db->query("SELECT pu.*, jp.nama_penyakit,mti.nama_tindakan,ru.rentang_umur FROM detail_pemeriksaan_umum as pu 
                                    JOIN jenis_penyakit as jp
                                    ON pu.id_penyakit = jp.id
                                    JOIN macam_tindakan_imunisasi as mti
                                    ON pu.id_macam_tindakan_imunisasi = mti.id
                                    JOIN rentang_umur as ru
                                    ON pu.id_rentang_umur = ru.id
                                    where pu.id_antrian='$idAntrian'");
        return $getPu;
    }
    public function getPemeriksaanKb($idAntrian){
        $getKb = $this->db->query("SELECT dpk.*,ak.nama_alat FROM detail_pemeriksaan_kb as dpk 
                                    JOIN alat_kontrasepsi as ak 
                                    ON dpk.id_alat_kontrasepsi = ak.id 
                                    where id_antrian='$idAntrian'");
        return $getKb;
    }
    public function getPemeriksaanImunisasi($idAntrian){
        $getImunisasi = $this->db->query("SELECT di.*,ti.nama_tindakan FROM detail_imunisasi as di 
                        JOIN macam_tindakan_imunisasi as ti 
                        ON di.id_macam_tindakan_imunisasi = ti.id
                        WHERE id_antrian ='$idAntrian'");
        return $getImunisasi;
    }
    public function getPemeriksaanPersalinan($idAntrian) {
        $getPersalinan = $this->db->query("SELECT * FROM detail_persalinan WHERE id_antrian = '$idAntrian'");
        return $getPersalinan;
    }
    public function getPemeriksaanIspa($idAntrian){
        $getIspa = $this->db->query("SELECT * FROM detail_program_ispa WHERE id_antrian = '$idAntrian'");
        return $getIspa;
    }
 


}