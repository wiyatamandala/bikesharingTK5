<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

	public function tampildata()
    {
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->join('peminjaman','peminjaman.no_kartu_anggota = laporan.no_kartu_anggota', 'peminjaman.datetime_pinjam = laporan.datetime_pinjam','peminjaman.nomor_sepeda = laporan.nomor_sepeda','peminjaman.id_stasiun = laporan.id_stasiun');
        $query = $this->db->get();

        return $query;
    }

}


