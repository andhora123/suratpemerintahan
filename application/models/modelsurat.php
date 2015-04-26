<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelsurat extends CI_Model {

	public function ceklogin($data){
		$d = $this->db->get_where('tbl_user',$data);
		return $d->num_rows();
	}
	public function insertsurat($data){
		return $this->db->insert('tbl_suratmasuk', $data); 
		
	}
	public function insertuser($data){
		return $this->db->insert('tbl_user',$data);
	}
	public function insertsuratkeluar($data){
		return $this->db->insert('tbl_suratkeluar', $data); 
		
	}
	public function getsuratmasuk()
	{
		$query = $this->db->get('tbl_suratmasuk');
		return $query->result_array();
	}
	public function getsuratkeluar()
	{
		$query = $this->db->get('tbl_suratkeluar');
		return $query->result_array();
	}
	public function getuser()
	{
		$query = $this->db->get('tbl_user');
		return $query->result_array();
	}
	
	public function getallmysuratmasuk($id){
		$d = $this->db->get_where('tbl_suratmasuk',$id);
		return $d->result_array();
	}
	public function getallmysuratkeluar($id){
		$d = $this->db->get_where('tbl_suratkeluar',$id);
		return $d->result_array();
	}

	public function getmysuratmasuk($id){
		$this->db->where('id_surat',$id);
		$d = $this->db->get('tbl_suratmasuk');
		return $d->row_array();
	}
	public function editsuratmasuk($id_surat,$data){
		$this->db->where('id_surat',$id_surat);
		return $this->db->update('tbl_suratmasuk',$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */