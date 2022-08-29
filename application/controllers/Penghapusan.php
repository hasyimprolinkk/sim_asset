<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghapusan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_session_not_login();
		$this->load->model('User_model', 'user');
		$this->load->model('Asset_model', 'asset');
		$this->load->model('Jenis_model', 'jenis');
		$this->load->model('Kategori_model', 'kategori');
		$this->load->model('Penghapusan_model', 'penghapusan');
	}

	public function index()
	{
		$data['title']   = "SIM Asset | Penghapusan Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['penghapusan']   = $this->penghapusan->getPenghapusan();

		$this->load->view('templates/header', $data);
		$this->load->view('penghapusan/penghapusan', $data);
		$this->load->view('templates/footer');
	}


	public function addpenghapusan()
	{
		$data['title']    = "SIM Asset | Tambah Penghapusan Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['asset']	  = $this->asset->getAsset();

		$this->form_validation->set_rules('id_asset', 'Nama Aset', 'trim|required');
		$this->form_validation->set_rules('tujuan_penghapusan', 'Tujuan Penghapusan', 'required');

		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('penghapusan/penghapusan_add');
			$this->load->view('templates/footer');
		} else {
			// $hapus  = $this->input->post('jumlah');
			// $id 	= $this->input->post('id_asset');
			// $this->db->query("UPDATE tb_asset SET jumlah = jumlah - $hapus WHERE id_asset = $id");
			$this->penghapusan->addPenghapusan();
			$this->session->set_flashdata('message', 'ditambah');
			if($this->input->post('submit') == "formsavenew") {
				redirect('penghapusan/addpenghapusan','refresh');
			} else {
				redirect('penghapusan','refresh');
			}
		}
	}

	public function delete($id)
	{
		$id = decrypt_url($id);

		$this->penghapusan->deletePenghapusanId($id);
	    $this->session->set_flashdata('message', 'dihapus');
		redirect('penghapusan','refresh');
	}

	// public function status($id, $status)
	// {
	// 	$id = decrypt_url($id);

	// 	$this->penghapusan->statusPenghapusanId($id, $status);
	//     $this->session->set_flashdata('message', $status);
	// 	redirect('penghapusan','refresh');
	// }

	public function cancel($id)
	{
		$id = decrypt_url($id);

		$this->penghapusan->status($id, "Dibatalkan");
	    $this->session->set_flashdata('message', "Dibatalkan");
		redirect('penghapusan','refresh');
	}

	public function terima($id)
	{
		$id = decrypt_url($id);

		$this->penghapusan->status($id, "Disetujui");
	    $this->session->set_flashdata('message', "Disetujui");
		redirect('penghapusan','refresh');
	}

	public function laporan()
	{
		$data['title']   = "SIM Asset | Laporan Penghapusan Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['penghapusan']   = $this->penghapusan->getPenghapusan();

		$this->load->view('templates/header', $data);
		$this->load->view('penghapusan/penghapusan_laporan', $data);
		$this->load->view('templates/footer');
	}

	public function print($id)
	{
		$data['penghapusan'] = $this->penghapusan->getPenghapusan(decrypt_url($id));
		$html = $this->load->view('penghapusan/penghapusan_print', $data, true);
		pdfGenerator($html, 'laporan_penghapusan_' . decrypt_url($id));
	}

	public function print_all()
	{
		$data['penghapusan'] = $this->penghapusan->getPenghapusan();
		$html = $this->load->view('penghapusan/penghapusan_all', $data, true);
		pdfGenerator($html, 'laporan_penghapusan');
	}

	public function jumlah_check()
	{
		$jumlah 	= $this->input->post('jumlah');
		$id			= $this->input->post('id_asset');
		$result = $this->db->query("SELECT jumlah FROM tb_asset WHERE id_asset = '$id'")->row();
		if (intval($jumlah) > intval($result->jumlah)) {
			$this->form_validation->set_message('jumlah_check', "Jumlah penghapusan melebihi batas jumlah asset.");
			return FALSE;
		} else {
			return TRUE;
		}

	}


}

/* End of file Asset.php */
/* Location: ./application/controllers/Asset.php */