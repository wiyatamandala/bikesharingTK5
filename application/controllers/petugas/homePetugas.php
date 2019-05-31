<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePetugas extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'Petugas'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

 
	public function index()
	{
		$isi['content'] 		= 'petugas/v_content';
		$isi['judul'] 			= 'Dashboard';
		$isi['sub_judul'] 		= '';
		$isi['sub_sub_judul'] 	= '';

		$this->load->model('m_petugas');
		$isi['data']		= $this->m_petugas->tampildata();

		$this->load->view('petugas/v_homePetugas',$isi);
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
