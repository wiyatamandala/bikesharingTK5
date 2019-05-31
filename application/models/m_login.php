<?php
	class M_login extends CI_Model{

		public function login($data){
			$sql = 'SELECT * FROM person where ktp=? AND email=?';
   			$query=$this->db->query($sql, array($data['nomorKTP'], $data['email']));
			
			if($query->num_rows() > 0) {
				$sql1 = 'SELECT * FROM person a join petugas b on a.ktp = b.ktp where a.ktp=? AND email=?';
				$query1=$this->db->query($sql1, array($data['nomorKTP'], $data['email']));
				$row1 = $query1->row();

				$sql2 = 'SELECT * FROM person a join anggota b on a.ktp = b.ktp where a.ktp=? AND email=?';
				$query2=$this->db->query($sql2, array($data['nomorKTP'], $data['email']));
				$row2 = $query2->row();	
				
				//print_r($query->num_rows());
				if($query1->num_rows() > 0) {
					return $result = array(
						'nama' => $row1->nama,
						'role' => 'Petugas',
						'ktp' => $row1->ktp,
						'email' => $row1->email,
						'alamat' => $row1->alamat,
						'tgl_lahir' => $row1->tgl_lahir,
						'no_telp' => $row1->no_telp
						);
				}
				else if($query2->num_rows() > 0) {
					return $result = array(
						'nama' => $row2->nama,
						'role' => 'Anggota',
						'ktp' => $row2->ktp,
						'email' => $row2->email,
						'alamat' => $row2->alamat,
						'tgl_lahir' => $row2->tgl_lahir,
						'no_telp' => $row2->no_telp
						);
				}
				else {
					return false;
				}
			}
			else if ($data['email'] == 'admin@atw.com' && $data['nomorKTP'] == '123') {
				return $result = array(
					'nama' => 'Admin',
					'role' => 'Admin'
					);
			}
			else {
				return false;
			}
		}

		public function register($data){
			$sql = 'INSERT INTO person Values (?,?,?,?,?,?)';
			$query = $this->db->query($sql, array($data['nomorKTP'], $data['email'], $data['namaLengkap'], $data['alamat'], $data['tglLahir'], $data['nomorTelepon']));

			if($data['role'] == 'Anggota'){
				$sql = 'INSERT INTO anggota Values (?,?,?,?)';
				$query = $this->db->query($sql, array($this->getLastIDAnggota(), 0, 0, $data['nomorKTP']));
				return $result = array(
					'nama' => $data['namaLengkap'],
					'role' => 'Anggota',
					'ktp' => $data['nomorKTP'],
					'email' => $data['email'],
					'alamat' => $data['alamat'],
					'tgl_lahir' => $data['tglLahir'],
					'no_telp' => $data['nomorTelepon']
					);
			}
			if($data['role'] == 'Petugas'){
				$sql = 'INSERT INTO petugas Values (?,?)';
				$query = $this->db->query($sql, array($data['nomorKTP'], 30000));
				return $result = array(
					'nama' => $data['namaLengkap'],
					'role' => 'Petugas',
					'ktp' => $data['nomorKTP'],
					'email' => $data['email'],
					'alamat' => $data['alamat'],
					'tgl_lahir' => $data['tglLahir'],
					'no_telp' => $data['nomorTelepon']
					);
			}
			else {
				return false;
			}
		}

		public function checkKTP($data){
			$sql = 'SELECT * FROM person where ktp=?';
			$query = $this->db->query($sql, array($data['nomorKTP']));
			   
			if($query->num_rows() > 0) {
				return true;				
			}
			else {
				return false;
			}
		}

		public function checkEmail($data){
			$sql2 = 'SELECT * FROM person where email=?';
			$query2 = $this->db->query($sql2, array($data['email']));
			   
			if($query2->num_rows() > 0) {
				return true;				
			}
			else {
				return false;
			}
		}

		public function getLastIDAnggota() 
		{
			$this->db->select('SUBSTR(no_kartu, 4) as id', FALSE);
			$this->db->order_by('no_kartu', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('anggota');
			if($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->id) + 1;
			}
			else {
				$kode = 1;
			}
			$kodemax = 'KRT' . str_pad($kode, 7, 0, STR_PAD_LEFT); 
			return $kodemax;
		}
	}
?>