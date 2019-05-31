<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_petugas');
		if($this->session->userdata('role') != 'Admin'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index()
	{
		

		$isi['content'] 		= 'admin/petugas/v_lihatDaftarPenugasan';
		$isi['judul'] 			= 'Petugas';
		$isi['sub_judul'] 		= 'Daftar Penugasan';
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
           	
       	$isi['data']		= $this->m_petugas->tampildata();
		$this->load->view('admin/v_homeAdmin',$isi);
    }


	public function tambah()
	{
		$isi['content'] 		= 'admin/petugas/v_tambahPenugasan';
		$isi['judul'] 			= 'Petugas';
		$isi['sub_judul'] 		= 'Tambah Penugasan';
		$isi['sub_sub_judul'] 	= '';
		$isi['id_stasiun1'] 	= $this->m_petugas->getStasiun();
		$isi['id_petugas1'] 	= $this->m_petugas->getPetugas();
		
		$this->load->view('admin/v_homeAdmin',$isi);
	}

	public function simpan()
	{      
			//$ruang=$this->input->post('id_stasiun1');
		
			$data['ktp']			= $this->input->post('id_petugas1');
			$data['start_datetime']	= $this->input->post('start_datetime');
			$data['end_datetime']	= $this->input->post('end_datetime');
			$data['id_stasiun']		= $this->input->post('id_stasiun1');
								
			$this->m_petugas->getinsert($data);

			redirect('admin/petugas/index/simpan_success');

			
	}

	public function edit()
	{
		$isi['content'] 		= 'admin/petugas/v_editPenugasan';
		$isi['judul'] 			= 'Petugas';
		$isi['sub_judul'] 		= 'Daftar Penugasan';
		$isi['sub_sub_judul'] 	= 'Edit Penugasan';
		// $isi['id_stasiun1'] 	= $this->m_petugas->getStasiun();
		// $isi['id_petugas1'] 	= $this->m_petugas->getPetugas();
		
		$key = $this->uri->segment(4);
		$key2 = $this->uri->segment(5);
		$key3 = $this->uri->segment(6);
		$ss = rawurldecode($key2);
		$this->db->where('ktp',$key);
		$this->db->where('start_datetime',$ss);
		$this->db->where('id_stasiun',$key3);
		$query = $this->db->get('penugasan');
		
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$isi['id_petugas1']	= $row->ktp;
				$isi['start_datetime']	= $row->start_datetime;
				$isi['end_datetime']	= $row->end_datetime;
				$isi['id_stasiun1']	= $row->id_stasiun;
			}
		}
		else
		{
				$isi['id_petugas1']		= '';
				$isi['start_datetime']	= '';
				$isi['end_datetime']	= '';
				$isi['id_stasiun1']		= '';
		}

		$this->load->view('admin/v_homeAdmin',$isi);
	}


	public function update()
	{
		$key = $this->input->post('id_petugas1');
		$key2 = $this->input->post('start_datetime');
		$key3 = $this->input->post('id_stasiun1');

		$data['ktp']			= $this->input->post('id_petugas1');
		$data['start_datetime']	= $this->input->post('start_datetime');
		$data['end_datetime']	= $this->input->post('end_datetime');
		$data['id_stasiun']		= $this->input->post('id_stasiun1');          

		$this->m_petugas->getupdate($key,$key2,$key3,$data);
		
		redirect('admin/petugas/index/update_success');	
	}

	public function delete()
	{
		$key = $this->uri->segment(4);
		// $key2 = $this->uri->segment(5);
		$key3 = $this->uri->segment(6);
		// $ss = rawurldecode($key2);
		$this->db->where('ktp',$key);
		// $this->db->where('start_datetime',$ss);
		$this->db->where('id_stasiun',$key3);
		$query = $this->db->get('penugasan');
		if($query->num_rows()>0)
		{
			$this->m_petugas->getdelete($key,$key3);
		}
		redirect('admin/petugas/index/delete_success');
	}


}

