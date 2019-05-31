<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_saldo extends CI_Model {


	public function tampildata()
    {
        $this->db->select('*');
        $this->db->from('anggota');
        $this->db->where('ktp',$this->session->userdata('ktp'));
        $query = $this->db->get();

        return $query;
    }
}