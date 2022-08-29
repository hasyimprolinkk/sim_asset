<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemakaian_model extends CI_Model {

    public function getPemakaian($id = null)
    { 
        $this->db->select('tb_pemakaian.*, tb_asset.nama_asset, tb_user.nama as nama_user');
		$this->db->from('tb_pemakaian');
		$this->db->join('tb_asset', 'tb_asset.id_asset = tb_pemakaian.id_asset');
		$this->db->join('tb_user', 'tb_user.id_user = tb_pemakaian.id_user');
		if ($id != null) {
			$this->db->where('id_pemakaian', $id, FALSE);
		}
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result_array();
    }

	public function getPemakaianToday()
    {
        $this->db->select('tb_pemakaian.*, tb_asset.nama_asset, tb_user.nama as nama_user');
		$this->db->from('tb_pemakaian');
		$this->db->join('tb_asset', 'tb_asset.id_asset = tb_pemakaian.id_asset');
		$this->db->join('tb_user', 'tb_user.id_user = tb_pemakaian.id_user');
		$this->db->like('tb_pemakaian.created_at', date('Y-m-d'));
		return $this->db->get()->result_array();
    }


	public function addPemakaian()
	{
		$data = [
			'id_asset'    => $this->input->post('id_asset', true),
			'tujuan_pemakaian'    	=> $this->input->post('tujuan_pemakaian', true),
			'tanggal_pemakaian'  	=> $this->input->post('tanggal_pemakaian', true),
			'status'    	=> "Diproses",
			'deskripsi'    	=> $this->input->post('deskripsi'),
			'id_user' 		=> $this->session->userdata('id_user')
		];

		$this->db->insert('tb_pemakaian', $data);
	}

	public function deletePemakaianId($id)
	{
        $this->db->delete('tb_pemakaian', ['id_pemakaian' => $id]);
	}

	public function status($id, $status)
	{
        $this->db->where('id_pemakaian', $id);
        $this->db->update('tb_pemakaian', ['status' => $status]);

		
		$asset = $this->db->get_where('tb_pemakaian', ['id_pemakaian' => $id])->row_array();

		if($status == "Dibatalkan" || $status == "Dikembalikan"){
			$this->db->where('id_asset', $asset['id_asset']);
			$this->db->update('tb_asset', ['status' => 'Tersedia']);
		} elseif($status == "Disetujui"){
			$this->db->where('id_asset', $asset['id_asset']);
			$this->db->update('tb_asset', ['status' => 'Dipakai']);
		}
	}



}

/* End of file Pemakaian_model.php */
/* Location: ./application/models/Pemakaian_model.php */