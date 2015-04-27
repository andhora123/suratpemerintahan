<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelsurat extends CI_Model {

	public $no_surat = '';
	public $tgl_surat = '';
	public $perihal = '';
	public $pengirim = '';
	public $di_tujukan = '';
	public $file = '';
	public $status = '';
	public $keterangan = '';
	public $pembuat  = '';
	public $tujuan  = '';

	public function setNoSurat($data){
		$this->no_surat = $data;
	}
	public function settgl_surat($data){
		$this->tgl_surat = $data;
	}
	public function setperihal($data){
		$this->perihal = $data;
	}
	public function setpengirim($data){
		$this->pengirim = $data;
	}
	public function setdi_tujukan($data){
		$this->di_tujukan = $data;
	}
	public function setfile($data){
		$this->file = $data;
	}
	public function setstatus($data){
		$this->status = $data;
	}
	public function setketerangan($data){
		$this->keterangan = $data;
	}
	public function setpembuat($data){
		$this->pembuat = $data;
	}
	public function setTujuan($data){
		$this->tujuan = $data;
	}
	/////////////////////////////////////////////
	/////////////////////////////////////////////

	public function getNoSurat(){
		return $this->no_surat;
	}
	public function gettgl_surat(){
		return $this->tgl_surat;
	}
	public function getperihal(){
		return $this->perihal;
	}
	public function getpengirim(){
		return $this->pengirim;
	}
	public function getdi_tujukan(){
		return $this->di_tujukan;
	}
	public function getfile(){
		return $this->file;
	}
	public function getstatus(){
		return $this->status;
	}
	public function getketerangan(){
		return $this->keterangan;
	}
	public function getpembuat(){
		return $this->pembuat;
	}
	public function gettujuan(){
		return $this->tujuan;
	}


	public function insertsurat(){
		$data = array (
					'no_surat'=>$this->getNoSurat(),
					'tgl_surat'=>$this->gettgl_surat(),
					'perihal'=>$this->getperihal(),
					'pengirim'=>$this->getpengirim(),
					'di_tujukan'=>$this->getdi_tujukan(),
					'file'=>$this->getfile(),
					'status'=>$this->getstatus(),
					'keterangan'=>$this->getketerangan(),
					'pembuat' => $this->getpembuat()
		);

		return $this->db->insert('tbl_suratmasuk', $data); 
	}
	public function insertsuratkeluar(){
		$data = array (
					'no_surat'=>$this->getNoSurat(),
					'tgl_surat'=>$this->gettgl_surat(),
					'perihal'=>$this->getperihal(),
					'tujuan'=>$this->gettujuan(),
					'file'=>$this->getfile(),
					'status'=>$this->getstatus(),
					'keterangan'=>$this->getketerangan(),
					'pembuat' => $this->getpembuat()
					);
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
	public function getmysuratkeluar($id){
		$this->db->where('id_surat',$id);
		$d = $this->db->get('tbl_suratkeluar');
		return $d->row_array();
	}
	public function editsuratmasuk($id_surat){
		$data = array (
					'no_surat'=>$this->getNoSurat(),
					'tgl_surat'=>$this->gettgl_surat(),
					'perihal'=>$this->getperihal(),
					'pengirim'=>$this->getpengirim(),
					'di_tujukan'=>$this->getdi_tujukan(),
					'file'=>$this->getfile(),
					'status'=>$this->getstatus(),
					'keterangan'=>$this->getketerangan(),
					'pembuat' => $this->getpembuat()
		);
		$this->db->where('id_surat',$id_surat);
		return $this->db->update('tbl_suratmasuk',$data);
	}
	public function editsuratkeluar($id_surat){
		$data = array (
					'no_surat'=>$this->getNoSurat(),
					'tgl_surat'=>$this->gettgl_surat(),
					'perihal'=>$this->getperihal(),
					'tujuan'=>$this->gettujuan(),
					'file'=>$this->getfile(),
					'status'=>$this->getstatus(),
					'keterangan'=>$this->getketerangan(),
					'pembuat' => $this->getpembuat()
					);
		$this->db->where('id_surat',$id_surat);
		return $this->db->update('tbl_suratkeluar',$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */