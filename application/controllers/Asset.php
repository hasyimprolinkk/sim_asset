<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_session_not_login();
		check_admin();
		$this->load->model('User_model', 'user');
		$this->load->model('Asset_model', 'asset');
		$this->load->model('Jenis_model', 'jenis');
		$this->load->model('Kategori_model', 'kategori');
	}

	public function index()
	{
		$data['title']   = "SIM Asset | Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['assets']   = $this->asset->getAsset();

		$this->load->view('templates/header', $data);
		$this->load->view('asset/asset', $data);
		$this->load->view('templates/footer');
	}

	public function addasset()
	{
		$data['title']    = "SIM Asset | Add Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['jenis']    = $this->jenis->getJenis();
		$data['kategori'] = $this->kategori->getKategori();

		$this->form_validation->set_rules('nama_asset', 'Nama Aset', 'trim|required');
		$this->form_validation->set_rules('id_jenis', 'Jenis', 'numeric|required');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'numeric|required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('nopol', 'Nopol', 'required');
		$this->form_validation->set_rules('km', 'km', 'numeric|required');

		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('asset/asset_add');
			$this->load->view('templates/footer');
		} else {
			if ($_FILES['gambar']['error'] != 4) {
				$config['upload_path']          = './uploads/asset/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 2048;
	            $config['max_width']            = 2000;
	            $config['max_height']           = 2000;
	            $config['encrypt_name']			= TRUE;

	            $this->load->library('upload', $config);

	            if ($this->upload->do_upload('gambar')) {
	            	$this->asset->addAsset();
	            	$this->session->set_flashdata('message', 'added');
	            	redirect('asset','refresh');
	            } else {
	            	alert_error_upload($this->upload->display_errors());
	            	redirect('asset/addasset','refresh');
	            }
			} else {
				$this->asset->addAsset();
	            $this->session->set_flashdata('message', 'added');
				redirect('asset','refresh');
			}
		}
	}

	public function delete($id)
	{
		$id = decrypt_url($id);

		$this->asset->deleteAssetId($id);
	    $this->session->set_flashdata('message', 'deleted');
		redirect('asset','refresh');
	}

	public function update($id)
	{
		$id = decrypt_url($id);
		
		$data['title']     = "SIM Asset | Update Asset";
		$data['id_user']  = $this->session->userdata('id_user');
		$data['user'] 	  = $this->user->getUserId($data['id_user']);
		$data['asset'] = $this->asset->getAsset($id);
		$data['jenis']    = $this->jenis->getJenis();
		$data['kategori'] = $this->kategori->getKategori();

		$this->form_validation->set_rules('nama_asset', 'Nama Aset', 'trim|required');
		$this->form_validation->set_rules('id_jenis', 'Jenis', 'numeric|required');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'numeric|required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
		$this->form_validation->set_rules('nopol', 'nopol', 'required');
		$this->form_validation->set_rules('km', 'km', 'numeric|required');

		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('asset/asset_edit', $data);
			$this->load->view('templates/footer');
		} else {
			if ($_FILES['gambar']['error'] != 4) {
				$config['upload_path']          = './uploads/asset/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 2048;
	            $config['max_width']            = 2000;
	            $config['max_height']           = 2000;
	            $config['encrypt_name']			= TRUE;

	            $this->load->library('upload', $config);
				
	            if ($this->upload->do_upload('gambar')) {
	            	$assetdata = $this->asset->checkAssetId($id);
	            	if ($assetdata['gambar'] != null && $assetdata['gambar'] != 'default.jpg') {
	            		$url_path = "./uploads/asset/" . $assetdata['gambar'];
	            		unlink($url_path);
	            	}
	            	$this->asset->updateAssetId($id);
	            	$this->session->set_flashdata('message', 'updated');
	            	redirect('asset','refresh');
	            } else {
	            	alert_error_upload($this->upload->display_errors());
	            	redirect('asset/update/'.encrypt_url($id), 'refresh');
	            }
			} else {
				$this->asset->updateAssetId($id);
	            $this->session->set_flashdata('message', 'updated');
				redirect('asset','refresh');
			}
		}
	}


}

/* End of file Asset.php */
/* Location: ./application/controllers/Asset.php */