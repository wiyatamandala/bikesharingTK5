<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function getinsert($data)
	{
		$this->db->insert('transaksi',$data);
	}
	

	public function tampildataAnggota() //khusus untuk menampilkan transaksi anggota yg sedang login
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('anggota','anggota.no_kartu = transaksi.no_kartu_anggota');
        $this->db->where('ktp',$this->session->userdata('ktp'));
        $query = $this->db->get();

        return $query;
    }

}