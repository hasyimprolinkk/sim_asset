<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_session_not_login();
		$this->load->model('User_model', 'user');
		$this->load->model('Asset_model', 'asset');
		$this->load->model('Jenis_model', 'jenis');
		$this->load->model('Kategori_model', 'kategori');
		$this->load->model('Pengelolaan_model', 'pengelolaan');
	}

	public function index()
	{
		$data['title']   = "SIM Asset | Pengelolaan Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['pengelolaan']   = $this->pengelolaan->getPengelolaan();

		$this->load->view('templates/header', $data);
		$this->load->view('pengelolaan/pengelolaan', $data);
		$this->load->view('templates/footer');
	}


	public function addpengelolaan()
	{
		$data['title']    = "SIM Asset | Tambah Pengelolaan Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['asset']	  = $this->asset->getAsset();

		$this->form_validation->set_rules('id_asset', 'Nama Aset', 'trim|required');
		$this->form_validation->set_rules('tujuan_pengelolaan', 'Tujuan Pengelolaan', 'required');

		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('pengelolaan/pengelolaan_add');
			$this->load->view('templates/footer');
		} else {
			$this->pengelolaan->addPengelolaan();
			$this->session->set_flashdata('message', 'ditambah');
			if($this->input->post('submit') == "formsavenew") {
				redirect('pengelolaan/addpengelolaan','refresh');
			} else {
				redirect('pengelolaan','refresh');
			}
		}
	}

	public function delete($id)
	{
		$id = decrypt_url($id);

		$this->pengelolaan->deletePengelolaanId($id);
	    $this->session->set_flashdata('message', 'dihapus');
		redirect('pengelolaan','refresh');
	}

	public function cancel($id)
	{
		$id = decrypt_url($id);

		$this->pengelolaan->status($id, "Dibatalkan");
	    $this->session->set_flashdata('message', "Dibatalkan");
		redirect('pengelolaan','refresh');
	}

	public function terima($id)
	{
		$id = decrypt_url($id);

		$this->pengelolaan->status($id, "Disetujui");
	    $this->session->set_flashdata('message', "Disetujui");
		redirect('pengelolaan','refresh');
	}

	public function laporan()
	{
		$data['title']   = "SIM Asset | Laporan Pengelolaan Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['pengelolaan']   = $this->pengelolaan->getPengelolaan();

		$this->load->view('templates/header', $data);
		$this->load->view('pengelolaan/pengelolaan_laporan', $data);
		$this->load->view('templates/footer');
	}

	public function print($id)
	{
		$data['pengelolaan'] = $this->pengelolaan->getPengelolaan(decrypt_url($id));
		$html = $this->load->view('pengelolaan/pengelolaan_print', $data, true);
		pdfGenerator($html, 'laporan_pengelolaan_' . decrypt_url($id));
	}

	public function print_all()
	{
		$data['pengelolaan'] = $this->pengelolaan->getPengelolaan();
		$html = $this->load->view('pengelolaan/pengelolaan_all', $data, true);
		pdfGenerator($html, 'laporan_pengelolaan');
	}

	public function jumlah_check()
	{
		$jumlah 	= $this->input->post('jumlah');
		$id			= $this->input->post('id_asset');
		$result = $this->db->query("SELECT jumlah FROM tb_asset WHERE id_asset = '$id'")->row();
		if (intval($jumlah) > intval($result->jumlah)) {
			$this->form_validation->set_message('jumlah_check', "Jumlah pengelolaan melebihi batas jumlah asset.");
			return FALSE;
		} else {
			return TRUE;
		}

	}


}

/* End of file Asset.php */
/* Location: ./application/controllers/Asset.php */