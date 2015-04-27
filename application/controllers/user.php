<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		$this->load->view('login');
	}

	function verifikasi(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('login');
		} else {

		$user = $this->input->post('username');
		$data = array (	
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);
		$d = $this->m_user->ceklogin($data);

		if ($d){
			$data['username'] = $this->session->set_userdata('username',$user);
			$data['suratmasuk'] = $this->modelsurat->getsuratmasuk();
			$data['suratkeluar'] = $this->modelsurat->getsuratkeluar();
			$this->load->view('header',$data);
			$this->load->view('beranda',$data);
			$this->load->view('footer');
		}
		else{
			echo "<script>alert('Username Atau Password Salah');</script>";
			$this->index();
		}
	}


	}

	function login(){
		$this->load->view('login');
	}
	function logout(){
		$this->session->unset_userdata('username');
		session_destroy();
		redirect('user');
	}
}