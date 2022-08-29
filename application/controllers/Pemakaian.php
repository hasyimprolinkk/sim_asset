<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemakaian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_session_not_login();
		$this->load->model('User_model', 'user');
		$this->load->model('Asset_model', 'asset');
		$this->load->model('Jenis_model', 'jenis');
		$this->load->model('Kategori_model', 'kategori');
		$this->load->model('Pemakaian_model', 'pemakaian');
	}

	public function index()
	{
		$data['title']   = "SIM Asset | Pemakaian Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['assets']   = $this->pemakaian->getPemakaian();

		$this->load->view('templates/header', $data);
		$this->load->view('pemakaian/pemakaian', $data);
		$this->load->view('templates/footer');
	}


	public function addpemakaian()
	{ 
		$data['title']    = "SIM Asset | Tambah Pemakaian Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['asset']    = $this->asset->getAssetPemakaian();

		$this->form_validation->set_rules('id_asset', 'Nama Aset', 'trim|required');
		$this->form_validation->set_rules('tujuan_pemakaian', 'Tujuan Pemakaian', 'required');
		$this->form_validation->set_rules('tanggal_pemakaian', 'Tanggal Pemakaian', 'date|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('pemakaian/pemakaian_add');
			$this->load->view('templates/footer');
		} else {
			$this->pemakaian->addPemakaian();
			$this->session->set_flashdata('message', 'ditambah');
			if($this->input->post('submit') == "formsavenew") {
				redirect('pemakaian/addpemakaian','refresh');
			} else {
				redirect('pemakaian','refresh');
			}
		}
	}

	public function delete($id)
	{
		$id = decrypt_url($id);

		$this->pemakaian->deletePemakaianId($id);
	    $this->session->set_flashdata('message', 'dihapus');
		redirect('pemakaian','refresh');
	}

	public function cancel($id)
	{
		$id = decrypt_url($id);

		$this->pemakaian->status($id, "Dibatalkan");
	    $this->session->set_flashdata('message', 'dibatalkan');
		redirect('pemakaian','refresh');
	}

	public function terima($id)
	{
		$id = decrypt_url($id);

		$this->pemakaian->status($id, 'Disetujui');
	    $this->session->set_flashdata('message', 'Diterima');
		redirect('pemakaian','refresh');
	}

	public function kembali($id)
	{
		$id = decrypt_url($id);

		$this->pemakaian->status($id, 'Dikembalikan');
	    $this->session->set_flashdata('message', 'Dikembalikan');
		redirect('pemakaian','refresh');
	}

	public function laporan()
	{
		$data['title']   = "SIM Asset | Laporan Pemakaian Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['assets']   = $this->pemakaian->getPemakaian();

		$this->load->view('templates/header', $data);
		$this->load->view('pemakaian/pemakaian_laporan', $data);
		$this->load->view('templates/footer');
	}

	public function print($id)
	{
		$data['pemakaian'] = $this->pemakaian->getPemakaian(decrypt_url($id));
		$html = $this->load->view('pemakaian/pemakaian_print', $data, true);
		pdfGenerator($html, 'laporan_pemakaian_' . decrypt_url($id));
	}

	public function print_all()
	{
		$data['pemakaian'] = $this->pemakaian->getPemakaian();
		$html = $this->load->view('pemakaian/pemakaian_all', $data, true);
		pdfGenerator($html, 'laporan_pemakaian');
	}

	public function jumlah_check()
	{
		$jumlah 	= $this->input->post('jumlah_pemakaian');
		$id			= $this->input->post('id_asset');
		$result = $this->db->query("SELECT jumlah FROM tb_asset WHERE id_asset = '$id'")->row();
		if (intval($jumlah) > intval($result->jumlah)) {
			$this->form_validation->set_message('jumlah_check', "Jumlah pemakaian melebihi batas jumlah asset.");
			return FALSE;
		} else {
			return TRUE;
		}

	}


}

/* End of file Asset.php */
/* Location: ./application/controllers/Asset.php */