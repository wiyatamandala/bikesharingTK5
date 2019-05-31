<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stasiun extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_stasiun');
		if($this->session->userdata('role') != 'Anggota'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index()
	{
		

		$isi['content'] 		= 'anggota/v_lihatDaftarStasiun';
		$isi['judul'] 			= 'Daftar Stasiun';
		$isi['sub_judul'] 		= '';
		$isi['sub_sub_judul'] 	= '';   
           	
       
       	$isi['data']		= $this->m_stasiun->tampildata();
		$this->load->view('anggota/v_homeAnggota',$isi);
    }


}

