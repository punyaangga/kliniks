<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAngga_model extends CI_Model {
	public function __construct(){
        $this->load->database();
    }
    

	public function tampilDataPengguna()
    {   
        $query = $this->db->get('users');
        return $query;
    }
    public function hapusDataPengguna($id)
    {
    	$this->db->where('id', $id);
   		$query = $this->db->delete('users');
    }

    public function editDataPengguna($id)
    {
    	$query = $this->db->get_where('users',array('id'=>$id));
    	return $query;
    }
    public function updateDataPengguna($id,$data){
    	$this->db->update('users',$data, array('id' => $id));
    }
}
