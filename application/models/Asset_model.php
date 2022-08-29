<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset_model extends CI_Model {

    public function getAsset($id = null)
    {
        $this->db->select('tb_asset.*, tb_jenis.nama as jenis, tb_kategori.nama as kategori');
		$this->db->from('tb_asset');
		$this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_asset.id_jenis');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_asset.id_kategori');
		if ($id != null) {
			$this->db->where('id_asset', $id, FALSE);
		}
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result_array();
    }

	public function getAssetPemakaian()
    {
        $this->db->select('tb_asset.*, tb_jenis.nama as jenis, tb_kategori.nama as kategori');
		$this->db->from('tb_asset');
		$this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_asset.id_jenis');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_asset.id_kategori');
		$this->db->where('status', "Tersedia");
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result_array();
    }

	public function getAssetUpdate()
    {
        $this->db->select('tb_asset.*, tb_jenis.nama as jenis, tb_kategori.nama as kategori');
		$this->db->from('tb_asset');
		$this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_asset.id_jenis');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_asset.id_kategori');
		$this->db->where('jumlah >', "0", FALSE);
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result_array();
    }



	public function addAsset()
	{
		$data = [
			'nama_asset'    => $this->input->post('nama_asset', true),
			'id_jenis'    	=> $this->input->post('id_jenis', true),
			'id_kategori'  	=> $this->input->post('id_kategori', true),
			'harga'    		=> $this->input->post('harga', true),
			'deskripsi'    	=> $this->input->post('deskripsi'),
			'kondisi' 		=> $this->input->post('kondisi', true),
			'nopol' 		=> $this->input->post('nopol', true),
			'km'	 		=> $this->input->post('km', true),
			'status' 		=> "Tersedia",
			'gambar'    	=> null
		];

		if ($_FILES['gambar']['name'] != null) {
			$data['gambar'] .= $this->upload->data('file_name'); 
		}else {
			$data['gambar'] .= 'default.jpg';
		}

		$this->db->insert('tb_asset', $data);
	}

	public function deleteAssetId($id)
	{

        $data = $this->db->get_where('tb_asset', ['id_asset' => $id])->row_array();
        if ($data['gambar'] != null && $data['gambar'] != 'default.jpg') {
            $path = "./uploads/asset/" . $data['gambar'];
            unlink($path);
        }
        $this->db->delete('tb_asset', ['id_asset' => $id]);
		
	}

	public function checkAssetId($id)
	{
        return $this->db->get_where('tb_asset', ['id_asset' => $id])->row_array();
	}

	public function updateAssetId($id)
	{
		// $id = $this->input->post('id_asset');
		// $ids = decrypt_url($id);

		
        $data['nama_asset']  = $this->input->post('nama_asset', true);
        $data['id_jenis']    = $this->input->post('id_jenis', true);
        $data['id_kategori'] = $this->input->post('id_kategori', true);
        $data['harga']       = $this->input->post('harga', true);
        $data['deskripsi']   = $this->input->post('deskripsi');
        $data['kondisi']     = $this->input->post('kondisi', true);
        $data['nopol']      = $this->input->post('nopol', true);
		$data['km']      = $this->input->post('km', true);

        if ($_FILES['gambar']['name'] != null) {
            $data['gambar'] = $this->upload->data('file_name');
        }

        $this->db->where('id_asset', $id);
        $this->db->update('tb_asset', $data);
		
	}



}

/* End of file Asset_model.php */
/* Location: ./application/models/Asset_model.php */