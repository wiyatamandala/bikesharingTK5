<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_petugas extends CI_Model {

	
    public function getStasiun(){
        $hasil = $this->db->get('stasiun');
        return $hasil;
    }

    public function getPetugas(){
        $hasil = $this->db->get('petugas');
        return $hasil;
    }

	public function getdata($key)
	{
		$this->db->where('id_acara','start_datetime','id_stasiun',$key);
		$hasil = $this->db->get('penugasan');
		return $hasil;
	}

	public function getinsert($data)
	{
		$this->db->insert('penugasan',$data);
	}



	public function getupdate($key,$key2,$key3,$data)
    {
        $this->db->where('ktp',$key);
        $this->db->where('start_datetime',$key2);
        $this->db->where('id_stasiun',$key3);
        $this->db->update('penugasan',$data);
    }


	public function getdelete($key,$key3)
	{
		$this->db->where('ktp',$key);
        $this->db->where('id_stasiun',$key3);
		$this->db->delete('penugasan');
	}


	public function tampildata() //alternatif
	{
	
        $this->db->select('*');
        $this->db->from('penugasan');
        $this->db->join('petugas', 'petugas.ktp = penugasan.ktp');
        $this->db->join('person', 'person.ktp = petugas.ktp');
        $this->db->join('stasiun', 'stasiun.id_stasiun = penugasan.id_stasiun');
        $query = $this->db->get();

        return $query;
	}

    public function check($key,$usern){
        $qui ="SELECT * FROM acara where id_acara = '$key'";
        
        return $this->db->query($qui);
    }

}
