<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utama extends CI_Controller {
	public $tampung_id_surat = "";
	public function index()
	{

		//$this->load->view('header');
		$this->load->view('login');
		//$this->load->view('footer');
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

		$this->load->model('modelsurat');
		$d = $this->modelsurat->ceklogin($data);

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
	function beranda(){
		$this->load->model('modelsurat');
		$data['suratmasuk'] = $this->modelsurat->getsuratmasuk();
		$data['suratkeluar'] = $this->modelsurat->getsuratkeluar();
		$this->load->view('header');
		$this->load->view('beranda',$data);
		$this->load->view('footer');
	}

	function login(){
		$this->load->view('login');
	}

	function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('utama');
	}
	function admin(){
		$data['user'] = $this->modelsurat->getuser();
		$data['suratmasuk'] = $this->modelsurat->getsuratmasuk();
		$data['suratkeluar'] = $this->modelsurat->getsuratkeluar();
		$this->load->view('adminindex',$data);
	}
	function suratmasuk(){
		$this->load->view('header');
		$this->load->view('suratmasuk');
		$this->load->view('footer');
	}
	function suratkeluar(){
		$this->load->view('header');
		$this->load->view('suratkeluar');
		$this->load->view('footer');
	}
	function add_user(){
		$this->load->view('adduser');
	}
	function add_proses(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('adduser');
		} else {
			$data = array (
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'email'=>$this->input->post('email')
				);
			$d = $this->modelsurat->insertuser($data);
			if ($d){
				$this->admin();
			}
		}
	}
	function loginadmin(){
		$this->load->view('loginadmin');
	}
	function deleteuser($id)
	{
		$this->db->where('id_user',$id);
		$this->db->delete('tbl_user');
		redirect('utama/admin');
	}
	function deletesuratmasuk($id)
	{
		$this->db->where('id_surat',$id);
		$this->db->delete('tbl_suratmasuk');
		redirect('utama/admin');
	}
	function deletesuratkeluar($id)
	{
		$this->db->where('id_surat',$id);
		$this->db->delete('tbl_suratkeluar');
		redirect('utama/admin');
	}
	function hapussuratmasuk($id)
	{
		$this->db->where('id_surat',$id);
		$this->db->delete('tbl_suratmasuk');
		redirect('utama/datasuratsaya');
	}
	function hapussuratkeluar($id)
	{
		$this->db->where('id_surat',$id);
		$this->db->delete('tbl_suratkeluar');
		redirect('utama/datasuratsaya');
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
	function datauser(){
		$data['user'] = $this->modelsurat->getuser();
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
	function insertsuratmasuk(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nosurat', 'No Surat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|xss_clean');
		$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tujukan', 'Di Tujukan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'status surat', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
		$this->suratmasuk();
		}
		else
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpeg|jpg|png|pdf|docx';
			$config['max_size']	= '1000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('filefoto'))
			{
				echo $this->upload->display_errors('<p>','</p>');

			}else{
				$upload_data = $this->upload->data();

				$data = array (
					'no_surat'=>$this->input->post('nosurat'),
					'tgl_surat'=>$this->input->post('tanggal'),
					'perihal'=>$this->input->post('perihal'),
					'pengirim'=>$this->input->post('pengirim'),
					'di_tujukan'=>$this->input->post('tujukan'),
					'file'=>$upload_data['file_name'],
					'status'=>$this->input->post('status'),
					'keterangan'=>$this->input->post('keterangan'),
					'pembuat' => $this->session->userdata('username')
					);

				$xx = $this->modelsurat->insertsurat($data);
				if ($xx){
					$this->beranda();
				}
			}
		}
	}
	function datasuratsaya(){
		$data['suratmasuk'] = $this->modelsurat->getallmysuratmasuk(array('pembuat' => $this->session->userdata('username')));
		$data['suratkeluar'] = $this->modelsurat->getallmysuratkeluar(array('pembuat' => $this->session->userdata('username')));
		$this->load->view('header');
		$this->load->view('suratsaya',$data);
		$this->load->view('footer');

	}
	public function editsuratmasuk($id_suratx){
		$tampung_id_surat = $id_suratx;
		$data['suratmasuk'] = $this->modelsurat->getmysuratmasuk($id_suratx);
		$this->load->view('header');
		$this->load->view('editsuratmasuk',$data);
		$this->load->view('footer');
	}
	function editsuratmasuk_proses(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nosurat', 'No Surat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|xss_clean');
		$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tujukan', 'Di Tujukan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'status surat', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
		$this->editsuratmasuk();
		}
		else
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpeg|jpg|png|pdf|docx|';
			$config['max_size']	= '1000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('filefoto'))
			{
				echo $this->upload->display_errors('<p>','</p>');

			}else{
				$upload_data = $this->upload->data();

				$data = array (
					'no_surat'=>$this->input->post('nosurat'),
					'tgl_surat'=>$this->input->post('tanggal'),
					'perihal'=>$this->input->post('perihal'),
					'pengirim'=>$this->input->post('pengirim'),
					'di_tujukan'=>$this->input->post('tujukan'),
					'file'=>$upload_data['file_name'],
					'status'=>$this->input->post('status'),
					'keterangan'=>$this->input->post('keterangan'),
					'pembuat' => $this->session->userdata('username')
					);

				$xx = $this->modelsurat->editsuratmasuk($this->input->post('idsurat'),$data);
				if ($xx){
					$this->editsuratmasuk();
				}
				else{
					echo "Gagal Update";
				}
			}
		}
	}
	public function editsuratkeluar($id_suratx){
		$data['suratkeluar'] = $this->modelsurat->getmysuratkeluar($id_suratx);
		$this->load->view('header');
		$this->load->view('editsuratkeluar',$data);
		$this->load->view('footer');
	}
	function editsuratkeluar_proses(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nosurat', 'No Surat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|xss_clean');
		$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'status surat', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
		$this->editsuratmasuk();
		}
		else
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpeg|jpg|png|pdf|docx';
			$config['max_size']	= '1000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('filefoto'))
			{
				echo $this->upload->display_errors('<p>','</p>');

			}else{
				$upload_data = $this->upload->data();

				$data = array (
					'no_surat'=>$this->input->post('nosurat'),
					'tgl_surat'=>$this->input->post('tanggal'),
					'perihal'=>$this->input->post('perihal'),
					'tujuan'=>$this->input->post('tujuan'),
					'file'=>$upload_data['file_name'],
					'status'=>$this->input->post('status'),
					'keterangan'=>$this->input->post('keterangan'),
					'pembuat' => $this->session->userdata('username')
					);

				$xx = $this->modelsurat->editsuratkeluar($this->input->post('idsurat'),$data);
				if ($xx){
					$this->editsuratkeluar();
				}
				else{
					echo "Gagal Update";
				}
			}
		}
	}
	function insertsuratkeluar(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nosurat', 'No Surat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|xss_clean');
		$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'status surat', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
		$this->suratkeluar();
		}
		else
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpeg|jpg|png|pdf|docx';
			$config['max_size']	= '1000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('filefoto'))
			{
				echo $this->upload->display_errors('<p>','</p>');

			}else{
				$upload_data = $this->upload->data();

				$data = array (
					'no_surat'=>$this->input->post('nosurat'),
					'tgl_surat'=>$this->input->post('tanggal'),
					'perihal'=>$this->input->post('perihal'),
					'tujuan'=>$this->input->post('tujuan'),
					'file'=>$upload_data['file_name'],
					'status'=>$this->input->post('status'),
					'keterangan'=>$this->input->post('keterangan')
					);

				$xx = $this->modelsurat->insertsuratkeluar($data);
				if ($xx){
					$this->beranda();
				}
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */