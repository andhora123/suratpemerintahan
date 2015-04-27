<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

	public $username = '';
	public $email = '';
	public $pass = '';

	public function setUsername($data){
		$this->username = $data;
	}
	public function setEmail($data){
		$this->email = $data;
	}
	public function setPassword($data){
		$this->pass = $data;
	}
	public function getUsername(){
		return $this->username;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getPassword(){
		return $this->email;
	}
	public function insertuser(){
		$data = array (
				'username'=>$this->getUsername(),
				'password'=>$this->getPassword(),
				'email'=>$this->getEmail()
				);
		return $this->db->insert('tbl_user',$data);
	}
	public function getuser()
	{
		$query = $this->db->get('tbl_user');
		return $query->result_array();
	}
	public function ceklogin($data){
		$d = $this->db->get_where('tbl_user',$data);
		return $d->num_rows();
	}
}