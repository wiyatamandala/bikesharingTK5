<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stasiun extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_stasiun');
		if($this->session->userdata('role') != 'Admin'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		

		$isi['content'] 		= 'admin/stasiun/v_lihatDaftarStasiun';
		$isi['judul'] 			= 'Stasiun';
		$isi['sub_judul'] 		= 'Daftar Stasiun';
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
           	
       	
       	$isi['data']		= $this->m_stasiun->tampildata();
		$this->load->view('admin/v_homeAdmin',$isi);
    }



	public function tambah()
	{
		$isi['content'] 		= 'admin/stasiun/v_tambahStasiun';
		$isi['judul'] 			= 'Stasiun';
		$isi['sub_judul'] 		= 'Tambah Stasiun';
		$isi['sub_sub_judul'] 	= '';
		
		$isi['id_stasiun']		= '';
		$isi['nama']			= '';
		$isi['alamat']			= '';
		$isi['lat']				= '';
		$isi['long']			= '';
		$isi['auto_id']			= $this->m_stasiun->auto_id();

		$this->load->view('admin/v_homeAdmin',$isi);
	}


	public function simpan()
	{      
		
			$data['id_stasiun']		= $this->input->post('auto_id');
			$data['nama']			= $this->input->post('nama_stasiun');
			$data['alamat']			= $this->input->post('alamat');
			$data['lat']			= $this->input->post('lat');
			$data['long']			= $this->input->post('long');
								
			$this->m_stasiun->getinsert($data);

			redirect('admin/stasiun/index/simpan_success');
			
			
	}

	public function edit()
	{
		$isi['content'] 		= 'admin/stasiun/v_editStasiun';
		$isi['judul'] 			= 'Stasiun';
		$isi['sub_judul'] 		= 'Daftar Stasiun';
		$isi['sub_sub_judul'] 	= 'Edit Data Stasiun';
		
		$key = $this->uri->segment(4);
		$this->db->where('id_stasiun',$key);
		$query = $this->db->get('stasiun');
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$isi['auto_id']			= $row->id_stasiun;
				$isi['nama_stasiun']	= $row->nama;
				$isi['alamat']			= $row->alamat;
				$isi['lat']				= $row->lat;
				$isi['long']			= $row->long;
			}
		}
		else
		{
				$isi['auto_id']			= '';
				$isi['nama_stasiun']	= '';
				$isi['alamat']			= '';
				$isi['lat']				= '';
				$isi['long']			= '';
		}


		$this->load->view('admin/v_homeAdmin',$isi);
	}


	public function update()
	{
		$key = $this->input->post('auto_id');
		$data['id_stasiun']		= $this->input->post('auto_id');
		$data['nama']			= $this->input->post('nama_stasiun');
		$data['alamat']			= $this->input->post('alamat');
		$data['lat']			= $this->input->post('lat');
		$data['long']			= $this->input->post('long');
		
		$this->m_stasiun->getupdate($key,$data);
		
		redirect('admin/stasiun/index/update_success');	
	}

	public function delete()
	{
		$key = $this->uri->segment(4);
		$this->db->where('id_stasiun',$key);
		$query = $this->db->get('stasiun');
		if($query->num_rows()>0)
		{
			$this->m_stasiun->getdelete($key);
		}
		redirect('admin/stasiun/index/delete_success');
	}


}

