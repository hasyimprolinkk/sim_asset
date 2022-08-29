<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {

	public function getJenisId($id)
	{
		return $this->db->get_where('tb_jenis', ['id_jenis' => $id])->row_array();
	}

	public function getJenis()
	{
		$this->db->order_by('nama', 'ASC');
		return $this->db->get('tb_jenis')->result_array();
	}	

	public function addJenis()
	{
		$data = [
			'nama' => $this->input->post('nama', true)
		];

		$this->db->insert('tb_jenis', $data);
	}

	public function updateJenis($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		
		$data = [
			'nama' => $this->input->post('nama', true),
            'updated_at' => date('Y-m-d H:i:s')
		];
		
		$this->db->where('id_jenis', $id);
		$this->db->update('tb_jenis', $data);
	}

	public function deleteJenis($id)
	{
		$this->db->delete('tb_jenis', ['id_jenis' => $id]);
	}

}

/* End of file Custumer_model.php */
/* Location: ./application/models/Custumer_model.php */