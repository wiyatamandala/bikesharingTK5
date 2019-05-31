<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sepeda extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_sepeda');
		if($this->session->userdata('role') != 'Admin'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index()
	{
		

		$isi['content'] 		= 'admin/sepeda/v_lihatDaftarSepeda';
		$isi['judul'] 			= 'Sepeda';
		$isi['sub_judul'] 		= 'Daftar Sepeda';
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
        else if($this->uri->segment(4)=="update_success"){
            $isi['message']='<div class="alert alert-success fade in">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									Data sukses diupdate
							</div>';
        }
        else{
            $isi['message']='';
        }
           	
       	$isi['data']		= $this->m_sepeda->tampildata();
		$this->load->view('admin/v_homeAdmin',$isi);
    }



	public function tambah()
	{
		$isi['content'] 		= 'admin/sepeda/v_tambahSepeda';
		$isi['judul'] 			= 'Sepeda';
		$isi['sub_judul'] 		= 'Tambah Sepeda';
		$isi['sub_sub_judul'] 	= '';

		$isi['nomor']				= '';
		$isi['merk']				= '';
		$isi['jenis']				= '';
		$isi['status']				= '';
		$isi['id_stasiun']			= '';
		$isi['no_kartu_penyumbang']	= '';
		$isi['auto_id']				= $this->m_sepeda->auto_id();
		$isi['id_stasiun1'] 		= $this->m_sepeda->getStasiun();
		$isi['id_penyumbang1']		= $this->m_sepeda->getPenyumbang();

		
		$this->load->view('admin/v_homeAdmin',$isi);
	}


	public function simpan()
	{      
		
			$data['nomor']					= $this->input->post('auto_id');
			$data['merk']					= $this->input->post('merk');
			$data['jenis']					= $this->input->post('jenis');
			$data['status']					= $this->input->post('status');
			$data['id_stasiun']				= $this->input->post('id_stasiun1');
			$data['no_kartu_penyumbang']	= $this->input->post('id_penyumbang1');
								
			$this->m_sepeda->getinsert($data);

			redirect('admin/sepeda/index/simpan_success');
			
			
	}

	public function edit()
	{
		$isi['content'] 		= 'admin/sepeda/v_editSepeda';
		$isi['judul'] 			= 'Sepeda';
		$isi['sub_judul'] 		= 'Daftar Sepeda';
		$isi['sub_sub_judul'] 	= 'Edit Data Sepeda';

		$isi['id_stasiun1'] 	= $this->m_sepeda->getStasiun();
		$isi['id_penyumbang1'] 	= $this->m_sepeda->getPenyumbang();
		
		$key = $this->uri->segment(4);
		$this->db->select('*');
		$this->db->from('sepeda');
		$this->db->join('stasiun', 'stasiun.id_stasiun = sepeda.id_stasiun');
		$this->db->where('nomor',$key);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$isi['auto_id']			= $row->nomor;
				$isi['merk']			= $row->merk;
				$isi['jenis']			= $row->jenis;
				$isi['status']			= $row->status;
				$isi['id_stasiun2']		= $row->id_stasiun;
				$isi['id_penyumbang2']	= $row->no_kartu_penyumbang;
				$isi['namaStasiun']		= $row->nama;

			}
		}
		else
		{
				$isi['auto_id']			= '';
				$isi['merk']			= '';
				$isi['jenis']			= '';
				$isi['status']			= '';
				$isi['id_stasiun2']		= '';
				$isi['id_penyumbang2']	= '';
				$isi['namaStasiun']		= '';
		}


		$this->load->view('admin/v_homeAdmin',$isi);
	}

	public function update()
	{
		$key = $this->input->post('auto_id');
		$data['nomor']					= $this->input->post('auto_id');
		$data['merk']					= $this->input->post('merk');
		$data['jenis']					= $this->input->post('jenis');
		$data['status']					= $this->input->post('status');
		$data['id_stasiun']				= $this->input->post('id_stasiun2');
		$data['no_kartu_penyumbang']	= $this->input->post('id_penyumbang2');
		
		$this->m_sepeda->getupdate($key,$data);
		
		redirect('admin/sepeda/index/update_success');	
	}

	public function delete()
	{
		$key = $this->uri->segment(4);
		$this->db->where('nomor',$key);
		$query = $this->db->get('sepeda');
		if($query->num_rows()>0)
		{
			$this->m_sepeda->getdelete($key);
		}
		redirect('admin/sepeda/index/delete_success');
	}


}

