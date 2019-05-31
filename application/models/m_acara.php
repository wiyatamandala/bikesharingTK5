<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_acara extends CI_Model {

	public function auto_id(){
        $today = date('ymd');
        $iterasi = 1;
        $awalan = 'EV';
        $kode = $awalan.$today.(string)$iterasi;
        while(true){
            $query = $this->db->query("select id_acara from acara where id_acara='$kode'");
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

	public function getdata($key)
	{
		$this->db->where('id_acara',$key);
		$hasil = $this->db->get('acara');
		return $hasil;
	}

	public function getinsert($data,$data2)
	{

		$this->db->insert('acara',$data);
		$this->db->insert('acara_stasiun',$data2);
	}



	public function getupdate($key,$data)
    {
        $this->db->where('id_acara',$key);
        $this->db->update('acara',$data);
    }


	public function getdelete($key)
	{
		$this->db->where('id_acara',$key);
		$this->db->delete('acara');
	}

	public function tampildata() //alternatif
	{
		return $this->db->get('acara');
		return $this->db->get('acara_stasiun');
	}

    public function check($key,$usern){
        $qui ="SELECT * FROM acara where id_acara = '$key'";
        
        return $this->db->query($qui);
    }

 //    public function tampiltupple($key)
 //    {
 //        $que="SELECT * FROM acara a JOIN acara_stasiun ast ON a.id_acara = ast.id_acara where a.id_acara=$key";

 //        return $this->db->query($que);
 //    }

 //    public function tampilin($key)
 //    {
	//     $this->db->select('*');    
	// 	$this->db->from('acara');
	// 	$this->db->join('acara_stasiun', 'acara_stasiun.id_stasiun = acara.id_stasiun');
	// 	$query = $this->db->get();
	// }

}
