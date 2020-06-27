<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAngga_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function simpanDataPasien($data){
        $this->db->insert('pasiens',$data);
    }
    public function tampilPasienDilayani(){
        // $query = $this->db->get('users');
        // return $query;
        $tanggalSekarang = date('Y-m-d');

         $query = $this->db->query("SELECT SUBSTRING(a.tgl_antrian,1,10) ,a.*, b.`nama_dokter`, c.`nama_pasien`, d.`nama_pelayanan` FROM `antrians` a LEFT JOIN `dokters` b ON a.`id_dokter` = b.`id` LEFT JOIN `pasiens` c ON a.`id_pasien` = c.`id` LEFT JOIN `jenis_pelayanans` d ON a.`id_jenis_pelayanan` = d.`id` where status_antrian='selesai' && SUBSTRING(a.tgl_antrian,1,10)='$tanggalSekarang'");
          // $query = $this->db->query("SELECT a.*, b.`nama_dokter`, c.`nama_pasien`, d.`nama_pelayanan` FROM `antrians` a LEFT JOIN `dokters` b ON a.`id_dokter` = b.`id` LEFT JOIN `pasiens` c ON a.`id_pasien` = c.`id` LEFT JOIN `jenis_pelayanans` d ON a.`id_jenis_pelayanan` = d.`id` where status_antrian='selesai' ");
        return $query;
    }
    public function tampilPasienHarusDilayani(){
        $harusDilayani = $this->db->query("SELECT a.id,a.no_antrian,a.status_antrian,a.tgl_antrian,d.nama_dokter, p.nama_pasien, j.nama_pelayanan 
                                            FROM antrians AS a JOIN dokters AS d ON a.id_dokter = d.id 
                                            JOIN pasiens AS p ON a.id_pasien = p.id 
                                            JOIN jenis_pelayanans AS j ON a.id_jenis_pelayanan = j.id 
                                            where a.status_antrian ='proses' 
                                            order by a.no_antrian ASC ");
        return $harusDilayani;
    }
    public function tampilPasienSedangDilayani(){
        $sedangDilayani = $this->db->query("SELECT a.id,a.no_antrian,a.status_antrian,a.tgl_antrian,d.nama_dokter, p.nama_pasien, j.nama_pelayanan 
                                            FROM antrians AS a JOIN dokters AS d ON a.id_dokter = d.id 
                                            JOIN pasiens AS p ON a.id_pasien = p.id 
                                            JOIN jenis_pelayanans AS j ON a.id_jenis_pelayanan = j.id 
                                            where a.status_antrian ='Sedang Dilayani' 
                                            order by a.no_antrian ASC ");
        return $sedangDilayani;
    }
    
    public function updateAntrian($id,$data){
        $this->db->update('antrians',$data,array('id'=>$id));
    }
    
    // start komentar sementara
    // public function infoPelayanan(){
    //     $jenisPelayanan =  $this->db->get("jenis_pelayanans");
    //     return $jenisPelayanan;
    // }
    // public function infoDokter(){
    //     $namaDokter = $this->db->get("dokters");
    //     return $namaDokter;
    // }
    // public function infoPasien(){
    //     $namaPasien = $this ->db->get("pasiens");
    //     return $namaPasien;
    // }
    // end komentar sementara
   

	// function _get_dilayani($data = array())
 //    {
 //        $d = date('Y-m-d');

 //        $q = "SELECT a.*, b.`nama_dokter`, c.`nama_pasien`, d.`nama_pelayanan` FROM `antrians` a LEFT JOIN `dokters` b ON a.`id_dokter` = b.`id` LEFT JOIN `pasiens` c ON a.`id_pasien` = c.`id` LEFT JOIN `jenis_pelayanans` d ON a.`id_jenis_pelayanan` = d.`id` ";

 //        if ($data['search']['value'] && !isset($data['all'])) {
 //            $s = $this->db->escape_str($data['search']['value']);
 //            $q .= "WHERE (a.`status_antrian` LIKE '%". $s ."%' OR a.`tgl_antrian` LIKE '%". $s ."%' OR b.`nama_dokter` LIKE '%". $s ."%' OR c.`nama_pasien` LIKE '%". $s ."%' OR d.`nama_pelayanan` LIKE '%". $s ."%' OR a.`kode_antrian` LIKE '%". $s ."%') AND a.`status_antrian` = 'Proses' AND a.`deleted_at` IS NULL ";
 //        } else{
 //            $q .= "WHERE a.`status_antrian` = 'Proses' AND a.`deleted_at` IS NULL ";
 //        }

 //        if (isset($data['order'])) {
 //            $dir = $this->db->escape_str($data['order'][0]['dir']);
 //            $col = $this->db->escape_str($data['columns'][$data['order'][0]['column']]['data']);
 //            if ($data['order'][0]['column'] != 0) {
 //                if ($col == 'nama_dokter') {
 //                    $q .= "ORDER BY b.`nama_dokter` ". $dir ." ";
 //                } elseif ($col == 'nama_pasien') {
 //                    $q .= "ORDER BY c.`nama_pasien` ". $dir ." ";
 //                } elseif ($col == 'nama_pelayanan') {
 //                    $q .= "ORDER BY d.`nama_pelayanan` ". $dir ." ";
 //                } else {
 //                    $q .= "ORDER BY a.`". $col ."` ". $dir ." ";
 //                }
 //            } else{
 //                $q .= "ORDER BY a.`id` ". $dir ." ";
 //            }
 //        } else{
 //            $q .= "ORDER BY a.`id` DESC ";
 //        }

 //        return $q;
 //    }

 //    function _list_dilayani($data = array())
 //    {
 //        $q = $this->_get_dilayani($data);
 //        $q .= "LIMIT ". $this->db->escape_str($data['start']) .", ". $this->db->escape_str($data['length']);
 //        $r = $this->db->query($q, false)->result_array();
        
 //        return $r;
 //    }

 //    function _filtered_dilayani($data = array())
 //    {
 //        $q = $this->_get_dilayani($data);
 //        $r = $this->db->query($q, false)->result_array();
        
 //        return count($r);
 //    }

 //    function _all_dilayani($data = array())
 //    {
 //        $data['all'] = true;
 //        $q = $this->_get_dilayani($data);
 //        $r = $this->db->query($q)->result_array();
        
 //        return count($r);
 //    }
    
 //    function datatable_dilayani($data = array())
 //    {
 //        $result = array(
 //            'draw'              => 1,
 //            'recordsTotal'      => 0,
 //            'recordsFiltered'   => 0,
 //            'data'              => array(),
 //            'result'            => false,
 //            'msg'               => ''
 //        );

 //        $list = $this->_list_dilayani($data);
 //        if (count($list) > 0) {
 //            $result = array(
 //                'draw'              => $data['draw'],
 //                'recordsTotal'      => $this->_all_dilayani($data),
 //                'recordsFiltered'   => $this->_filtered_dilayani($data),
 //                'data'              => $list,
 //                'result'            => true,
 //                'msg'               => 'Loaded.',
 //                'start'             => (int) $data['start'] + 1
 //            );
 //        } else{
 //            $result['msg'] = 'No data left.';
 //        }

 //        return $result;
 //    }

 //    function _get_proses($data = array())
 //    {
 //        $d = date('Y-m-d');

 //        $q = "SELECT a.*, b.`nama_dokter`, c.`nama_pasien`, d.`nama_pelayanan` FROM `antrians` a LEFT JOIN `dokters` b ON a.`id_dokter` = b.`id` LEFT JOIN `pasiens` c ON a.`id_pasien` = c.`id` LEFT JOIN `jenis_pelayanans` d ON a.`id_jenis_pelayanan` = d.`id` ";

 //        if ($data['search']['value'] && !isset($data['all'])) {
 //            $s = $this->db->escape_str($data['search']['value']);
 //            $q .= "WHERE (a.`status_antrian` LIKE '%". $s ."%' OR a.`tgl_antrian` LIKE '%". $s ."%' OR b.`nama_dokter` LIKE '%". $s ."%' OR c.`nama_pasien` LIKE '%". $s ."%' OR d.`nama_pelayanan` LIKE '%". $s ."%' OR a.`kode_antrian` LIKE '%". $s ."%') AND a.`status_antrian` = 'Sedang Dilayani' AND a.`deleted_at` IS NULL ";
 //        } else{
 //            $q .= "WHERE a.`status_antrian` = 'Sedang Dilayani' AND a.`deleted_at` IS NULL ";
 //        }

 //        if (isset($data['order'])) {
 //            $dir = $this->db->escape_str($data['order'][0]['dir']);
 //            $col = $this->db->escape_str($data['columns'][$data['order'][0]['column']]['data']);
 //            if ($data['order'][0]['column'] != 0) {
 //                if ($col == 'nama_dokter') {
 //                    $q .= "ORDER BY b.`nama_dokter` ". $dir ." ";
 //                } elseif ($col == 'nama_pasien') {
 //                    $q .= "ORDER BY c.`nama_pasien` ". $dir ." ";
 //                } elseif ($col == 'nama_pelayanan') {
 //                    $q .= "ORDER BY d.`nama_pelayanan` ". $dir ." ";
 //                } else {
 //                    $q .= "ORDER BY a.`". $col ."` ". $dir ." ";
 //                }
 //            } else{
 //                $q .= "ORDER BY a.`id` ". $dir ." ";
 //            }
 //        } else{
 //            $q .= "ORDER BY a.`id` DESC ";
 //        }

 //        return $q;
 //    }

 //    function _list_proses($data = array())
 //    {
 //        $q = $this->_get_proses($data);
 //        $q .= "LIMIT ". $this->db->escape_str($data['start']) .", ". $this->db->escape_str($data['length']);
 //        $r = $this->db->query($q, false)->result_array();
        
 //        return $r;
 //    }

 //    function _filtered_proses($data = array())
 //    {
 //        $q = $this->_get_proses($data);
 //        $r = $this->db->query($q, false)->result_array();
        
 //        return count($r);
 //    }

 //    function _all_proses($data = array())
 //    {
 //        $data['all'] = true;
 //        $q = $this->_get_proses($data);
 //        $r = $this->db->query($q)->result_array();
        
 //        return count($r);
 //    }
    
 //    function datatable_proses($data = array())
 //    {
 //        $result = array(
 //            'draw'              => 1,
 //            'recordsTotal'      => 0,
 //            'recordsFiltered'   => 0,
 //            'data'              => array(),
 //            'result'            => false,
 //            'msg'               => ''
 //        );

 //        $list = $this->_list_proses($data);
 //        if (count($list) > 0) {
 //            $result = array(
 //                'draw'              => $data['draw'],
 //                'recordsTotal'      => $this->_all_proses($data),
 //                'recordsFiltered'   => $this->_filtered_proses($data),
 //                'data'              => $list,
 //                'result'            => true,
 //                'msg'               => 'Loaded.',
 //                'start'             => (int) $data['start'] + 1
 //            );
 //        } else{
 //            $result['msg'] = 'No data left.';
 //        }

 //        return $result;
 //    }

 //    function _get_terlayani($data = array())
 //    {
 //        $d = date('Y-m-d');

 //        $q = "SELECT a.*, b.`nama_dokter`, c.`nama_pasien`, d.`nama_pelayanan` FROM `antrians` a LEFT JOIN `dokters` b ON a.`id_dokter` = b.`id` LEFT JOIN `pasiens` c ON a.`id_pasien` = c.`id` LEFT JOIN `jenis_pelayanans` d ON a.`id_jenis_pelayanan` = d.`id` ";

 //        if ($data['search']['value'] && !isset($data['all'])) {
 //            $s = $this->db->escape_str($data['search']['value']);
 //            $q .= "WHERE (a.`status_antrian` LIKE '%". $s ."%' OR a.`tgl_antrian` LIKE '%". $s ."%' OR b.`nama_dokter` LIKE '%". $s ."%' OR c.`nama_pasien` LIKE '%". $s ."%' OR d.`nama_pelayanan` LIKE '%". $s ."%' OR a.`kode_antrian` LIKE '%". $s ."%' OR a.`tgl_antrian` LIKE '". $d ."%') AND a.`status_antrian` = 'Selesai' AND a.`deleted_at` IS NULL ";
 //        } else{
 //            $q .= "WHERE a.`status_antrian` = 'Selesai' AND a.`deleted_at` IS NULL ";
 //        }

 //        if (isset($data['order'])) {
 //            $dir = $this->db->escape_str($data['order'][0]['dir']);
 //            $col = $this->db->escape_str($data['columns'][$data['order'][0]['column']]['data']);
 //            if ($data['order'][0]['column'] != 0) {
 //                if ($col == 'nama_dokter') {
 //                    $q .= "ORDER BY b.`nama_dokter` ". $dir ." ";
 //                } elseif ($col == 'nama_pasien') {
 //                    $q .= "ORDER BY c.`nama_pasien` ". $dir ." ";
 //                } elseif ($col == 'nama_pelayanan') {
 //                    $q .= "ORDER BY d.`nama_pelayanan` ". $dir ." ";
 //                } else {
 //                    $q .= "ORDER BY a.`". $col ."` ". $dir ." ";
 //                }
 //            } else{
 //                $q .= "ORDER BY a.`id` ". $dir ." ";
 //            }
 //        } else{
 //            $q .= "ORDER BY a.`id` DESC ";
 //        }

 //        return $q;
 //    }

 //    function _list_terlayani($data = array())
 //    {
 //        $q = $this->_get_terlayani($data);
 //        $q .= "LIMIT ". $this->db->escape_str($data['start']) .", ". $this->db->escape_str($data['length']);
 //        $r = $this->db->query($q, false)->result_array();
        
 //        return $r;
 //    }

 //    function _filtered_terlayani($data = array())
 //    {
 //        $q = $this->_get_terlayani($data);
 //        $r = $this->db->query($q, false)->result_array();
        
 //        return count($r);
 //    }

 //    function _all_terlayani($data = array())
 //    {
 //        $data['all'] = true;
 //        $q = $this->_get_terlayani($data);
 //        $r = $this->db->query($q)->result_array();
        
 //        return count($r);
 //    }
    
 //    function datatable_terlayani($data = array())
 //    {
 //        $result = array(
 //            'draw'              => 1,
 //            'recordsTotal'      => 0,
 //            'recordsFiltered'   => 0,
 //            'data'              => array(),
 //            'result'            => false,
 //            'msg'               => ''
 //        );

 //        $list = $this->_list_terlayani($data);
 //        if (count($list) > 0) {
 //            $result = array(
 //                'draw'              => $data['draw'],
 //                'recordsTotal'      => $this->_all_terlayani($data),
 //                'recordsFiltered'   => $this->_filtered_terlayani($data),
 //                'data'              => $list,
 //                'result'            => true,
 //                'msg'               => 'Loaded.',
 //                'start'             => (int) $data['start'] + 1
 //            );
 //        } else{
 //            $result['msg'] = 'No data left.';
 //        }

 //        return $result;
 //    }

 //    function layani($data = array())
 //    {
 //        $result = array(
 //            'result'    => false,
 //            'msg'       => ''  
 //        );

 //        $u = $data['userData'];
 //        $d = $data['postData'];
 //        $id = $d['id'];
 //        $q = "UPDATE `antrians` SET `status_antrian` = 'Sedang Dilayani' WHERE `id` = '". $this->db->escape_str($id) ."';";
 //        if ($this->db->simple_query($q)) {
 //            $result['result'] = true;
 //            $result['msg'] = 'Data berhasil diperbaharui.';
 //        } else{
 //            $result['msg'] = 'Terjadi kesalahan saat memperbaharui data.';
 //        }

 //        return $result;
 //    }

 //    function pre_selesai($id = 0)
 //    {
 //        $result = array(
 //            'result'    => false,
 //            'msg'       => 'Data antrian tidak ditemukan.'  
 //        );

 //        $q =    "SELECT 
 //                    a.*,
 //                    b.`nama_dokter`,
 //                    c.`nama_pasien`,
 //                    c.`tgl_lahir`,
 //                    c.`nama_suami`,
 //                    c.`alamat_istri`,
 //                    c.`nik`,
 //                    c.`no_kk`,
 //                    d.`nama_pelayanan`
 //                FROM 
 //                    `antrians` a 
 //                LEFT JOIN
 //                    `dokters` b
 //                        ON
 //                    a.`id_dokter` = b.`id`
 //                LEFT JOIN
 //                    `pasiens` c
 //                        ON
 //                    a.`id_pasien` = c.`id`
 //                LEFT JOIN
 //                    `jenis_pelayanans` d
 //                        ON
 //                    a.`id_jenis_pelayanan` = d.`id`
 //                WHERE 
 //                    a.`id` = '". $this->db->escape_str($id) ."'
 //                ;";
 //        $r = $this->db->query($q)->result_array();
 //        if (count($r) > 0) {
 //            $result['result'] = true;
 //            $result['data'] = $r[0];
 //        }

 //        return $result;
 //    }

 //    function selesai($data = array())
 //    {
 //        $result = array(
 //            'result'    => false,
 //            'msg'       => ''  
 //        );

 //        $u = $data['userData'];
 //        $d = $data['postData'];
 //        $id = $d['id'];
 //        parse_str($d['form'], $f);

 //        $q = "UPDATE `antrians` SET `status_antrian` = 'Selesai' WHERE `id` = '". $this->db->escape_str($id) ."';";
 //        if ($this->db->simple_query($q)) {
 //            $result['result'] = true;
 //            $result['msg'] = 'Data berhasil diperbaharui.';
 //        } else{
 //            $result['msg'] = 'Terjadi kesalahan saat memperbaharui data.';
 //        }

 //        if ($id != 0) {
 //            $idJenisPelayanan = $f['id_jenis_pelayanan'];
 //            switch ($idJenisPelayanan) {
 //                case '9': // pemeriksaan umum
 //                    $q =    "INSERT INTO 
 //                            `detail_pemeriksaan_umum` 
 //                            (
 //                                `created_at`,
 //                                `id_antrian`,
 //                                `jenis_kelamin`,
 //                                `id_penyakit`,
 //                                `id_rentang_umur`,
 //                                `id_macam_tindakan_imunisasi`,
 //                                `catatan`
 //                            ) 
 //                        VALUES 
 //                            (
 //                                NOW(),
 //                                '". $this->db->escape_str($id) ."',
 //                                '". $this->db->escape_str($f['jenis_kelamin']) ."',
 //                                '". $this->db->escape_str($f['id_penyakit']) ."',
 //                                '". $this->db->escape_str($f['id_rentang_umur']) ."',
 //                                '". $this->db->escape_str($f['id_macam_tindakan_imunisasi_pemeriksaan_umum']) ."',
 //                                '". $this->db->escape_str($f['catatan']) ."'
 //                            )
 //                        ;";
 //                    $this->db->simple_query($q);
 //                    break;
 //                case '34': // program ispa
 //                    $q =    "INSERT INTO 
 //                            `detail_program_ispa` 
 //                            (
 //                                `created_at`,
 //                                `id_antrian`,
 //                                `nama_anak`,
 //                                `jenis_kelamin`,
 //                                `umur_tahun`,
 //                                `umur_bulan`,
 //                                `tb_pb`,
 //                                `bb`,
 //                                `catatan`
 //                            ) 
 //                        VALUES 
 //                            (
 //                                NOW(),
 //                                '". $this->db->escape_str($id) ."',
 //                                '". $this->db->escape_str($f['nama_anak']) ."',
 //                                '". $this->db->escape_str($f['jenis_kelamin']) ."',
 //                                '". $this->db->escape_str($f['umur_tahun']) ."',
 //                                '". $this->db->escape_str($f['umur_bulan']) ."',
 //                                '". $this->db->escape_str($f['tb_pb']) ."',
 //                                '". $this->db->escape_str($f['bb']) ."',
 //                                '". $this->db->escape_str($f['catatan']) ."'
 //                            )
 //                        ;";
 //                    $this->db->simple_query($q);
 //                    break;
 //                case '8': // imunisasi
 //                    $q =    "INSERT INTO 
 //                            `detail_imunisasi` 
 //                            (
 //                                `created_at`,
 //                                `id_antrian`,
 //                                `nama_anak`,
 //                                `no_kk`,
 //                                `alamat`,
 //                                `tgl_lahir`,
 //                                `bb_lahir`,
 //                                `bb`,
 //                                `pb`,
 //                                `hb0`,
 //                                `bcg`,
 //                                `pentabio1`,
 //                                `pentabio2`,
 //                                `pentabio3`,
 //                                `campak`,
 //                                `polio1`,
 //                                `polio2`,
 //                                `polio3`,
 //                                `polio4`,
 //                                `tt`,
 //                                `pentabio_ulang`,
 //                                `campak_ulang`,
 //                                `catatan`,
 //                                `id_macam_tindakan_imunisasi`
 //                            ) 
 //                        VALUES 
 //                            (
 //                                NOW(),
 //                                '". $this->db->escape_str($id) ."',
 //                                '". $this->db->escape_str($f['nama_anak']) ."',
 //                                '". $this->db->escape_str($f['no_kk']) ."',
 //                                '". $this->db->escape_str($f['alamat']) ."',
 //                                '". $this->db->escape_str($f['tgl_lahir']) ."',
 //                                '". $this->db->escape_str($f['bb_lahir']) ."',
 //                                '". $this->db->escape_str($f['bb']) ."',
 //                                '". $this->db->escape_str($f['pb']) ."',
 //                                '". $this->db->escape_str($f['hb0']) ."',
 //                                '". $this->db->escape_str($f['bcg']) ."',
 //                                '". $this->db->escape_str($f['pentabio1']) ."',
 //                                '". $this->db->escape_str($f['pentabio2']) ."',
 //                                '". $this->db->escape_str($f['pentabio3']) ."',
 //                                '". $this->db->escape_str($f['campak']) ."',
 //                                '". $this->db->escape_str($f['polio1']) ."',
 //                                '". $this->db->escape_str($f['polio2']) ."',
 //                                '". $this->db->escape_str($f['polio3']) ."',
 //                                '". $this->db->escape_str($f['polio4']) ."',
 //                                '". $this->db->escape_str($f['tt']) ."',
 //                                '". $this->db->escape_str($f['pentabio_ulang']) ."',
 //                                '". $this->db->escape_str($f['campak_ulang']) ."',
 //                                '". $this->db->escape_str($f['catatan']) ."',
 //                                '". $this->db->escape_str($f['id_macam_tindakan_imunisasi']) ."'
 //                            )
 //                        ;";
 //                    $this->db->simple_query($q);
 //                    break;
 //                case '3': // persalinan
 //                    $q =    "INSERT INTO 
 //                            `detail_persalinan` 
 //                            (
 //                                `created_at`,
 //                                `id_antrian`,
 //                                `id_pasien`,
 //                                `umur`,
 //                                `alamat`,
 //                                `anak_ke`,
 //                                `bb`,
 //                                `pb`,
 //                                `tgl_lahir`,
 //                                `jam_lahir`,
 //                                `jenis_kelamin`,
 //                                `imd`,
 //                                `lingkar_kepala`,
 //                                `resiko`,
 //                                `keterangan`,
 //                                `catatan`
 //                            ) 
 //                        VALUES 
 //                            (
 //                                NOW(),
 //                                '". $this->db->escape_str($id) ."',
 //                                '". $this->db->escape_str($f['id_pasien']) ."',
 //                                '". $this->db->escape_str($f['umur']) ."',
 //                                '". $this->db->escape_str($f['alamat']) ."',
 //                                '". $this->db->escape_str($f['anak_ke']) ."',
 //                                '". $this->db->escape_str($f['bb']) ."',
 //                                '". $this->db->escape_str($f['pb']) ."',
 //                                '". $this->db->escape_str($f['tgl_lahir']) ."',
 //                                '". $this->db->escape_str($f['jam_lahir']) ."',
 //                                '". $this->db->escape_str($f['jenis_kelamin']) ."',
 //                                '". $this->db->escape_str($f['imd']) ."',
 //                                '". $this->db->escape_str($f['lingkar_kepala']) ."',
 //                                '". $this->db->escape_str($f['resiko']) ."',
 //                                '". $this->db->escape_str($f['keterangan']) ."',
 //                                '". $this->db->escape_str($f['catatan']) ."'
 //                            )
 //                        ;";
 //                    $this->db->simple_query($q);
 //                    break;
 //                case '1': // pemeriksaan kehamilan
 //                    $q =    "INSERT INTO 
 //                            `detail_pemeriksaan_kehamilan` 
 //                            (
 //                                `created_at`,
 //                                `id_antrian`,
 //                                `id_pasien`,
 //                                `tgl_lahir`,
 //                                `nik`,
 //                                `umur`,
 //                                `nama_suami`,
 //                                `no_kk`,
 //                                `buku_kia`,
 //                                `alamat`,
 //                                `hpht`,
 //                                `tp`,
 //                                `bb`,
 //                                `tb`,
 //                                `usia_kehamilan`,
 //                                `gpa`,
 //                                `k1`,
 //                                `k4`,
 //                                `tt`,
 //                                `lila`,
 //                                `hb`,
 //                                `resiko`,
 //                                `keterangan`,
 //                                `baru_lama`,
 //                                `catatan`
 //                            ) 
 //                        VALUES 
 //                            (
 //                                NOW(),
 //                                '". $this->db->escape_str($id) ."',
 //                                '". $this->db->escape_str($f['id_pasien']) ."',
 //                                '". $this->db->escape_str($f['tgl_lahir']) ."',
 //                                '". $this->db->escape_str($f['nik']) ."',
 //                                '". $this->db->escape_str($f['umur']) ."',
 //                                '". $this->db->escape_str($f['nama_suami']) ."',
 //                                '". $this->db->escape_str($f['no_kk']) ."',
 //                                '". $this->db->escape_str($f['buku_kia']) ."',
 //                                '". $this->db->escape_str($f['alamat']) ."',
 //                                '". $this->db->escape_str($f['hpht']) ."',
 //                                '". $this->db->escape_str($f['tp']) ."',
 //                                '". $this->db->escape_str($f['bb']) ."',
 //                                '". $this->db->escape_str($f['tb']) ."',
 //                                '". $this->db->escape_str($f['usia_kehamilan']) ."',
 //                                '". $this->db->escape_str($f['gpa']) ."',
 //                                '". $this->db->escape_str($f['k1']) ."',
 //                                '". $this->db->escape_str($f['k4']) ."',
 //                                '". $this->db->escape_str($f['tt']) ."',
 //                                '". $this->db->escape_str($f['lila']) ."',
 //                                '". $this->db->escape_str($f['hb']) ."',
 //                                '". $this->db->escape_str($f['resiko']) ."',
 //                                '". $this->db->escape_str($f['keterangan']) ."',
 //                                '". $this->db->escape_str($f['baru_lama']) ."',
 //                                '". $this->db->escape_str($f['catatan']) ."'
 //                            )
 //                        ;";
 //                    $this->db->simple_query($q);
 //                    break;
 //                case '37': // KB
 //                    $q =    "INSERT INTO 
 //                            `detail_pemeriksaan_kb` 
 //                            (
 //                                `created_at`,
 //                                `id_antrian`,
 //                                `nama_pasien`,
 //                                `umur`,
 //                                `nama_suami`,
 //                                `alamat`,
 //                                `jml_anak_laki`,
 //                                `jml_anak_perempuan`,
 //                                `jml_anak`,
 //                                `usia_anak_terkecil`,
 //                                `id_satuan_usia`,
 //                                `pasang_baru`,
 //                                `pasang_cabut`,
 //                                `id_alat_kontrasepsi`,
 //                                `akli`,
 //                                `t_4`,
 //                                `ganti_cara`,
 //                                `catatan`
 //                            ) 
 //                        VALUES 
 //                            (
 //                                NOW(),
 //                                '". $this->db->escape_str($id) ."',
 //                                '". $this->db->escape_str($f['nama_pasien']) ."',
 //                                '". $this->db->escape_str($f['umur']) ."',
 //                                '". $this->db->escape_str($f['nama_suami']) ."',
 //                                '". $this->db->escape_str($f['alamat']) ."',
 //                                '". $this->db->escape_str($f['jml_anak_laki']) ."',
 //                                '". $this->db->escape_str($f['jml_anak_perempuan']) ."',
 //                                '". $this->db->escape_str($f['jml_anak']) ."',
 //                                '". $this->db->escape_str($f['usia_anak_terkecil']) ."',
 //                                '". $this->db->escape_str($f['id_satuan_usia']) ."',
 //                                '". $this->db->escape_str($f['pasang_baru']) ."',
 //                                '". $this->db->escape_str($f['pasang_cabut']) ."',
 //                                '". $this->db->escape_str($f['id_alat_kontrasepsi']) ."',
 //                                '". $this->db->escape_str($f['akli']) ."',
 //                                '". $this->db->escape_str($f['t_4']) ."',
 //                                '". $this->db->escape_str($f['ganti_cara']) ."',
 //                                '". $this->db->escape_str($f['catatan']) ."'
 //                            )
 //                        ;";
 //                    // file_put_contents('./dump/asdf.txt', $q);
 //                    $this->db->simple_query($q);
 //                    break;
 //                default:
 //                    # code...
 //                    break;
 //            }
 //        }

 //        return $result;
 //    }

 //    function info()
 //    {
 //        $result = array(
 //            'result'    => true,
 //            'msg'       => '',
 //            'data'      => array(
 //                'antrian'       => 0,
 //                'pembayaran'    => 0
 //            )  
 //        );

 //        $d = date('Y-m-d');

 //        $q = "SELECT COUNT(*) AS `total` FROM `antrians` WHERE `status_antrian` = 'Proses' AND `tgl_antrian` LIKE '". $d ."%' AND `deleted_at` IS NULL;";
 //        $r = $this->db->query($q)->result_array();
 //        if (count($r) > 0) {
 //            $result['data']['antrian'] = $r[0]['total'];
 //        }

 //        $q = "SELECT COUNT(*) AS `total` FROM `pembayarans` WHERE `status_pembayaran` = 'Selesai' AND `tgl_bayar` = '". $d ."' AND `deleted_at` IS NULL;";
 //        $r = $this->db->query($q)->result_array();
 //        if (count($r) > 0) {
 //            $result['data']['pembayaran'] = $r[0]['total'];
 //        }

 //        return $result;
 //    }

 //    function select_penyakit($id = 0)
 //    {
 //        $result = array(
 //            'result'    => false,
 //            'msg'       => ''  
 //        );

 //        $q = "";
 //        if ($id == 0) {
 //            $q = "SELECT * FROM `jenis_penyakit` WHERE `deleted_at` IS NULL ORDER BY `nama_penyakit` ASC;";
 //        } else{
 //            $q = "SELECT * FROM `jenis_penyakit` WHERE `id` = '". $this->db->escape_str($id) ."' AND `deleted_at` IS NULL;";
 //        }
 //        $r = $this->db->query($q, false)->result_array();
 //        if (count($r) > 0) {
 //            $result['result'] = true;
 //            $result['data'] = $r;
 //        }

 //        return $result;
 //    }

 //    function select_rentang_umur($id = 0)
 //    {
 //        $result = array(
 //            'result'    => false,
 //            'msg'       => ''  
 //        );

 //        $q = "";
 //        if ($id == 0) {
 //            $q = "SELECT * FROM `rentang_umur` WHERE `deleted_at` IS NULL ORDER BY `id` ASC;";
 //        } else{
 //            $q = "SELECT * FROM `rentang_umur` WHERE `id` = '". $this->db->escape_str($id) ."' AND `deleted_at` IS NULL;";
 //        }
 //        $r = $this->db->query($q, false)->result_array();
 //        if (count($r) > 0) {
 //            $result['result'] = true;
 //            $result['data'] = $r;
 //        }

 //        return $result;
 //    }

 //    function select_macam_imunisasi($id = 0)
 //    {
 //        $result = array(
 //            'result'    => false,
 //            'msg'       => ''  
 //        );

 //        $q = "";
 //        if ($id == 0) {
 //            $q = "SELECT * FROM `macam_imunisasi` WHERE `deleted_at` IS NULL ORDER BY `nama_imunisasi` ASC;";
 //        } else{
 //            $q = "SELECT * FROM `macam_imunisasi` WHERE `id` = '". $this->db->escape_str($id) ."' AND `deleted_at` IS NULL;";
 //        }
 //        $r = $this->db->query($q, false)->result_array();
 //        if (count($r) > 0) {
 //            $result['result'] = true;
 //            $result['data'] = $r;
 //        }

 //        return $result;
 //    }

 //    function select_satuan_usia($id = 0)
 //    {
 //        $result = array(
 //            'result'    => false,
 //            'msg'       => ''  
 //        );

 //        $q = "";
 //        if ($id == 0) {
 //            $q = "SELECT * FROM `satuan_usia` WHERE `deleted_at` IS NULL ORDER BY `nama_satuan` ASC;";
 //        } else{
 //            $q = "SELECT * FROM `satuan_usia` WHERE `id` = '". $this->db->escape_str($id) ."' AND `deleted_at` IS NULL;";
 //        }
 //        $r = $this->db->query($q, false)->result_array();
 //        if (count($r) > 0) {
 //            $result['result'] = true;
 //            $result['data'] = $r;
 //        }

 //        return $result;
 //    }

 //    function select_alat_kontrasepsi($id = 0)
 //    {
 //        $result = array(
 //            'result'    => false,
 //            'msg'       => ''  
 //        );

 //        $q = "";
 //        if ($id == 0) {
 //            $q = "SELECT * FROM `alat_kontrasepsi` WHERE `deleted_at` IS NULL ORDER BY `nama_alat` ASC;";
 //        } else{
 //            $q = "SELECT * FROM `alat_kontrasepsi` WHERE `id` = '". $this->db->escape_str($id) ."' AND `deleted_at` IS NULL;";
 //        }
 //        $r = $this->db->query($q, false)->result_array();
 //        if (count($r) > 0) {
 //            $result['result'] = true;
 //            $result['data'] = $r;
 //        }

 //        return $result;
 //    }

}