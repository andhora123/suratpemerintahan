<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function index(){
		$data['user'] = $this->modelsurat->getuser();
		$data['suratmasuk'] = $this->modelsurat->getsuratmasuk();
		$data['suratkeluar'] = $this->modelsurat->getsuratkeluar();
		$this->load->view('adminindex',$data);
	}
	function login(){
		$this->load->view('loginadmin');
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
				$data['user'] = $this->modelsurat->getuser();
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