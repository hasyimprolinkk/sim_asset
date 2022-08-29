<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_session_not_login();
		check_admin();
		$this->load->model('User_model', 'user');
		$this->load->model('Jenis_model', 'jenis');
	}

	public function index()
	{
		$data['title'] = "SIM Asset | Jenis";
		$data['id_user'] = $this->session->userdata('id_user');
		$data['user'] = $this->user->getUserId($data['id_user']);
		$data['jenis'] = $this->jenis->getJenis();

		$this->load->view('templates/header', $data);
		$this->load->view('jenis/jenis', $data);
		$this->load->view('templates/footer');
	}

	public function addjenis()
	{
		$data['title'] = "SIM Asset | Add Jenis";
		$data['id_user'] = $this->session->userdata('id_user');
		$data['user'] = $this->user->getUserId($data['id_user']);

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('jenis/jenis_add');
			$this->load->view('templates/footer');
		} else {
			$this->jenis->addJenis();
			$this->session->set_flashdata('message', 'added');
			redirect('jenis','refresh');
		}
	}

	public function update($id)
	{
		$id = decrypt_url($id);
		$data['title'] = "SIM Asset | Update Jenis";
		$data['id_user'] = $this->session->userdata('id_user');
		$data['user'] = $this->user->getUserId($data['id_user']);
		$data['jenis'] = $this->jenis->getJenisId($id);

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('jenis/jenis_edit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->jenis->updateJenis($id);
			$this->session->set_flashdata('message', 'updated');
			redirect('jenis','refresh');
		}
	}

	public function delete($id)
	{
		$id = decrypt_url($id);
		$this->jenis->deleteJenis($id);
		$this->session->set_flashdata('message', 'deleted');
		redirect('jenis','refresh');
	}

}

/* End of file Jenis.php */
/* Location: ./application/controllers/Jenis.php */