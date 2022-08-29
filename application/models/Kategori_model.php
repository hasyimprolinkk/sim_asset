<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function getKategoriId($id)
	{
		return $this->db->get_where('tb_kategori', ['id_kategori' => $id])->row_array();
	}

	public function getKategori()
	{
		$this->db->order_by('nama', 'ASC');
		return $this->db->get('tb_kategori')->result_array();
	}	

	public function addKategori()
	{
		$data = [
			'nama' => $this->input->post('nama', true)
		];

		$this->db->insert('tb_kategori', $data);
	}

	public function updateKategori($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		
		$data = [
			'nama' => $this->input->post('nama', true),
            'updated_at' => date('Y-m-d H:i:s')
		];
		
		$this->db->where('id_kategori', $id);
		$this->db->update('tb_kategori', $data);
	}

	public function deleteKategori($id)
	{
		$this->db->delete('tb_kategori', ['id_kategori' => $id]);
	}

}

/* End of file Custumer_model.php */
/* Location: ./application/models/Custumer_model.php */