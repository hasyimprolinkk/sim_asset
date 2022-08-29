<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function checkLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result   = $this->db->get_where('tb_user', ['username' => $username, 'password' => sha1($password)]);

		if ($result->num_rows() > 0) {
			$user 		 = $result->row_array();
			$set_session = ['id_user' => $user['id_user'], 'level' => $user['level']];
			$this->session->set_userdata($set_session);
			redirect('monitoring', 'refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
	        <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
	        <i class="icon fa fa-warning"></i> Username / password salah!</div>');
			redirect('auth','refresh');
		}
	}

	public function getUserId($data)
	{
		return $this->db->get_where('tb_user', ['id_user' => $data])->row_array();
	}

	public function getUsers()
	{
		return $this->db->get('tb_user')->result_array();
	}

	public function addUser()
	{
		$data = [
			'nama'     => $this->input->post('nama', true),
			'email'  => $this->input->post('email', true),
			'jabatan'  => $this->input->post('jabatan', true),
			'no_hp'  => $this->input->post('no_hp', true),
			'level'    => $this->input->post('level'),
			'image'    => null,
			'username' => $this->input->post('username', true),
			'password' => sha1($this->input->post('password1', true)),
		];

		if ($_FILES['image']['name'] != null) {
			$data['image'] .= $this->upload->data('file_name'); 
		}else {
			$data['image'] .= 'default_avatar.jpg';
		}

		$this->db->insert('tb_user', $data);
	}

	public function deleteUserId($id)
	{
		if ($id == 1) {
			redirect('blocked','refresh');
			return FALSE;
		} else {
			$data = $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
			if ($data['image'] != null && $data['image'] != 'default_avatar.jpg') {
				$path = "./uploads/users/" . $data['image'];
				unlink($path);
			}
			$this->db->delete('tb_user', ['id_user' => $id]);
		}
	}

	public function updateUserId()
	{
		$id = $this->input->post('id_user');
		$id = decrypt_url($id);

		$data['nama'] = $this->input->post('nama', true);
		$data['email']  = $this->input->post('email', true);
		$data['jabatan']  = $this->input->post('jabatan', true);
		$data['no_hp']  = $this->input->post('no_hp', true);
		$data['username'] = $this->input->post('username', true);
		if (!empty($this->input->post('password1'))) {
			$data['password'] = sha1($this->input->post('password1', true));
		}
		$data['level'] = $this->input->post('level');
		if ($_FILES['image']['name'] != null) {
			$data['image'] = $this->upload->data('file_name');
		}

		$this->db->where('id_user', $id);
		$this->db->update('tb_user', $data);
	}

	public function updateProfile()
	{
		$id = $this->input->post('id_user');
		$id = decrypt_url($id);

		$data['nama'] = $this->input->post('nama', true);
		$data['email']  = $this->input->post('email', true);
		$data['jabatan']  = $this->input->post('jabatan', true);
		$data['no_hp']  = $this->input->post('no_hp', true);
		$data['username'] = $this->input->post('username', true);
		if (!empty($this->input->post('password1'))) {
			$data['password'] = sha1($this->input->post('password1', true));
		}
		if ($_FILES['image']['name'] != null) {
			$data['image'] = $this->upload->data('file_name');
		}

		$this->db->where('id_user', $id);
		$this->db->update('tb_user', $data);
	}



}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */