<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghapusan_model extends CI_Model {

    public function getPenghapusan($id = null)
    {
        $this->db->select('tb_penghapusan.*, tb_asset.nama_asset, tb_user.nama as nama_user');
		$this->db->from('tb_penghapusan');
		$this->db->join('tb_asset', 'tb_asset.id_asset = tb_penghapusan.id_asset');
		$this->db->join('tb_user', 'tb_user.id_user = tb_penghapusan.id_user');
		if ($id != null) {
			$this->db->where('id_penghapusan', $id, FALSE);
		}
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result_array();
    }

	public function addPenghapusan()
	{
		$data = [
			'id_asset'    			=> $this->input->post('id_asset', true),
			'status'    			=> "Diproses",
			'tujuan_penghapusan' 	=> $this->input->post('tujuan_penghapusan', true),
			'id_user' 				=> $this->session->userdata('id_user')
		];

		$this->db->insert('tb_penghapusan', $data);
		
	}

	public function deletePenghapusanId($id)
	{
        $this->db->delete('tb_penghapusan', ['id_penghapusan' => $id]);
	}

	public function status($id, $status)
	{
        $this->db->where('id_penghapusan', $id);
        $this->db->update('tb_penghapusan', ['status' => $status]);
	}




}

/* End of file Penghapusan_model.php */
/* Location: ./application/models/Penghapusan_model.php */