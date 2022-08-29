<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring_model extends CI_Model {

	public function getPemakaianToday()
    {
        $this->db->select('tb_pemakaian.*, tb_asset.nama_asset, tb_user.nama as nama_user');
		$this->db->from('tb_pemakaian');
		$this->db->join('tb_asset', 'tb_asset.id_asset = tb_pemakaian.id_asset');
		$this->db->join('tb_user', 'tb_user.id_user = tb_pemakaian.id_user');
		$this->db->like('tb_pemakaian.created_at', date('Y-m-d'));
		return $this->db->get()->result_array();
    }

    
    public function getPengadaanToday()
    {
        $this->db->select('tb_pengadaan.*, tb_user.nama as nama_user');
		$this->db->from('tb_pengadaan');
		$this->db->join('tb_user', 'tb_user.id_user = tb_pengadaan.id_user');
        $this->db->like('tb_pengadaan.created_at', date('Y-m-d'));
		return $this->db->get()->result_array();
    }
    
    public function getPengelolaanToday()
    {
        $this->db->select('tb_pengelolaan.*, tb_asset.nama_asset, tb_user.nama as nama_user');
		$this->db->from('tb_pengelolaan');
		$this->db->join('tb_asset', 'tb_asset.id_asset = tb_pengelolaan.id_asset');
		$this->db->join('tb_user', 'tb_user.id_user = tb_pengelolaan.id_user');
        $this->db->like('tb_pengelolaan.created_at', date('Y-m-d'));
		return $this->db->get()->result_array();
    }
    
    public function getPenghapusanToday()
    {
        $this->db->select('tb_penghapusan.*, tb_asset.nama_asset, tb_user.nama as nama_user');
		$this->db->from('tb_penghapusan');
		$this->db->join('tb_asset', 'tb_asset.id_asset = tb_penghapusan.id_asset');
		$this->db->join('tb_user', 'tb_user.id_user = tb_penghapusan.id_user');
        $this->db->like('tb_penghapusan.created_at', date('Y-m-d'));
		return $this->db->get()->result_array();
    }



}

/* End of file Pemakaian_model.php */
/* Location: ./application/models/Pemakaian_model.php */