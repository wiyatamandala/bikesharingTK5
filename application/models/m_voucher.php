<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_voucher extends CI_Model {


    public function auto_id(){
        $today = date('ymd');
        $iterasi = 1;
        $awalan = 'VC';
        $kode = $awalan.$today.(string)$iterasi;
        while(true){
            $query = $this->db->query("select id_voucher from voucher where id_voucher='$kode'");
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


	public function getinsert($data)
	{
		$this->db->insert('voucher',$data);
	}


	public function getupdate($key,$data)
    {
        $this->db->where('id_voucher',$key);
        $this->db->update('voucher',$data);
    }


	public function getdelete($key)
	{
        $this->db->where('id_voucher',$key);
		$this->db->delete('voucher');
	}


	public function tampildata() //alternatif
	{
        $this->db->select('* ,voucher.nama as nv, person.nama as np');
        $this->db->from('voucher');
        $this->db->join('anggota', 'anggota.no_kartu = voucher.no_kartu_anggota', 'left');
        $this->db->join('person', 'person.ktp = anggota.ktp','left');
        $query = $this->db->get();

        return $query;
	}


}
