<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_session_not_login();
		$this->load->model('User_model', 'user');
		$this->load->model('Asset_model', 'asset');
		$this->load->model('Jenis_model', 'jenis');
		$this->load->model('Kategori_model', 'kategori');
		$this->load->model('Pengadaan_model', 'pengadaan');
	}

	public function index()
	{
		$data['title']   = "SIM Asset | Pengadaan Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['pengadaan']   = $this->pengadaan->getPengadaan();

		$this->load->view('templates/header', $data);
		$this->load->view('pengadaan/pengadaan', $data);
		$this->load->view('templates/footer');
	}


	public function addpengadaan()
	{
		$data['title']    = "SIM Asset | Tambah Pengadaan Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);

		$this->form_validation->set_rules('nama_asset', 'Nama Aset', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Pengadaan', 'numeric|required');
		$this->form_validation->set_rules('total_harga', 'Total Harga Pengadaan', 'required');
		$this->form_validation->set_rules('tujuan_pengadaan', 'Tujuan Pengadaan', 'required');

		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('pengadaan/pengadaan_add');
			$this->load->view('templates/footer');
		} else {
			$this->pengadaan->addPengadaan();
			$this->session->set_flashdata('message', 'ditambah');
			if($this->input->post('submit') == "formsavenew") {
				redirect('pengadaan/addpengadaan','refresh');
			} else {
				redirect('pengadaan','refresh');
			}
		}
	}

	public function delete($id)
	{
		$id = decrypt_url($id);

		$this->pengadaan->deletePengadaanId($id);
	    $this->session->set_flashdata('message', 'dihapus');
		redirect('pengadaan','refresh');
	}

	public function status($id, $status)
	{
		$id = decrypt_url($id);

		$this->pengadaan->statusPengadaanId($id, $status);
	    $this->session->set_flashdata('message', $status);
		redirect('pengadaan','refresh');
	}

	public function laporan()
	{
		$data['title']   = "SIM Asset | Laporan Pengadaan Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['pengadaan']   = $this->pengadaan->getPengadaan();

		$this->load->view('templates/header', $data);
		$this->load->view('pengadaan/pengadaan_laporan', $data);
		$this->load->view('templates/footer');
	}

	public function print($id)
	{
		$data['pengadaan'] = $this->pengadaan->getPengadaan(decrypt_url($id));
		$html = $this->load->view('pengadaan/pengadaan_print', $data, true);
		pdfGenerator($html, 'laporan_pengadaan_' . decrypt_url($id));
	}

	public function print_all()
	{
		$data['pengadaan'] = $this->pengadaan->getPengadaan();
		$html = $this->load->view('pengadaan/pengadaan_all', $data, true);
		pdfGenerator($html, 'laporan_pengadaan');
	}


}

/* End of file Asset.php */
/* Location: ./application/controllers/Asset.php */