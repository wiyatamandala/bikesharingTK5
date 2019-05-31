<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('m_login');
		if($this->session->userdata('role') =="Admin")
        {
            redirect('admin/homeAdmin');
        }
		else if($this->session->userdata('role') =="Anggota")
        {
            redirect('anggota/homeAnggota');
        }
		else if($this->session->userdata('role') =="Petugas")
        {
            redirect('petugas/homePetugas');
        }
		
	}

	function index()
	{
		$isi['status'] 		= 'login';
		$this->load->view('v_login', $isi);
	}


	function proses(){

			if($this->input->post('submit')){
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('nomorKTP', 'Nomor KTP', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('v_login');
				}
				else {
					$data = array(
					'email' => $this->input->post('email'),
					'nomorKTP' => $this->input->post('nomorKTP')
					);
					$result = $this->m_login->login($data);
					if ($result == TRUE) {
						$admin_data = array(
							'role' => $result['role'],
						 	'name' => $result['nama'],
						 	'ktp' => $result['ktp'],
						 	'email' => $result['email'],
						 	'alamat' => $result['alamat'],
						 	'tgl_lahir' => $result['tgl_lahir'],
						 	'no_telp' => $result['no_telp']
						);
						$this->session->set_userdata($admin_data);
						if($this->session->userdata('role') == "Admin")
						{
							redirect('admin/homeAdmin');
						}
						else if($this->session->userdata('role') == "Anggota"){
							redirect('anggota/homeAnggota');
						}
						else if($this->session->userdata('role') == "Petugas"){
							redirect('petugas/homePetugas');
						}
					}
					else{
						$this->session->set_flashdata('info', '<font size="1" color="red">*maaf kombinasi No. KTP dan Email salah</font>');
						redirect('login');
					}
				}
			}
			else{
				$this->load->view('v_login');
			}
		}

		function halRegister()
		{
			$isi['status'] 		= 'register';
			$this->load->view('v_login', $isi);
		}


		function register(){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('role', 'Role', 'trim|required');
				$this->form_validation->set_rules('nomorKTP', 'Nomor KTP', 'trim|required');
				$this->form_validation->set_rules('namaLengkap', 'Nama Lengkap', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('tglLahir', 'Tanggal Lahir', 'trim|required');
				$this->form_validation->set_rules('nomorTelepon', 'Nomor Telepon', 'trim');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim');

				if ($this->form_validation->run() == FALSE) {
					$isi['status'] 		= 'register'; //tambahan
					$this->load->view('v_login', $isi); //tambahan
				}
				else {
					$data = array(
					'role' => $this->input->post('role'),
					'nomorKTP' => $this->input->post('nomorKTP'),
					'namaLengkap' => $this->input->post('namaLengkap'),
					'email' => $this->input->post('email'),
					'tglLahir' => date('Y-m-d',strtotime($this->input->post('tglLahir'))),
					'nomorTelepon' => $this->input->post('nomorTelepon'),
					'alamat' => $this->input->post('alamat')
					);

					$result = $this->m_login->checkKTP($data);
					if ($result == TRUE) {
						$result = $this->m_login->checkEmail($data);
						if ($result == TRUE) {
							$this->session->set_flashdata('info', '<font size="1" color="red">*maaf Email sudah digunakan</font>');
							redirect('login/halRegister');
						}
						else{
							$this->session->set_flashdata('info', '<font size="1" color="red">*maaf No. KTP sudah digunakan</font>');
							redirect('login/halRegister');
						}
					}


					else {
						$result = $this->m_login->checkEmail($data);
						if ($result == TRUE) {
							$this->session->set_flashdata('info', '<font size="1" color="red">*maaf Email sudah digunakan</font>');
							redirect('login/halRegister');
						}
						else{
						// 	//Script register di sini
							$data = $this->security->xss_clean($data);
							$result = $this->m_login->register($data);
							if ($result == TRUE) {
								$admin_data = array(
									'role' => $result['role'],
									'name' => $result['nama'],
									'ktp' => $result['ktp'],
						 			'email' => $result['email'],
						 			'alamat' => $result['alamat'],
						 			'tgl_lahir' => $result['tgl_lahir'],
						 			'no_telp' => $result['no_telp']
								);
								$this->session->set_userdata($admin_data);
								if($this->session->userdata('role') == "Anggota"){
									print "<script>alert('Pendaftaran Berhasil!') ; window.location.href = '../anggota/homeAnggota'</script>";
								}
								else if($this->session->userdata('role') == "Petugas"){
									print "<script>alert('Pendaftaran Berhasil!') ; window.location.href = '../petugas/homePetugas'</script>";
								}
							}
						}
					}
				}
			}
			else{
				$isi['status'] 		= 'register'; //tambahan
				$this->load->view('v_login', $isi); //tambahan
			}
		}
}
