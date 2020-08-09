<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanKunjungan_model extends CI_Model {


    public function kehamilan($tanggal){

        $dateNow = date('yy-m-d');
        $pecahDate= explode('-', $dateNow);
        $bulan = $pecahDate[1];
        $tahun = $pecahDate[0];
        $tanggal= strlen($tanggal) == 1 ? "0".$tanggal : $tanggal;
       
        $tgl = $tahun.'-'.$bulan.'-'.$tanggal;
        return $this->db->query("SELECT COUNT(id_jenis_pelayanan) as jmlKunjungan FROM `antrians` WHERE id_jenis_pelayanan = '1' and tgl_antrian LIKE '$tgl%'")->result();
        // var_dump($this->db->query("SELECT COUNT(id_jenis_pelayanan) as jmlKunjungan FROM `antrians` WHERE id_jenis_pelayanan = '1' and tgl_antrian LIKE '$tgl%'")->result());
    }

    public function persalinan($tanggal){

        $dateNow = date('yy-m-d');
        $pecahDate= explode('-', $dateNow);
        $bulan = $pecahDate[1];
        $tahun = $pecahDate[0];
        $tanggal= strlen($tanggal) == 1 ? "0".$tanggal : $tanggal;
       
        $tgl = $tahun.'-'.$bulan.'-'.$tanggal;
        return $this->db->query("SELECT COUNT(id_jenis_pelayanan) as jmlKunjungan FROM `antrians` WHERE id_jenis_pelayanan = '3' and tgl_antrian LIKE '$tgl%'")->result();
        // var_dump($this->db->query("SELECT COUNT(id_jenis_pelayanan) as jmlKunjungan FROM `antrians` WHERE id_jenis_pelayanan = '1' and tgl_antrian LIKE '$tgl%'")->result());
    
    }

    public function imunisasi($tanggal){

        $dateNow = date('yy-m-d');
        $pecahDate= explode('-', $dateNow);
        $bulan = $pecahDate[1];
        $tahun = $pecahDate[0];
        $tanggal= strlen($tanggal) == 1 ? "0".$tanggal : $tanggal;
       
        $tgl = $tahun.'-'.$bulan.'-'.$tanggal;
        return $this->db->query("SELECT COUNT(id_jenis_pelayanan) as jmlKunjungan FROM `antrians` WHERE id_jenis_pelayanan = '8' and tgl_antrian LIKE '$tgl%'")->result();
        // var_dump($this->db->query("SELECT COUNT(id_jenis_pelayanan) as jmlKunjungan FROM `antrians` WHERE id_jenis_pelayanan = '1' and tgl_antrian LIKE '$tgl%'")->result());
    
    }
    public function pemeriksaanUmum($tanggal){

        $dateNow = date('yy-m-d');
        $pecahDate= explode('-', $dateNow);
        $bulan = $pecahDate[1];
        $tahun = $pecahDate[0];
        $tanggal= strlen($tanggal) == 1 ? "0".$tanggal : $tanggal;
       
        $tgl = $tahun.'-'.$bulan.'-'.$tanggal;
        return $this->db->query("SELECT COUNT(id_jenis_pelayanan) as jmlKunjungan FROM `antrians` WHERE id_jenis_pelayanan = '9' and tgl_antrian LIKE '$tgl%'")->result();
        // var_dump($this->db->query("SELECT COUNT(id_jenis_pelayanan) as jmlKunjungan FROM `antrians` WHERE id_jenis_pelayanan = '1' and tgl_antrian LIKE '$tgl%'")->result());
    
    }
    public function ispa($tanggal){

        $dateNow = date('yy-m-d');
        $pecahDate= explode('-', $dateNow);
        $bulan = $pecahDate[1];
        $tahun = $pecahDate[0];
        $tanggal= strlen($tanggal) == 1 ? "0".$tanggal : $tanggal;
       
        $tgl = $tahun.'-'.$bulan.'-'.$tanggal;
        return $this->db->query("SELECT COUNT(id_jenis_pelayanan) as jmlKunjungan FROM `antrians` WHERE id_jenis_pelayanan = '34' and tgl_antrian LIKE '$tgl%'")->result();
        // var_dump($this->db->query("SELECT COUNT(id_jenis_pelayanan) as jmlKunjungan FROM `antrians` WHERE id_jenis_pelayanan = '1' and tgl_antrian LIKE '$tgl%'")->result());
    
    }
    public function kb($tanggal){

        $dateNow = date('yy-m-d');
        $pecahDate= explode('-', $dateNow);
        $bulan = $pecahDate[1];
        $tahun = $pecahDate[0];
        $tanggal= strlen($tanggal) == 1 ? "0".$tanggal : $tanggal;
       
        $tgl = $tahun.'-'.$bulan.'-'.$tanggal;
        return $this->db->query("SELECT COUNT(id_jenis_pelayanan) as jmlKunjungan FROM `antrians` WHERE id_jenis_pelayanan = '37' and tgl_antrian LIKE '$tgl%'")->result();
        // var_dump($this->db->query("SELECT COUNT(id_jenis_pelayanan) as jmlKunjungan FROM `antrians` WHERE id_jenis_pelayanan = '1' and tgl_antrian LIKE '$tgl%'")->result());
    
    }





   

}