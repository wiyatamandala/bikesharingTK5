<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeAdmin extends CI_Controller {

 	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'Admin'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$isi['content'] 		= 'admin/v_content';
		$isi['judul'] 			= 'Dashboard';
		$isi['sub_judul'] 		= '';
		$isi['sub_sub_judul'] 	= '';

		$this->load->model('m_peminjaman');
		$isi['data']		= $this->m_peminjaman->tampildata();
		
		$this->load->view('admin/v_homeAdmin',$isi);
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
