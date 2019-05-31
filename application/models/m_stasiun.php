<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stasiun extends CI_Model {


    public function auto_id(){
        $today = date('ymd');
        $iterasi = 1;
        $awalan = 'ST';
        $kode = $awalan.$today.(string)$iterasi;
        while(true){
            $query = $this->db->query("select id_stasiun from stasiun where id_stasiun='$kode'");
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

    // public function getPetugas(){
    //     $hasil = $this->db->get('petugas');
    //     return $hasil;
    // }

	// public function getdata($key)
	// {
	// 	$this->db->where('id_acara','start_datetime','id_stasiun',$key);
	// 	$hasil = $this->db->get('penugasan');
	// 	return $hasil;
	// }

	public function getinsert($data)
	{
		$this->db->insert('stasiun',$data);
	}



	public function getupdate($key,$data)
    {
        $this->db->where('id_stasiun',$key);
        $this->db->update('stasiun',$data);
    }


	public function getdelete($key)
	{
        $this->db->where('id_stasiun',$key);
		$this->db->delete('stasiun');
	}


	public function tampildata() //alternatif
	{
        return $this->db->get('stasiun');
	}


}
