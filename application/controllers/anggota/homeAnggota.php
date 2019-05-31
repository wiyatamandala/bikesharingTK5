<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeAnggota extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'Anggota'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

 
	public function index()
	{
		$isi['content'] 		= 'anggota/v_content';
		$isi['judul'] 			= 'Dashboard';
		$isi['sub_judul'] 		= '';
		$isi['sub_sub_judul'] 	= '';

		$this->load->model('m_sepeda');
		$isi['data']		= $this->m_sepeda->tampildata();

		$this->load->view('anggota/v_homeAnggota',$isi);
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
