<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saldo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_saldo');
		if($this->session->userdata('role') != 'Anggota'){
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index()
	{

		$isi['content'] 		= 'anggota/v_lihatSaldo';
		$isi['judul'] 			= 'Info Saldo';
		$isi['sub_judul'] 		= '';
		$isi['sub_sub_judul'] 	= '';

           	
       	$isi['data']		= $this->m_saldo->tampildata();
		$this->load->view('anggota/v_homeAnggota',$isi);
    }
}