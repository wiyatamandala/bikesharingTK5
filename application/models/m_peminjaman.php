<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peminjaman extends CI_Model {

	
    public function getStasiun(){
        $hasil = $this->db->get('stasiun');
        return $hasil;
    }

     public function getSepeda(){
        $this->db->select('*');
        $this->db->from('sepeda');
        $this->db->join('stasiun', 'stasiun.id_stasiun = sepeda.id_stasiun');
        $query = $this->db->get();

        return $query;
    }


	public function getinsert($data)
	{
		$this->db->insert('peminjaman',$data);
	}


	public function getupdate($key,$key2,$data)
    {
        $this->db->where('no_kartu_anggota',$key);
        $this->db->where('datetime_pinjam',$key2);
        $this->db->update('peminjaman',$data);
    }


	public function tampildata() //alternatif
	{
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('stasiun','stasiun.id_stasiun = peminjaman.id_stasiun');
        $query = $this->db->get();

        return $query;
	}

    public function tampildataAnggota() //khusus untuk menampilkan peminjaman anggota yg sedang login
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota','anggota.no_kartu = peminjaman.no_kartu_anggota');
        $this->db->join('stasiun','stasiun.id_stasiun = peminjaman.id_stasiun');
        $this->db->where('ktp',$this->session->userdata('ktp'));
        $query = $this->db->get();

        return $query;
    }


}
