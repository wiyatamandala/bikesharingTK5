<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sepeda extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_sepeda');
		if($this->session->userdata('role') != 'Anggota'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index()
	{
		

		$isi['content'] 		= 'anggota/v_lihatDaftarSepeda';
		$isi['judul'] 			= 'Daftar Sepeda';
		$isi['sub_judul'] 		= '';
		$isi['sub_sub_judul'] 	= '';

		if($this->uri->segment(4)=="update_success"){
            $isi['message']='<div class="alert alert-success fade in">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									Data sukses diupdate
							</div>';
        }
        else{
            $isi['message']='';
        }
           	
       	$isi['data']		= $this->m_sepeda->tampildata();
		$this->load->view('anggota/v_homeAnggota',$isi);
    }

    public function pinjam()
	{
		$isi['content'] 		= 'anggota/v_pinjamSepeda';
		$isi['judul'] 			= 'Peminjaman';
		$isi['sub_judul'] 		= 'Buat Peminjaman';
		$isi['sub_sub_judul'] 	= '';

		$this->load->model('m_peminjaman');
		// $uri4=$this->uri->segment(4);
		$key = $this->session->userdata('ktp');
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('ktp',$key);
		$query = $this->db->get();
		
			foreach($query->result() as $row)
			{

				$isi['no_kartu_anggota']	= $row->no_kartu;
				$isi['datetime_pinjam']		= '';
				$isi['datetime_kembali']	= '';
				$isi['biaya']				= '';
				$isi['denda']				= '';
				$isi['nomor_sepeda1']		= $this->uri->segment(4);
				$isi['id_stasiun']			= '';

			}
		

		
		$this->load->view('anggota/v_homeAnggota',$isi);
	}

	public function simpan()
	{
		$kunci = $this->input->post('nomor_sepeda1');
		$this->db->select('*');
        $this->db->from('sepeda');
        $this->db->where('nomor',$kunci);
        $query = $this->db->get();
        foreach($query->result() as $row)
			{
		
			$data['no_kartu_anggota']		= $this->input->post('no_kartu_anggota');
			$data['datetime_pinjam']		= $this->input->post('datetime_pinjam');
			$data['nomor_sepeda']			= $this->input->post('nomor_sepeda1');
			$data['id_stasiun']				= $row->id_stasiun;
								
			$this->m_peminjaman->getinsert($data);
		}

			redirect('anggota/peminjaman/index/simpan_success');		
	}


}

