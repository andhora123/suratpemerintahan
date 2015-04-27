<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat extends CI_Controller {
	public $tampung_id_surat = "";
	public function index()
	{
		$this->load->view('beranda');
	}
	function beranda(){
		$data['suratmasuk'] = $this->modelsurat->getsuratmasuk();
		$data['suratkeluar'] = $this->modelsurat->getsuratkeluar();
		$this->load->view('header');
		$this->load->view('beranda',$data);
		$this->load->view('footer');
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

	function hapussuratmasuk($id)
	{
		$this->db->where('id_surat',$id);
		$this->db->delete('tbl_suratmasuk');
		redirect('surat/datasuratsaya');
	}
	function hapussuratkeluar($id)
	{
		$this->db->where('id_surat',$id);
		$this->db->delete('tbl_suratkeluar');
		redirect('surat/datasuratsaya');
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
				$mds = new modelsurat();

				$nosurat = $this->input->post('nosurat');
				$tgl = $this->input->post('tanggal');
				$perihal = $this->input->post('perihal');
				$pengirim = $this->input->post('pengirim');
				$tujukan = $this->input->post('tujukan');
				$file = $upload_data['file_name'];
				$status = $this->input->post('status');
				$keterangan = $this->input->post('keterangan');
				$pembuat = $this->session->userdata('username');

				$mds->setNoSurat($nosurat);
				$mds->settgl_surat($tgl);
				$mds->setperihal($perihal);
				$mds->setpengirim($pengirim);
				$mds->setdi_tujukan($tujukan);
				$mds->setfile($file);
				$mds->setstatus($status);
				$mds->setketerangan($keterangan);
				$mds->setpembuat($pembuat);
				$xx = $mds->insertsurat();

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
				$mds = new modelsurat();

				$nosurat = $this->input->post('nosurat');
				$tgl = $this->input->post('tanggal');
				$perihal = $this->input->post('perihal');
				$pengirim = $this->input->post('pengirim');
				$tujukan = $this->input->post('tujukan');
				$file = $upload_data['file_name'];
				$status = $this->input->post('status');
				$keterangan = $this->input->post('keterangan');
				$pembuat = $this->session->userdata('username');

				$mds->setNoSurat($nosurat);
				$mds->settgl_surat($tgl);
				$mds->setperihal($perihal);
				$mds->setpengirim($pengirim);
				$mds->setdi_tujukan($tujukan);
				$mds->setfile($file);
				$mds->setstatus($status);
				$mds->setketerangan($keterangan);
				$mds->setpembuat($pembuat);

				$xx = $mds->editsuratmasuk($this->input->post('idsurat'));
				if ($xx){
					$this->datasuratsaya();
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
				$mdk = new modelsurat();

				$nosurat = $this->input->post('nosurat');
				$tgl = $this->input->post('tanggal');
				$perihal = $this->input->post('perihal');
				$tujuan = $this->input->post('tujuan');
				$file = $upload_data['file_name'];
				$status = $this->input->post('status');
				$keterangan = $this->input->post('keterangan');
				$pembuat = $this->session->userdata('username');

				$mdk->setNoSurat($nosurat);
				$mdk->settgl_surat($tgl);
				$mdk->setperihal($perihal);
				$mdk->setTujuan($tujuan);
				$mdk->setfile($file);
				$mdk->setstatus($status);
				$mdk->setketerangan($keterangan);
				$mdk->setpembuat($pembuat);
				$xx = $mdk->editsuratkeluar($this->input->post('idsurat'));

				if ($xx){
					$this->datasuratsaya();
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

				$mdk = new modelsurat();

				$nosurat = $this->input->post('nosurat');
				$tgl = $this->input->post('tanggal');
				$perihal = $this->input->post('perihal');
				$tujuan = $this->input->post('tujuan');
				$file = $upload_data['file_name'];
				$status = $this->input->post('status');
				$keterangan = $this->input->post('keterangan');
				$pembuat = $this->session->userdata('username');

				$mdk->setNoSurat($nosurat);
				$mdk->settgl_surat($tgl);
				$mdk->setperihal($perihal);
				$mdk->setTujuan($tujuan);
				$mdk->setfile($file);
				$mdk->setstatus($status);
				$mdk->setketerangan($keterangan);
				$mdk->setpembuat($pembuat);
				$xx = $mdk->insertsuratkeluar();

				if ($xx){
					$this->beranda();
				}
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */