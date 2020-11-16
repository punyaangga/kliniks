<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function tampilPasienDilayani(){
        $tanggalSekarang = date('Y-m-d');

         $query = $this->db->query("SELECT SUBSTRING(a.tgl_antrian,1,10) ,a.*, b.`nama_dokter`, c.`nama_pasien`, d.`nama_pelayanan` 
            FROM `antrians` a LEFT JOIN `dokters` b ON a.`id_dokter` = b.`id` 
            LEFT JOIN `pasiens` c ON a.`id_pasien` = c.`id` 
            LEFT JOIN `jenis_pelayanans` d ON a.`id_jenis_pelayanan` = d.`id` 
            where status_antrian='selesai' && SUBSTRING(a.tgl_antrian,1,10)='$tanggalSekarang'  ");
          // $query = $this->db->query("SELECT a.*, b.`nama_dokter`, c.`nama_pasien`, d.`nama_pelayanan` FROM `antrians` a LEFT JOIN `dokters` b ON a.`id_dokter` = b.`id` LEFT JOIN `pasiens` c ON a.`id_pasien` = c.`id` LEFT JOIN `jenis_pelayanans` d ON a.`id_jenis_pelayanan` = d.`id` where status_antrian='selesai' ");
        return $query;
    }
    public function tampilPasienHarusDilayani(){
        //codingan dibawah digunakan untuk menampilkan semua data yang berstatus proses serta tanggal nya hari ini
        $tanggalSekarang = date('Y-m-d');
        $harusDilayani = $this->db->query("SELECT a.id,a.id_pasien,a.no_antrian,a.status_antrian,a.tgl_antrian,d.nama_dokter, p.nama_pasien, j.nama_pelayanan 
                                            FROM antrians AS a JOIN dokters AS d ON a.id_dokter = d.id 
                                            JOIN pasiens AS p ON a.id_pasien = p.id 
                                            JOIN jenis_pelayanans AS j ON a.id_jenis_pelayanan = j.id 
                                            where a.status_antrian ='proses' && SUBSTRING(a.tgl_antrian,1,10)='$tanggalSekarang'
                                            order by a.id ASC ");

        return $harusDilayani;
    }
    
    public function updateAntrian($id,$data){
        $this->db->update('antrians',$data,array('id'=>$id));
    }

    
}