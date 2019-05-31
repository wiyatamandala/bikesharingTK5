<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sepeda extends CI_Model {


    public function auto_id(){
        $today = date('ymd');
        $iterasi = 1;
        $awalan = 'BK';
        $kode = $awalan.$today.(string)$iterasi;
        while(true){
            $query = $this->db->query("select nomor from sepeda where nomor='$kode'");
            if ($query->num_rows() == 0) {
                break;
            }
            $iterasi = $iterasi + 1;
            $kode = $awalan.$today.(string)$iterasi;
        }
        if ($iterasi > 999) {
            echo "tidak bisa transaksi"; // ini entar di ganti tersererah buat notif usernya
        }
        
        return $kode;
    }


	
    public function getStasiun(){
        $hasil = $this->db->get('stasiun');
        return $hasil;
    }
    

    public function getPenyumbang(){
        $hasil = $this->db->get('anggota');
        return $hasil;
    }


	public function getinsert($data)
	{
		$this->db->insert('sepeda',$data);
	}


	public function getupdate($key,$data)
    {
        $this->db->where('nomor',$key);
        $this->db->update('sepeda',$data);
    }


	public function getdelete($key)
	{
        $this->db->where('nomor',$key);
		$this->db->delete('sepeda');
	}


	public function tampildata() //alternatif
	{
        //return $this->db->get('sepeda');
        $this->db->select('*');
        $this->db->from('sepeda');
        $this->db->join('stasiun', 'stasiun.id_stasiun = sepeda.id_stasiun');
        $query = $this->db->get();

        return $query;
	}


}
