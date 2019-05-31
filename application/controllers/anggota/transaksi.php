<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_transaksi');
		if($this->session->userdata('role') != 'Anggota'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index()
	{

		$isi['content'] 		= 'anggota/transaksi/v_lihatDaftarTransaksi';
		$isi['judul'] 			= 'Transaksi';
		$isi['sub_judul'] 		= 'Riwayat Transaksi';
		$isi['sub_sub_judul'] 	= '';

        if($this->uri->segment(4)=="simpan_success"){
            $isi['message']='<div class="alert alert-success fade in">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									Data sukses disimpan
							</div>';
        }
        else{
            $isi['message']='';
        }
           	
       	$isi['data']		= $this->m_transaksi->tampildataAnggota();
		$this->load->view('anggota/v_homeAnggota',$isi);
    }



	public function tambah()
	{
		$isi['content'] 		= 'anggota/transaksi/v_tambahTransaksi';
		$isi['judul'] 			= 'Transaksi';
		$isi['sub_judul'] 		= 'TopUp Sharebike Pay';
		$isi['sub_sub_judul'] 	= '';

		$key = $this->session->userdata('ktp');
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('anggota','anggota.no_kartu = transaksi.no_kartu_anggota');
		$this->db->where('ktp',$key);
		$query = $this->db->get();
		
			foreach($query->result() as $row)
			{

				$isi['no_kartu_anggota']	= $row->no_kartu;
				$isi['date_time']			= '';
				$isi['jenis']				= '';
				$isi['nominal']				= '';

			}
		
		$this->load->view('anggota/v_homeAnggota',$isi);
	}


	public function simpan()
	{      
		
			$data['no_kartu_anggota']		= $this->input->post('no_kartu_anggota');
			$data['date_time']				= $this->input->post('date_time');
			$data['jenis']					= $this->input->post('jenis');
			$data['nominal']				= $this->input->post('nominal');
								
			$this->m_transaksi->getinsert($data);

			redirect('anggota/transaksi/index/simpan_success');
			
			
	}


}

