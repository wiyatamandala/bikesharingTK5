<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acara extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_acara');
		if($this->session->userdata('role') != 'Petugas'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

 
	public function index()
	{
		

		$isi['content'] 		= 'petugas/v_lihatDaftarAcara';
		$isi['judul'] 			= 'Daftar Acara';
		$isi['sub_judul'] 		= '';
		$isi['sub_sub_judul'] 	= '';
           	
       	$isi['data']		= $this->m_acara->tampildata();
		$this->load->view('petugas/v_homePetugas',$isi);
    }

}

