<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_session_not_login();
		$this->load->model('User_model', 'user');
		$this->load->model('Asset_model', 'asset');
		$this->load->model('Monitoring_model', 'monitoring');
		$this->load->model('Pemakaian_model', 'pemakaian');
		$this->load->model('Pengadaan_model', 'pengadaan');
		$this->load->model('Pengelolaan_model', 'pengelolaan');
		$this->load->model('Penghapusan_model', 'penghapusan');

	}

	public function index()
	{
		$data['title'] 		= "SIM Asset | Monitoring";
		$data['id_user'] 	= $this->session->userdata('id_user');
		$data['user'] 		= $this->user->getUserId($data['id_user']);
		$data['users'] 		= $this->user->getUsers();
		$data['asset'] 		= $this->asset->getAsset();
		$data['pemakaian'] 		= $this->pemakaian->getPemakaian();
		$data['pengadaan'] 		= $this->pengadaan->getPengadaan();
		$data['pengelolaan'] 		= $this->pengelolaan->getPengelolaan();
		$data['penghapusan'] 		= $this->penghapusan->getPenghapusan();
		$data['pakai']		= $this->monitoring->getPemakaianToday();
		$data['pengada']	= $this->monitoring->getPengadaanToday();
		$data['kelola']		= $this->monitoring->getPengelolaanToday();
		$data['hapus']		= $this->monitoring->getPenghapusanToday();


		$this->load->view('templates/header', $data);
		$this->load->view('monitoring/monitoring');
		$this->load->view('templates/footer');
	}
}
