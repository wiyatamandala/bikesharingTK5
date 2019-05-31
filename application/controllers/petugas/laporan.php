<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_laporan');
		if($this->session->userdata('role') != 'Petugas'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		

		$isi['content'] 		= 'petugas/v_lihatDaftarLaporan';
		$isi['judul'] 			= 'Daftar Laporan';
		$isi['sub_judul'] 		= '';
		$isi['sub_sub_judul'] 	= '';
 	
    	$isi['data']		= $this->m_laporan->tampildata();   
		$this->load->view('petugas/v_homePetugas',$isi);
    }



}

