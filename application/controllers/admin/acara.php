<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acara extends CI_Controller {

 	function __construct(){
		parent::__construct();
		$this->load->model('m_acara');
		if($this->session->userdata('role') != 'Admin'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{

		$isi['content'] 		= 'admin/acara/v_lihatDaftarAcara';
		$isi['judul'] 			= 'Acara';
		$isi['sub_judul'] 		= 'Daftar Acara';
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
           	
        $isi['data']		= $this->m_acara->tampildata();
		$this->load->view('admin/v_homeAdmin',$isi);
    }



	public function tambah()
	{
		$isi['content'] 		= 'admin/acara/v_tambahAcara';
		$isi['judul'] 			= 'Acara';
		$isi['sub_judul'] 		= 'Tambah Acara';
		$isi['sub_sub_judul'] 	= '';
		$isi['auto_id']			= $this->m_acara->auto_id();
		$isi['id_stasiun1'] 	= $this->m_acara->getStasiun();
		
		$this->load->view('admin/v_homeAdmin',$isi);
	}

	public function simpan()
	{      
			//$ruang=$this->input->post('id_stasiun1');
		
			$data['id_acara']		= $this->input->post('auto_id');
			$data['judul']			= $this->input->post('judul');
			$data['deskripsi']		= $this->input->post('deskripsi');
			$data['tgl_mulai']		= $this->input->post('tanggalMulai');
			$data['tgl_akhir']		= $this->input->post('tanggalSelesai');
			$data['is_free']		= $this->input->post('is_free');
			$data2['id_acara']		= $this->input->post('auto_id');
			$data2['id_stasiun']	= $this->input->post('id_stasiun1');
								
			$this->m_acara->getinsert($data,$data2);

			redirect('admin/acara/index/simpan_success');

			
	}


	public function edit()
	{
		$isi['content'] 		= 'admin/acara/v_editAcara';
		$isi['judul'] 			= 'Acara';
		$isi['sub_judul'] 		= 'Daftar Acara';
		$isi['sub_sub_judul'] 	= 'Edit Acara';
		$isi['id_stasiun1'] 	= $this->m_acara->getStasiun();
		
		$key = $this->uri->segment(4);
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->join('acara_stasiun', 'acara_stasiun.id_acara = acara.id_acara');
		$this->db->join('stasiun', 'stasiun.id_stasiun = acara_stasiun.id_stasiun');
		$this->db->where('acara.id_acara',$key);
		$query = $this->db->get();
		
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$isi['auto_id']			= $row->id_acara;
				$isi['title']			= $row->judul;
				$isi['deskripsi']		= $row->deskripsi;
				$isi['tanggalMulai']	= $row->tgl_mulai;
				$isi['tanggalSelesai']	= $row->tgl_akhir;
				$isi['is_free']			= $row->is_free;
				$isi['id_stasiun2']		= $row->id_stasiun;
				$isi['namaStasiun']		= $row->nama;
			}
		}
		else
		{
				$isi['auto_id']			= '';
				$isi['judul']			= '';
				$isi['deskripsi']		= '';
				$isi['tanggalMulai']	= '';
				$isi['tanggalSelesai']	= '';
				$isi['is_free']			= '';
				$isi['jabatan']			= '';
				$isi['id_stasiun2']		= '';
				$isi['namaStasiun']		= '';
		}

		$this->load->view('admin/v_homeAdmin',$isi);
	}


	public function update()
	{
		$key = $this->input->post('auto_id');
		$key2 = $this->input->post('auto_id');
		$key3 = $this->input->post('id_stasiun2');
		
		$data['id_acara']		= $this->input->post('auto_id');
		$data['judul']			= $this->input->post('title');
		$data['deskripsi']		= $this->input->post('deskripsi');
		$data['tgl_mulai']		= $this->input->post('tanggalMulai');
		$data['tgl_akhir']		= $this->input->post('tanggalSelesai');
		$data['is_free']		= $this->input->post('is_free');         

		$this->m_acara->getupdate($key,$data);
		
		redirect('admin/acara/index/update_success');	
	}

	public function delete()
	{
		$key = $this->uri->segment(4);
		$this->db->where('id_acara',$key);
		$query = $this->db->get('acara');
		if($query->num_rows()>0)
		{
			$this->m_acara->getdelete($key);
		}
		redirect('admin/acara/index/delete_success');
	}


}