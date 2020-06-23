<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {

	function _get($data = array())
    {
    	$q = "SELECT a.*, b.`nama_kota`, c.`nama_pekerjaan`, d.`nama_kota` AS `nama_kota_suami`, e.`nama_pekerjaan` AS `nama_pekerjaan_suami`, f.`nama_desa` FROM `pasiens` a LEFT JOIN `kotas` b ON a.`tempat_lahir` = b.`id` LEFT JOIN `pekerjaans` c ON a.`pekerjaan_istri` = c.`id` LEFT JOIN `kotas` d ON a.`id_kota` = d.`id` LEFT JOIN `pekerjaans` e ON a.`pekerjaan_suami` = e.`id` LEFT JOIN `desas` f ON a.`id_desa` = f.`id` ";

        if ($data['search']['value'] && !isset($data['all'])) {
        	$s = $this->db->escape_str($data['search']['value']);
            $q .= "WHERE (a.`nama_pasien` LIKE '%". $s ."%' OR b.`nama_kota` LIKE '%". $s ."%' OR a.`tgl_lahir` LIKE '%". $s ."%' OR a.`gol_darah` LIKE '%". $s ."%' OR a.`alamat_istri` LIKE '%". $s ."%' OR a.`no_telp_pasien` LIKE '%". $s ."%' OR a.`jenis_pasien` LIKE '%". $s ."%' OR a.`no_registrasi` LIKE '%". $s ."%' OR c.`nama_pekerjaan` LIKE '%". $s ."%' OR d.`nama_kota` LIKE '%". $s ."%' OR a.`pendidikan_istri` LIKE '%". $s ."%' OR a.`nama_suami` LIKE '%". $s ."%' OR a.`tgl_lahir_suami` LIKE '%". $s ."%' OR a.`pendidikan_suami` LIKE '%". $s ."%' OR a.`agama_suami` LIKE '%". $s ."%' OR a.`agama_istri` LIKE '%". $s ."%' OR e.`nama_pekerjaan` LIKE '%". $s ."%' OR a.`alamat_suami` LIKE '%". $s ."%' OR a.`gravida` LIKE '%". $s ."%' OR a.`para` LIKE '%". $s ."%' OR a.`abortus` LIKE '%". $s ."%' OR a.`hpht` LIKE '%". $s ."%' OR a.`siklus` LIKE '%". $s ."%' OR a.`durasi_haid` LIKE '%". $s ."%' OR a.`taksiran_partus` LIKE '%". $s ."%' OR a.`catatan_bidan` LIKE '%". $s ."%' OR f.`nama_desa` LIKE '%". $s ."%') AND a.`deleted_at` IS NULL ";
        } else{
        	$q .= "WHERE a.`deleted_at` IS NULL ";
        }

        if (isset($data['order'])) {
        	$dir = $this->db->escape_str($data['order'][0]['dir']);
        	$col = $this->db->escape_str($data['columns'][$data['order'][0]['column']]['data']);
        	if ($data['order'][0]['column'] != 0) {
                if ($col == 'nama_kota') {
                    $q .= "ORDER BY b.`nama_kota` ". $dir ." ";
                } elseif ($col == 'nama_pekerjaan') {
                    $q .= "ORDER BY c.`nama_pekerjaan` ". $dir ." ";
                } elseif ($col == 'nama_pekerjaan_suami') {
                    $q .= "ORDER BY `nama_pekerjaan_suami` ". $dir ." ";
                } elseif ($col == 'nama_kota_suami') {
                    $q .= "ORDER BY `nama_kota_suami` ". $dir ." ";
                } elseif ($col == 'nama_desa') {
                    $q .= "ORDER BY f.`nama_desa` ". $dir ." ";
                } else {
                    $q .= "ORDER BY a.`". $col ."` ". $dir ." ";
                }
        	} else{
        		$q .= "ORDER BY a.`id` ". $dir ." ";
        	}
        } else{
        	$q .= "ORDER BY a.`id` DESC ";
        }

        return $q;
    }

    function _list($data = array())
    {
        $q = $this->_get($data);
        $q .= "LIMIT ". $this->db->escape_str($data['start']) .", ". $this->db->escape_str($data['length']);
        $r = $this->db->query($q, false)->result_array();
        
        return $r;
    }

    function _filtered($data = array())
    {
        $q = $this->_get($data);
        $r = $this->db->query($q, false)->result_array();
        
        return count($r);
    }

    function _all($data = array())
    {
        $data['all'] = true;
        $q = $this->_get($data);
        $r = $this->db->query($q)->result_array();
        
        return count($r);
    }
    
	function datatable($data = array())
	{
		$result = array(
            'draw'              => 1,
            'recordsTotal'      => 0,
            'recordsFiltered'   => 0,
            'data'              => array(),
            'result'            => false,
            'msg'               => ''
        );

        $list = $this->_list($data);
        if (count($list) > 0) {
            $result = array(
                'draw'              => $data['draw'],
                'recordsTotal'      => $this->_all($data),
                'recordsFiltered'   => $this->_filtered($data),
                'data'              => $list,
                'result'            => true,
                'msg'               => 'Loaded.',
                'start'             => (int) $data['start'] + 1
            );
        } else{
            $result['msg'] = 'No data left.';
        }

        return $result;
	}

    function edit($id = 0)
    {
        $result = array(
            'result'    => false,
            'msg'       => 'Data pasien tidak ditemukan.'  
        );

        $q = "SELECT * FROM `pasiens` WHERE `id` = '". $this->db->escape_str($id) ."';";
        $r = $this->db->query($q)->result_array();
        if (count($r) > 0) {
            $result['result'] = true;
            $result['data'] = $r[0];
        }

        return $result;
    }

	function save($data = array())
	{
		$result = array(
			'result'    => false,
			'msg'		=> ''  
		);

		$u = $data['userData'];
		$d = $data['postData'];
		$id = $d['id'];
		parse_str($d['form'], $f);

        if (!array_key_exists('catatan_bidan', $f)) {
            $f['catatan_bidan'] = '[]';
        }

		$q = '';
		if ($id == 0) {
			$q =    "INSERT INTO 
                        `pasiens` 
                        (
                            `nik`,
                            `nama_ayah_kandung`,
                            `nama_pasien`,
                            `tgl_lahir`,
                            `gol_darah`,
                            `alamat_ktp_istri`,
                            `alamat_istri`,
                            `no_telp_pasien`,
                            `email`,
                            `medsos`,
                            `no_registrasi`,
                            `pekerjaan_istri`,
                            `id_kota`,
                            `pendidikan_istri`,
                            `nama_suami`,
                            `tgl_lahir_suami`,
                            `pendidikan_suami`,
                            `agama_suami`,
                            `agama_istri`,
                            `pekerjaan_suami`,
                            `alamat_ktp_suami`,
                            `alamat_suami`,
                            `catatan_bidan`,
                            `id_desa`
                        ) 
                    VALUES 
                        (
                            '". $this->db->escape_str($f['nik']) ."',
                            '". $this->db->escape_str($f['nama_ayah_kandung']) ."',
                            '". $this->db->escape_str($f['nama_pasien']) ."',
                            '". $this->db->escape_str($f['tgl_lahir']) ."',
                            '". $this->db->escape_str($f['gol_darah']) ."',
                            '". $this->db->escape_str($f['alamat_ktp_istri']) ."',
                            '". $this->db->escape_str($f['alamat_istri']) ."',
                            '". $this->db->escape_str($f['no_telp_pasien']) ."',
                            '". $this->db->escape_str($f['email']) ."',
                            '". $this->db->escape_str($f['medsos']) ."',
                            '". $this->db->escape_str($f['no_registrasi']) ."',
                            '". $this->db->escape_str($f['pekerjaan_istri']) ."',
                            '". $this->db->escape_str($f['id_kota']) ."',
                            '". $this->db->escape_str($f['pendidikan_istri']) ."',
                            '". $this->db->escape_str($f['nama_suami']) ."',
                            '". $this->db->escape_str($f['tgl_lahir_suami']) ."',
                            '". $this->db->escape_str($f['pendidikan_suami']) ."',
                            '". $this->db->escape_str($f['agama_suami']) ."',
                            '". $this->db->escape_str($f['agama_istri']) ."',
                            '". $this->db->escape_str($f['pekerjaan_suami']) ."',
                            '". $this->db->escape_str($f['alamat_ktp_suami']) ."',
                            '". $this->db->escape_str($f['alamat_suami']) ."',
                            '". $this->db->escape_str($f['catatan_bidan']) ."',
                            '". $this->db->escape_str($f['id_desa']) ."'
                        )
                    ;";
		} else{
            $q =    "UPDATE 
                        `pasiens` 
                    SET 
                        `nik` = '". $this->db->escape_str($f['nik']) ."', 
                        `nama_ayah_kandung` = '". $this->db->escape_str($f['nama_ayah_kandung']) ."', 
                        `nama_pasien` = '". $this->db->escape_str($f['nama_pasien']) ."', 
                        `tgl_lahir` = '". $this->db->escape_str($f['tgl_lahir']) ."', 
                        `gol_darah` = '". $this->db->escape_str($f['gol_darah']) ."', 
                        `alamat_ktp_istri` = '". $this->db->escape_str($f['alamat_ktp_istri']) ."', 
                        `alamat_istri` = '". $this->db->escape_str($f['alamat_istri']) ."', 
                        `no_telp_pasien` = '". $this->db->escape_str($f['no_telp_pasien']) ."', 
                        `email` = '". $this->db->escape_str($f['email']) ."', 
                        `medsos` = '". $this->db->escape_str($f['medsos']) ."', 
                        `no_registrasi` = '". $this->db->escape_str($f['no_registrasi']) ."', 
                        `pekerjaan_istri` = '". $this->db->escape_str($f['pekerjaan_istri']) ."', 
                        `nama_suami` = '". $this->db->escape_str($f['nama_suami']) ."', 
                        `tgl_lahir_suami` = '". $this->db->escape_str($f['tgl_lahir_suami']) ."', 
                        `pendidikan_suami` = '". $this->db->escape_str($f['pendidikan_suami']) ."',
                        `agama_suami` = '". $this->db->escape_str($f['agama_suami']) ."',
                        `agama_istri` = '". $this->db->escape_str($f['agama_istri']) ."',
                        `pekerjaan_suami` = '". $this->db->escape_str($f['pekerjaan_suami']) ."',
                        `alamat_ktp_suami` = '". $this->db->escape_str($f['alamat_ktp_suami']) ."',
                        `alamat_suami` = '". $this->db->escape_str($f['alamat_suami']) ."',
                        `catatan_bidan` = '". $this->db->escape_str($f['catatan_bidan']) ."',
                        `id_desa` = '". $this->db->escape_str($f['id_desa']) ."'
                    WHERE 
                        `id` = '". $this->db->escape_str($id) ."'
                    ;";
		}

		if ($this->db->simple_query($q)) {
			$result['result'] = true;
			$result['msg'] = 'Data berhasil disimpan.';

            $result['redirect_id'] = 0;
            if ($id == 0) {
                $q = "SELECT * FROM `pasiens` WHERE `deleted_at` IS NULL ORDER BY `id` DESC LIMIT 1;";
                $r = $this->db->query($q, false)->result_array();
                if (count($r) > 0) {
                    $result['redirect_id'] = $r[0]['id'];
                }
            }
		} else{
			$result['msg'] = 'Terjadi kesalahan saat menyimpan data.';
		}

		return $result;
	}

	function delete($data = array())
	{
		$result = array(
			'result'    => false,
			'msg'		=> ''  
		);

		$u = $data['userData'];
		$d = $data['postData'];
		$id = $d['id'];
		$q = "UPDATE `pasiens` SET `deleted_at` = NOW() WHERE `id` = '". $this->db->escape_str($id) ."';";
		if ($this->db->simple_query($q)) {
			$result['result'] = true;
			$result['msg'] = 'Data berhasil dihapus.';
		} else{
			$result['msg'] = 'Terjadi kesalahan saat menghapus data.';
		}

		return $result;
	}

    function select_kota()
    {
        $result = array(
            'result'    => false,
            'msg'       => ''  
        );

        $q = "SELECT * FROM `kotas` WHERE `deleted_at` IS NULL ORDER BY `nama_kota` ASC;";
        $r = $this->db->query($q, false)->result_array();
        if (count($r) > 0) {
            $result['result'] = true;
            $result['data'] = $r;
        }

        return $result;
    }

    function select_desa()
    {
        $result = array(
            'result'    => false,
            'msg'       => ''  
        );

        $q = "SELECT * FROM `desas` WHERE `deleted_at` IS NULL ORDER BY `nama_desa` ASC;";
        $r = $this->db->query($q, false)->result_array();
        if (count($r) > 0) {
            $result['result'] = true;
            $result['data'] = $r;
        }

        return $result;
    }

    function select_pekerjaan()
    {
        $result = array(
            'result'    => false,
            'msg'       => ''  
        );

        $q = "SELECT * FROM `pekerjaans` WHERE `deleted_at` IS NULL ORDER BY `nama_pekerjaan` ASC;";
        $r = $this->db->query($q, false)->result_array();
        if (count($r) > 0) {
            $result['result'] = true;
            $result['data'] = $r;
        }

        return $result;
    }

    function input_no_registrasi()
    {
        $result = array(
            'result'    => false,
            'msg'       => ''  
        );

        $d = date('Ym');
        $q = "SELECT * FROM `pasiens` ORDER BY `id` DESC LIMIT 1;";
        $r = $this->db->query($q, false)->result_array();
        if (count($r) > 0) {
            $result['result'] = true;
            $total = intval($r[0]['no_registrasi']) + 1;
            $result['value'] = str_pad($total, 6, '0', STR_PAD_LEFT);
        }

        return $result;
    }

    function cetak($id = 0)
    {
        $result = array(
            'result'    => false,
            'msg'       => 'Data pasien tidak ditemukan.'  
        );

        $q =    "SELECT 
                    a.*,
                    b.`nama_pekerjaan` AS `nama_pekerjaan_istri`,
                    c.`nama_pekerjaan` AS `nama_pekerjaan_suami`
                FROM 
                    `pasiens` a
                LEFT JOIN
                    `pekerjaans` b
                        ON
                    a.`pekerjaan_istri` = b.`id`
                LEFT JOIN
                    `pekerjaans` c
                        ON
                    a.`pekerjaan_suami` = c.`id`
                WHERE 
                    a.`id` = '". $this->db->escape_str($id) ."'
                ;";
        $r = $this->db->query($q)->result_array();
        if (count($r) > 0) {
            $result['result'] = true;
            $result['detail'] = $r[0];
        }

        return $result;
    }

    function detail($data = array())
    {
        $result = array(
            'result'    => false,
            'msg'       => ''  
        );

        $u = $data['userData'];
        $d = $data['postData'];
        $id = $d['id'];
        $q =    "SELECT 
                    a.`no_registrasi`,
                    a.`nik`,
                    a.`nama_pasien`,
                    a.`tgl_lahir`, 
                    a.`pendidikan_istri`,
                    a.`agama_istri`,
                    b.`nama_pekerjaan` AS `nama_pekerjaan_istri`,
                    a.`alamat_ktp_istri`,
                    a.`alamat_istri`,
                    a.`nama_ayah_kandung`,
                    a.`nama_suami`,
                    a.`tgl_lahir_suami`,
                    a.`pendidikan_suami`,
                    a.`agama_suami`,
                    c.`nama_pekerjaan` AS `nama_pekerjaan_suami`,
                    a.`alamat_ktp_suami`,
                    a.`alamat_suami`,
                    a.`no_telp_pasien`,
                    a.`email`,
                    a.`medsos`
                FROM 
                    `pasiens` a 
                LEFT JOIN 
                    `pekerjaans` b 
                        ON 
                    a.`pekerjaan_istri` = b.`id` 
                LEFT JOIN 
                    `pekerjaans` c 
                        ON 
                    a.`pekerjaan_suami` = c.`id` 
                WHERE 
                    a.`id` = '". $this->db->escape_str($id) ."'
                ;";
        $r = $this->db->query($q, false)->result_array();
        if (count($r) > 0) {
            $result['result'] = true;
            $result['detail'] = $r[0];

            $q = "SELECT a.`tgl_antrian`, b.`nama_pelayanan` FROM `antrians` a LEFT JOIN `jenis_pelayanans` b ON a.`id_jenis_pelayanan` = b.`id` WHERE a.`id_pasien` = '". $this->db->escape_str($id) ."' ORDER BY a.`tgl_antrian` DESC ";
            $r = $this->db->query($q, false)->result_array();
            $result['rm'] = $r;
        } else{
            $result['msg'] = 'Data detail tidak tersedia.';
        }

        return $result;
    }

    function query( $id = 0 )
    {
        $q = '';
        
        switch($id){
            case 1:
                $q = "SELECT 
                    `id` 
                FROM 
                    `pasiens` 
                WHERE 
                    LOWER(`alamat_istri`) LIKE '%babakan muncang%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%batas%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%bojong sari%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%centeng%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%cibaligo%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%cisasawi%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%cisintok%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%itjenad%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%karang sari%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%l. panjang%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%leuwi panjang%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%l.panjang%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%nata endah%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%sawah lega%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%bukit asri%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%artabahana%';";
                break;
            case 2:
                $q = "SELECT 
                    `id` 
                FROM 
                    `pasiens` 
                WHERE 
                    LOWER(`alamat_istri`) LIKE '%babakan%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%ciitis%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%manglayang%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%mokla%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%ciwangun%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%paneungteung%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%tanjakan%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%tutugan%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%tugu%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%sugawana%';";
                break;
            case 3: 
                $q = "SELECT 
                    `id` 
                FROM 
                    `pasiens` 
                WHERE 
                    LOWER(`alamat_istri`) LIKE '%caladi dalam%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%ciwaruga%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%lembur tengah%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%mekarwangi%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%pangkalan%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%parigi lame%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%k. lapang%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%mekar bakti%';";
                break;
            case 4:
                $q = "SELECT 
                    `id` 
                FROM 
                    `pasiens` 
                WHERE 
                    LOWER(`alamat_istri`) LIKE '%asr. parongpong%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%baru laksana%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%girihieum%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%girimulya%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%jyagoong%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%nyampai%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%parongpong%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%pasar kemis%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%asr. denkavkud%';";
                break;
            case 5:
                $q = "SELECT 
                    `id` 
                FROM 
                    `pasiens` 
                WHERE 
                    LOWER(`alamat_istri`) LIKE '%belapati%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%kancah%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%nagrak%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%panyairan%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%pasir baru%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%pasir sereh%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%patrol%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%sersan bajuri%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%sukamulya%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%nyingkir%';";
                break;
            case 6:
                $q = "SELECT 
                    `id` 
                FROM 
                    `pasiens` 
                WHERE 
                    LOWER(`alamat_istri`) LIKE '%jompo%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%kebon hui%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%kampung baru%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%sukamaju%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%sindang palay%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%pangsor%'
                        OR
                    LOWER(`alamat_istri`) LIKE '%kp. nihmat%';";
                break;
            case 7:
                break;
            case 8:
                break;
            default:
                break;
        }

        $r = $this->db->query($q, false)->result_array();

        $s = '';
        if(count($r) > 0){
            for ($i=0; $i < count($r); $i++) { 
                $s .= $r[$i]['id'] . ', ';
            }
        }

        return $s;
    }

}