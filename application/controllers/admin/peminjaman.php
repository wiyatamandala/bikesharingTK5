<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_peminjaman');
		if($this->session->userdata('role') != 'Admin'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}



	public function index()
	{

		$isi['content'] 		= 'admin/v_lihatDaftarPeminjaman';
		$isi['judul'] 			= 'Daftar Peminjaman';
		$isi['sub_judul'] 		= '';
		$isi['sub_sub_judul'] 	= '';

           	
       	$isi['data']		= $this->m_peminjaman->tampildata();
		$this->load->view('admin/v_homeAdmin',$isi);
    }



}

