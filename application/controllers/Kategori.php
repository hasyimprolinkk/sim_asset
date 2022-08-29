<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_session_not_login();
		check_admin();
		$this->load->model('User_model', 'user');
		$this->load->model('Kategori_model', 'kategori');
	}

	public function index()
	{
		$data['title'] = "SIM Asset | Kategori";
		$data['id_user'] = $this->session->userdata('id_user');
		$data['user'] = $this->user->getUserId($data['id_user']);
		$data['kategori'] = $this->kategori->getKategori();

		$this->load->view('templates/header', $data);
		$this->load->view('kategori/kategori', $data);
		$this->load->view('templates/footer');
	}

	public function addkategori()
	{
		$data['title'] = "SIM Asset | Add Kategori";
		$data['id_user'] = $this->session->userdata('id_user');
		$data['user'] = $this->user->getUserId($data['id_user']);

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('kategori/kategori_add');
			$this->load->view('templates/footer');
		} else {
			$this->kategori->addKategori();
			$this->session->set_flashdata('message', 'added');
			redirect('kategori','refresh');
		}
	}

	public function update($id)
	{
		$id = decrypt_url($id);
		$data['title'] = "SIM Asset | Update Kategori";
		$data['id_user'] = $this->session->userdata('id_user');
		$data['user'] = $this->user->getUserId($data['id_user']);
		$data['kategori'] = $this->kategori->getKategoriId($id);

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('kategori/kategori_edit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->kategori->updateKategori($id);
			$this->session->set_flashdata('message', 'updated');
			redirect('kategori','refresh');
		}
	}

	public function delete($id)
	{
		$id = decrypt_url($id);
		$this->kategori->deleteKategori($id);
		$this->session->set_flashdata('message', 'deleted');
		redirect('kategori','refresh');
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */