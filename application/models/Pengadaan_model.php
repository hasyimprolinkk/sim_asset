<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadaan_model extends CI_Model {

    public function getPengadaan($id = null)
    {
        $this->db->select('tb_pengadaan.*, tb_user.nama as nama_user');
		$this->db->from('tb_pengadaan');
		$this->db->join('tb_user', 'tb_user.id_user = tb_pengadaan.id_user');
		if ($id != null) {
			$this->db->where('id_pengadaan', $id, FALSE);
		}
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result_array();
    }

	public function addPengadaan()
	{
		$data = [
			'nama_asset'    => $this->input->post('nama_asset', true),
			'jumlah'    	=> $this->input->post('jumlah', true),
			'total_harga'    	=> $this->input->post('total_harga', true),
			'tujuan_pengadaan'  	=> $this->input->post('tujuan_pengadaan', true),
			'id_user' 		=> $this->session->userdata('id_user')
		];

		$this->db->insert('tb_pengadaan', $data);
	}

	public function deletePengadaanId($id)
	{
        $this->db->delete('tb_pengadaan', ['id_pengadaan' => $id]);
	}

	public function statusPengadaanId($id, $status)
	{
        $this->db->where('id_pengadaan', $id);
        $this->db->update('tb_pengadaan', ['status' => $status]);
		
	}



}

/* End of file Pengadaan_model.php */
/* Location: ./application/models/Pengadaan_model.php */