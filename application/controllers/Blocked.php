<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blocked extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/blocked');	
	}

	public function error()
	{
		$this->load->view('errors/html/404_error');
	}

}

/* End of file Blocked.php */
/* Location: ./application/controllers/Blocked.php */