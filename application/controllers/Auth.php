<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		check_session_login();

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/login');
		} else {
			$this->user->checkLogin();
		}
	}

	public function logout()
	{
		$data = ['user_id', 'level'];
		$this->session->unset_userdata($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
	        <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
	        <i class="icon fa fa-check"></i>Logout berhasil!</div>');
		redirect('auth','refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */