<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaan_model extends CI_Model {

    public function getPengelolaan($id = null)
    {
        $this->db->select('tb_pengelolaan.*, tb_asset.nama_asset, tb_user.nama as nama_user');
		$this->db->from('tb_pengelolaan');
		$this->db->join('tb_asset', 'tb_asset.id_asset = tb_pengelolaan.id_asset');
		$this->db->join('tb_user', 'tb_user.id_user = tb_pengelolaan.id_user');
		if ($id != null) {
			$this->db->where('id_pengelolaan', $id, FALSE);
		}
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result_array();
    }

	public function addPengelolaan()
	{
		$data = [
			'id_asset'    			=> $this->input->post('id_asset', true),
			'tujuan_pengelolaan' 	=> $this->input->post('tujuan_pengelolaan', true),
			'status'    			=> "Diproses",
			'id_user' 				=> $this->session->userdata('id_user')
		];

		$this->db->insert('tb_pengelolaan', $data);
	}

	public function deletePengelolaanId($id)
	{
        $this->db->delete('tb_pengelolaan', ['id_pengelolaan' => $id]);
	}

	public function status($id, $status)
	{
        $this->db->where('id_pengelolaan', $id);
        $this->db->update('tb_pengelolaan', ['status' => $status]);
	}




}

/* End of file Pengelolaan_model.php */
/* Location: ./application/models/Pengelolaan_model.php */