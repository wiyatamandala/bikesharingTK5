<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_peminjaman');
		if($this->session->userdata('role') != 'Anggota'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index()
	{

		$isi['content'] 		= 'anggota/peminjaman/v_lihatDaftarPeminjaman';
		$isi['judul'] 			= 'Peminjaman';
		$isi['sub_judul'] 		= 'Daftar Peminjaman';
		$isi['sub_sub_judul'] 	= '';

        if($this->uri->segment(4)=="simpan_success"){
            $isi['message']='<div class="alert alert-success fade in">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									Peminjaman sukses disimpan
							</div>';
        }
        else if($this->uri->segment(4)=="update_success"){
            $isi['message']='<div class="alert alert-success fade in">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									Sepeda Telah Dikembalikan
							</div>';
        }
        else{
            $isi['message']='';
        }
        
       	$isi['data']		= $this->m_peminjaman->tampildataAnggota();
		$this->load->view('anggota/v_homeAnggota',$isi);
    }



	public function tambah()
	{
		$isi['content'] 		= 'anggota/peminjaman/v_tambahPeminjaman';
		$isi['judul'] 			= 'Peminjaman';
		$isi['sub_judul'] 		= 'Buat Peminjaman';
		$isi['sub_sub_judul'] 	= '';

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
				$isi['nomor_sepeda1']		= $this->m_peminjaman->getSepeda();
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


	public function kembali()
	{
		$isi['content'] 		= 'anggota/peminjaman/v_konfirmasiPengembalian';
		$isi['judul'] 			= 'Peminjaman';
		$isi['sub_judul'] 		= 'Konfirmasi Pengembalian';
		$isi['sub_sub_judul'] 	= '';
		
		$key = $this->uri->segment(4);
		$key2 = $this->uri->segment(5);
		$ss = rawurldecode($key2);

		$this->db->where('no_kartu_anggota',$key);
		$this->db->where('datetime_pinjam',$ss);
		$query = $this->db->get('peminjaman');
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$isi['no_kartu_anggota']		= $row->no_kartu_anggota;
				$isi['datetime_pinjam']			= $row->datetime_pinjam;
				$isi['nomor_sepeda1']			= $row->nomor_sepeda;
				$isi['id_stasiun']				= $row->id_stasiun;
				$isi['datetime_kembali']		= $row->datetime_kembali;
				

			}
		}
		else
		{
				$isi['no_kartu_anggota']		= '';
				$isi['datetime_pinjam']			= '';
				$isi['nomor_sepeda1']			= '';
				$isi['id_stasiun']				= '';
				$isi['datetime_kembali']		= '';
		}


		$this->load->view('anggota/v_homeAnggota',$isi);
	}


	public function kembalikan()
	{
		$key 	= $this->input->post('no_kartu_anggota');
		$key2 	= $this->input->post('datetime_pinjam');

		$data['no_kartu_anggota']		= $this->input->post('no_kartu_anggota');
		$data['datetime_pinjam']		= $this->input->post('datetime_pinjam');
		$data['nomor_sepeda']			= $this->input->post('nomor_sepeda1');
		$data['id_stasiun']				= $this->input->post('id_stasiun');
		$data['datetime_kembali']		= $this->input->post('datetime_kembali');
		
		$this->m_peminjaman->getupdate($key,$key2,$data);
		
		redirect('anggota/peminjaman/index/update_success');	
	}


}

