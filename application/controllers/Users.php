<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_session_not_login();
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		check_admin();
		$data['title']   = "SIM Asset | Users";
		$data['id_user'] = $this->session->userdata('id_user');
		$data['user']    = $this->user->getUserId($data['id_user']);
		$data['users']   = $this->user->getUsers();

		$this->load->view('templates/header', $data);
		$this->load->view('users/users', $data);
		$this->load->view('templates/footer');
	}

	public function adduser()
	{
		check_admin();
		$data['title']   = "SIM Asset | Add Users";
		$data['id_user'] = $this->session->userdata('id_user');
		$data['user']    = $this->user->getUserId($data['id_user']);

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[tb_user.username]', ['is_unique' => '%s sudah ada.']);
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|min_length[4]|matches[password1]');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');

		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('users/user_add');
			$this->load->view('templates/footer');
		} else {
			if ($_FILES['image']['error'] != 4) {
				$config['upload_path']          = './uploads/users/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 2048;
	            $config['max_width']            = 2000;
	            $config['max_height']           = 2000;
	            $config['encrypt_name']			= TRUE;

	            $this->load->library('upload', $config);

	            if ($this->upload->do_upload('image')) {
	            	$this->user->addUser();
	            	$this->session->set_flashdata('message', 'added');
	            	redirect('users','refresh');
	            } else {
	            	alert_error_upload($this->upload->display_errors());
	            	redirect('users/adduser','refresh');
	            }
			} else {
				$this->user->addUser();
	            $this->session->set_flashdata('message', 'added');
				redirect('users','refresh');
			}
		}
	}

	public function delete($id)
	{
		check_admin();
		$id = decrypt_url($id);
		if ($id == 1 || $id == '') {
			redirect('blocked','refresh');
			return false;
		}
		$this->user->deleteUserId($id);
	    $this->session->set_flashdata('message', 'deleted');
		redirect('users','refresh');
	}

	public function update($id)
	{
		check_admin();
		$id = decrypt_url($id);
		if ($id == '') {
			redirect('blocked','refresh');
			return false;
		}
		
		$data['title']     = "SIM Asset | Update Users";
		$data['id_user']   = $this->session->userdata('id_user');
		$data['user']      = $this->user->getUserId($data['id_user']);
		$data['edit_user'] = $this->user->getUserId($id);

		$this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|callback_username_check');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');
		
		if ($this->input->post('password1')) {
			$this->form_validation->set_rules('password1', 'Password', 'trim|min_length[4]|matches[password2]');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|min_length[4]|matches[password1]');
		}

		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('users/user_edit', $data);
			$this->load->view('templates/footer');
		} else {
			if ($_FILES['image']['error'] != 4) {
				$config['upload_path']          = './uploads/users/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 2048;
	            $config['max_width']            = 2000;
	            $config['max_height']           = 2000;
	            $config['encrypt_name']			= TRUE;

	            $this->load->library('upload', $config);

	            if ($this->upload->do_upload('image')) {
	            	$userdata = $this->user->getUserId($id);
	            	if ($userdata['image'] != null && $userdata['image'] != 'default_avatar.jpg') {
	            		$url_path = "./uploads/users/" . $userdata['image'];
	            		unlink($url_path);
	            	}
	            	$this->user->updateUserId();
	            	$this->session->set_flashdata('message', 'diupdate');
	            	redirect('users','refresh');
	            } else {
	            	alert_error_upload($this->upload->display_errors());
	            	redirect('users/update/'.encrypt_url($id), 'refresh');
	            }
			} else {
				$this->user->updateUserId();
	            $this->session->set_flashdata('message', 'diupdate');
				redirect('users','refresh');
			}
		}
	}

	public function profile($id)
	{
		$id = decrypt_url($id);

		if ($id == '' || $id != $this->session->userdata('id_user')) {
			redirect('blocked','refresh');
			return false; 
		}
		
		$data['title']     = "SIM Asset | Profile";
		$data['id_user']   = $this->session->userdata('id_user');
		$data['user']      = $this->user->getUserId($data['id_user']);
		$data['edit_user'] = $this->user->getUserId($id);

		$this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|callback_username_check');
		
		if ($this->input->post('password1')) {
			$this->form_validation->set_rules('password1', 'Password', 'trim|min_length[4]|matches[password2]');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|min_length[4]|matches[password1]');
		}

		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('users/user_profile', $data);
			$this->load->view('templates/footer');
		} else {
			if ($_FILES['image']['error'] != 4) {
				$config['upload_path']          = './uploads/users/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 2048;
	            $config['max_width']            = 2000;
	            $config['max_height']           = 2000;
	            $config['encrypt_name']			= TRUE;

	            $this->load->library('upload', $config);

	            if ($this->upload->do_upload('image')) {
	            	$userdata = $this->user->getUserId($id);
	            	if ($userdata['image'] != null && $userdata['image'] != 'default_avatar.jpg') {
	            		$url_path = "./uploads/users/" . $userdata['image'];
	            		unlink($url_path);
	            	}
	            	$this->user->updateProfile();
	            	$this->session->set_flashdata('message', 'diupdate');
	            	redirect('profile/'.encrypt_url($id),'refresh');
	            } else {
	            	alert_error_upload($this->upload->display_errors());
	            	redirect('profile/'.encrypt_url($id), 'refresh');
	            }
			} else {
				$this->user->updateProfile();
	            $this->session->set_flashdata('message', 'diupdate');
				redirect('profile/'.encrypt_url($id),'refresh');
			}
		}
	}

	public function username_check()
	{
		$user 	= $this->input->post('username');
		$id 	= decrypt_url($this->input->post('id_user'));
		$result = $this->db->query("SELECT * FROM tb_user WHERE username = '$user' AND id_user != '$id'");
		if ($result->num_rows() > 0) {
			$this->form_validation->set_message('username_check', 'Username ini sudah ada.');
			return FALSE;
		} else {
			return TRUE;
		}

	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */