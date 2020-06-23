<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian_model extends CI_Model {

	function _get($data = array())
    {
    	$q = "SELECT a.*, b.`nama_dokter`, c.`nama_pasien`, d.`nama_pelayanan` FROM `antrians` a LEFT JOIN `dokters` b ON a.`id_dokter` = b.`id` LEFT JOIN `pasiens` c ON a.`id_pasien` = c.`id` LEFT JOIN `jenis_pelayanans` d ON a.`id_jenis_pelayanan` = d.`id` ";

        if ($data['search']['value'] && !isset($data['all'])) {
        	$s = $this->db->escape_str($data['search']['value']);
            $q .= "WHERE (a.`status_antrian` LIKE '%". $s ."%' OR a.`tgl_antrian` LIKE '%". $s ."%' OR b.`nama_dokter` LIKE '%". $s ."%' OR c.`nama_pasien` LIKE '%". $s ."%' OR d.`nama_pelayanan` LIKE '%". $s ."%' OR a.`kode_antrian` LIKE '%". $s ."%') AND a.`deleted_at` IS NULL ";
        } else{
        	$q .= "WHERE a.`deleted_at` IS NULL ";
        }

        if (isset($data['order'])) {
        	$dir = $this->db->escape_str($data['order'][0]['dir']);
        	$col = $this->db->escape_str($data['columns'][$data['order'][0]['column']]['data']);
        	if ($data['order'][0]['column'] != 0) {
                if ($col == 'nama_dokter') {
                    $q .= "ORDER BY b.`nama_dokter` ". $dir ." ";
                } elseif ($col == 'nama_pasien') {
                    $q .= "ORDER BY c.`nama_pasien` ". $dir ." ";
                } elseif ($col == 'nama_pelayanan') {
                    $q .= "ORDER BY d.`nama_pelayanan` ". $dir ." ";
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

        $q =    "SELECT 
                    a.*,
                    b.`nama_dokter`,
                    c.`nama_pasien`,
                    d.`nama_pelayanan`
                FROM 
                    `antrians` a 
                LEFT JOIN
                    `dokters` b
                        ON
                    a.`id_dokter` = b.`id`
                LEFT JOIN
                    `pasiens` c
                        ON
                    a.`id_pasien` = c.`id`
                LEFT JOIN
                    `jenis_pelayanans` d
                        ON
                    a.`id_jenis_pelayanan` = d.`id`
                WHERE 
                    a.`id` = '". $this->db->escape_str($id) ."'
                ;";
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

		$q = '';
		if ($id == 0) {
			$q =    "INSERT INTO 
                        `antrians` 
                        (
                            `id_dokter`,
                            `id_pasien`,
                            `no_antrian`,
                            `id_jenis_pelayanan`,
                            `tgl_antrian`,
                            `kode_antrian`
                        ) 
                    VALUES 
                        (
                            '". $this->db->escape_str($f['id_dokter']) ."',
                            '". $this->db->escape_str($f['id_pasien']) ."',
                            '". $this->db->escape_str($f['no_antrian']) ."',
                            '". $this->db->escape_str($f['id_jenis_pelayanan']) ."',
                            '". $this->db->escape_str($f['tgl_antrian']) ."',
                            '". $this->db->escape_str($f['kode_antrian']) ."'
                        )
                    ;";
		} else{
            $q =    "UPDATE 
                        `antrians` 
                    SET 
                        `id_dokter` = '". $this->db->escape_str($f['id_dokter']) ."', 
                        `id_pasien` = '". $this->db->escape_str($f['id_pasien']) ."', 
                        `no_antrian` = '". $this->db->escape_str($f['no_antrian']) ."', 
                        `id_jenis_pelayanan` = '". $this->db->escape_str($f['id_jenis_pelayanan']) ."', 
                        `tgl_antrian` = '". $this->db->escape_str($f['tgl_antrian']) ."',
                        `kode_antrian` = '". $this->db->escape_str($f['kode_antrian']) ."'
                    WHERE 
                        `id` = '". $this->db->escape_str($id) ."'
                    ;";
		}

		if ($this->db->simple_query($q)) {
			$result['result'] = true;
			$result['msg'] = 'Data berhasil disimpan.';
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
		$q = "UPDATE `antrians` SET `deleted_at` = NOW() WHERE `id` = '". $this->db->escape_str($id) ."';";
		if ($this->db->simple_query($q)) {
			$result['result'] = true;
			$result['msg'] = 'Data berhasil dihapus.';
		} else{
			$result['msg'] = 'Terjadi kesalahan saat menghapus data.';
		}

		return $result;
	}

    function select_dokter($id = 0)
    {
        $result = array(
            'result'    => false,
            'msg'       => ''  
        );

        $q = "";
        if ($id == 0) {
            $q = "SELECT * FROM `dokters` WHERE `deleted_at` IS NULL ORDER BY `nama_dokter` ASC;";
        } else{
            $q = "SELECT * FROM `dokters` WHERE `id` = '". $this->db->escape_str($id) ."' AND `deleted_at` IS NULL;";
        }
        $r = $this->db->query($q, false)->result_array();
        if (count($r) > 0) {
            $result['result'] = true;
            $result['data'] = $r;
        }

        return $result;
    }

    function select_pasien($id = 0)
    {
        $result = array(
            'result'    => false,
            'msg'       => ''  
        );

        $q = "";
        if ($id == 0) {
            $q = "SELECT * FROM `pasiens` WHERE `deleted_at` IS NULL ORDER BY `nama_pasien` ASC;";
        } else{
            $q = "SELECT * FROM `pasiens` WHERE `id` = '". $this->db->escape_str($id) ."' AND `deleted_at` IS NULL;";
        }
        $r = $this->db->query($q, false)->result_array();
        if (count($r) > 0) {
            $result['result'] = true;
            $result['data'] = $r;
        }

        return $result;
    }

    function select_jenis_pelayanan($id = 0)
    {
        $result = array(
            'result'    => false,
            'msg'       => ''  
        );

        $q = "";
        if ($id == 0) {
            $q = "SELECT * FROM `jenis_pelayanans` WHERE `deleted_at` IS NULL ORDER BY `nama_pelayanan` ASC;";
        } else{
            $q = "SELECT * FROM `jenis_pelayanans` WHERE `id` = '". $this->db->escape_str($id) ."' AND `deleted_at` IS NULL;";
        }
        $r = $this->db->query($q, false)->result_array();
        if (count($r) > 0) {
            $result['result'] = true;
            $result['data'] = $r;
        }

        return $result;
    }

    function input_no_antrian($data = array())
    {
        $result = array(
            'result'    => false,
            'msg'       => ''  
        );

        $u = $data['userData'];
        $d = $data['postData'];

        $q = "SELECT COUNT(*) AS `total` FROM `antrians` WHERE `id_dokter` = '". $this->db->escape_str($d['id_dokter']) ."' AND `id_jenis_pelayanan` = '". $this->db->escape_str($d['id_jenis_pelayanan']) ."' AND `tgl_antrian` LIKE '". date('Y-m-d') ."%';";
        $r = $this->db->query($q, false)->result_array();
        if (count($r) > 0) {
            $result['result'] = true;
            $result['value'] = $r[0]['total'] + 1;
        }

        return $result;
    }

    function input_tgl_antrian()
    {
        $result = array(
            'result'    => false,
            'msg'       => ''  
        );

        $q = "SELECT NOW() AS `server_time`;";
        $r = $this->db->query($q, false)->result_array();
        if (count($r) > 0) {
            $result['result'] = true;
            $result['value'] = $r[0]['server_time'];
        }

        return $result;
    }

    function input_kode_antrian()
    {
        $result = array(
            'result'    => false,
            'msg'       => ''  
        );

        $d = date('Ymd');
        $q = "SELECT COUNT(*) AS `total` FROM `antrians` WHERE `kode_antrian` LIKE 'A-". $d ."%';";
        $r = $this->db->query($q, false)->result_array();
        if (count($r) > 0) {
            $result['result'] = true;
            $total = $r[0]['total'] + 1;
            $result['value'] = 'A-' . $d . str_pad($total, 3, '0', STR_PAD_LEFT);
        }

        return $result;
    }

}