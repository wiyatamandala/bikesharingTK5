<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_voucher');
		if($this->session->userdata('role') != 'Admin'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index()
	{
		

		$isi['content'] 		= 'admin/voucher/v_lihatDaftarVoucher';
		$isi['judul'] 			= 'Voucher';
		$isi['sub_judul'] 		= 'Daftar Voucher';
		$isi['sub_sub_judul'] 	= '';

		if($this->uri->segment(4)=="delete_success"){
            $isi['message']='<div class="alert alert-success fade in">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									Data sukses dihapus
							</div>';
		}
        else if($this->uri->segment(4)=="simpan_success"){
            $isi['message']='<div class="alert alert-success fade in">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									Data sukses disimpan
							</div>';
        }

        else{
            $isi['message']='';
        }
           	
       	$isi['data']		= $this->m_voucher->tampildata();
		$this->load->view('admin/v_homeAdmin',$isi);
    }



	public function tambah()
	{
		$isi['content'] 		= 'admin/voucher/v_tambahVoucher';
		$isi['judul'] 			= 'Voucher';
		$isi['sub_judul'] 		= 'Tambah Voucher';
		$isi['sub_sub_judul'] 	= '';
		
		$isi['id_voucher']			= '';
		$isi['nama']				= '';
		$isi['ketegori']			= '';
		$isi['nilai_poin']			= '';
		$isi['deskripsi']			= '';
		$isi['no_kartu_anggota']	= '';
		$isi['auto_id']				= $this->m_voucher->auto_id();

		
		$this->load->view('admin/v_homeAdmin',$isi);

		
		$this->load->view('admin/v_homeAdmin',$isi);
	}


	public function simpan()
	{      
		
			$data['id_voucher']				= $this->input->post('auto_id');
			$data['nama']					= $this->input->post('nama');
			$data['kategori']				= $this->input->post('kategori');
			$data['nilai_poin']				= $this->input->post('nilai_poin');
			$data['deskripsi']				= $this->input->post('deskripsi');
								
			$this->m_voucher->getinsert($data);

			redirect('admin/voucher/index/simpan_success');
			
			
	}

	public function edit()
	{
		$isi['content'] 		= 'admin/voucher/v_editVoucher';
		$isi['judul'] 			= 'Voucher';
		$isi['sub_judul'] 		= 'Daftar Voucher';
		$isi['sub_sub_judul'] 	= 'Edit Data Voucher';
		
		$key = $this->uri->segment(4);
		$query = $this->db->get('voucher');
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$isi['auto_id']			= $row->id_voucher;
				$isi['nama']			= $row->nama;
				$isi['kategori']		= $row->kategori;
				$isi['nilai_poin']		= $row->nilai_poin;
				$isi['deskripsi']		= $row->deskripsi;

			}
		}
		else
		{
				$isi['auto_id']			= '';
				$isi['nama']			= '';
				$isi['kategori']		= '';
				$isi['nilai_poin']		= '';
				$isi['deskripsi']		= '';
		}


		$this->load->view('admin/v_homeAdmin',$isi);
	}

	public function update()
	{
		$key = $this->input->post('auto_id');
		$data['id_voucher']				= $this->input->post('auto_id');
		$data['nama']					= $this->input->post('nama');
		$data['kategori']				= $this->input->post('kategori');
		$data['nilai_poin']				= $this->input->post('nilai_poin');
		$data['deskripsi']				= $this->input->post('deskripsi');
		
		$this->m_voucher->getupdate($key,$data);
		
		redirect('admin/voucher/index/update_success');	
	}

	public function delete()
	{
		$key = $this->uri->segment(4);
		$this->db->where('id_voucher',$key);
		$query = $this->db->get('voucher');
		if($query->num_rows()>0)
		{
			$this->m_voucher->getdelete($key);
		}
		redirect('admin/voucher/index/delete_success');
	}


}

