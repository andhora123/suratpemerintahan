<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function index(){
		$data['user'] = $this->m_user->getuser();
		$data['suratmasuk'] = $this->modelsurat->getsuratmasuk();
		$data['suratkeluar'] = $this->modelsurat->getsuratkeluar();
		$this->load->view('adminindex',$data);
	}
	function login(){
		$this->load->view('loginadmin');
	}
	function add_proses(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('adduser');
		} else {
			$user = new m_user();

				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$password = $this->input->post('password');

			$user->setUsername($username);
			$user->setEmail($email);
			$user->setPassword($password);
			$d = $user->insertuser();
			if ($d){
				$this->index();
			}
		}
	}
	function datauser(){
		$data['user'] = $this->m_user->getuser();
		$this->load->view('datauser',$data);
	}
	function datasuratmasuk(){
		$data['suratmasuk'] = $this->modelsurat->getsuratmasuk();
		$this->load->view('datasuratmasuk',$data);
	}
	function datasuratkeluar(){
		$data['suratkeluar'] = $this->modelsurat->getsuratkeluar();
		$this->load->view('datasuratkeluar',$data);
	}
	function deleteuser($id)
	{
		$this->db->where('id_user',$id);
		$this->db->delete('tbl_user');
		redirect('admin/');
	}
	function deletesuratmasuk($id)
	{
		$this->db->where('id_surat',$id);
		$this->db->delete('tbl_suratmasuk');
		redirect('admin/');
	}
	function deletesuratkeluar($id)
	{
		$this->db->where('id_surat',$id);
		$this->db->delete('tbl_suratkeluar');
		redirect('admin/');
	}
	function add_user(){
		$this->load->view('adduser');
	}

	function cekadmin(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run()==FALSE){
			$this->load->view('loginadmin');
		}
		else
		{
			$username = $this->input->post('username');
			$pass = $this->input->post('password');

			if ($username == "admin" && $pass == "admin"){
				$data['level'] = $this->session->set_userdata('level',$username);
				$data['user'] = $this->m_user->getuser();
				$data['suratmasuk'] = $this->modelsurat->getsuratmasuk();
				$data['suratkeluar'] = $this->modelsurat->getsuratkeluar();
				$this->load->view('adminindex',$data);
			}
		}
	}
	function logout(){
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('admin/login');
	}
}