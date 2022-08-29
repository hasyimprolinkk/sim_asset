<?php 

	function check_session_login() 
	{
		$CI =& get_instance();
		$data['id_user'] = $CI->session->has_userdata('id_user');
		$data['level'] = $CI->session->has_userdata('level');

		if ($data['id_user'] && $data['level']) {
			redirect('dashboard','refresh');
		}
	}

	function check_session_not_login()
	{
		$CI =& get_instance();
		$data['id_user'] = $CI->session->has_userdata('id_user');
		$data['level'] = $CI->session->has_userdata('level');

		if (!$data['id_user'] || !$data['level']) {
			redirect('auth','refresh');
		}
	}

	function check_admin()
	{
		$CI =& get_instance();
		$data['id_user'] = $CI->session->userdata('id_user');
		$user = $CI->db->get_where('tb_user', ['id_user' => $data['id_user']])->row_array();

		if ($user['level'] != 1) {
			redirect('blocked','refresh');
		}
	}
