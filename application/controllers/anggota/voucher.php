<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_voucher');
		if($this->session->userdata('role') != 'Anggota'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index()
	{
		

		$isi['content'] 		= 'anggota/v_lihatDaftarVoucher';
		$isi['judul'] 			= 'Daftar Voucher';
		$isi['sub_judul'] 		= '';
		$isi['sub_sub_judul'] 	= '';

		if($this->uri->segment(4)=="simpan_success"){
            $isi['message']='<div class="alert alert-success fade in">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									Voucher Sukses Diclaim
							</div>';
        }
        else{
            $isi['message']='';
        }
           	
       	$isi['data']		= $this->m_voucher->tampildata();
		$this->load->view('anggota/v_homeAnggota',$isi);
    }


    public function edit()
	{
		$isi['content'] 		= 'anggota/v_claimVoucher';
		$isi['judul'] 			= 'Voucher';
		$isi['sub_judul'] 		= 'Daftar Voucher';
		$isi['sub_sub_judul'] 	= 'Claim Voucher';
		
		$key = $this->uri->segment(4);
		$key = $this->session->userdata('ktp');
		$this->db->select('*');
		$this->db->from('voucher');
		$this->db->join('anggota','anggota.no_kartu = voucher.no_kartu_anggota');
		$this->db->where('ktp',$key);
		$query = $this->db->get();
		
			foreach($query->result() as $row)
			{
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$isi['auto_id']				= $row->id_voucher;
				$isi['nama']				= $row->nama;
				$isi['kategori']			= $row->kategori;
				$isi['nilai_poin']			= $row->nilai_poin;
				$isi['deskripsi']			= $row->deskripsi;
				$isi['no_kartu_anggota']	= $row->no_kartu;

			}
		}
		else
		{
				$isi['auto_id']				= '';
				$isi['nama']				= '';
				$isi['kategori']			= '';
				$isi['nilai_poin']			= '';
				$isi['deskripsi']			= '';
				$isi['no_kartu_anggota']	= '';
		}

	}


		$this->load->view('anggota/v_homeAnggota',$isi);
	}

	public function update()
	{
		$key = $this->input->post('auto_id');
		$data['id_voucher']				= $this->input->post('auto_id');
		$data['nama']					= $this->input->post('nama');
		$data['kategori']				= $this->input->post('kategori');
		$data['nilai_poin']				= $this->input->post('nilai_poin');
		$data['deskripsi']				= $this->input->post('deskripsi');
		$data['no_kartu_anggota']		= $this->input->post('no_kartu_anggota');
		
		$this->m_voucher->getupdate($key,$data);
		
		redirect('anggota/voucher/index/update_success');	
	}


}

