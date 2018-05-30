<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_database extends CI_Model {

	// tambah data

	public function tambah_data($nama_tabel, $data){
		$res = $this->db->insert($nama_tabel, $data);
		return $res;
	}

	// tampil data

	public function tampil_data($nama_tabel, $opsi = ''){

		// pakai query biasa

		$res = $this->db->query('select * from '.$nama_tabel.' '.$opsi);
		return $res->result();
	}

	public function tampil_data_where($nama_tabel, $where){
		$res = $this->db->get_where($nama_tabel, $where);
		return $res;
	}

	// hapus data

	public function hapus_data($nama_tabel, $where){
		$res = $this->db->delete($nama_tabel, $where);
		return $res;
	}

	// edit data

	public function edit_data($nama_tabel, $data, $where){
		$res = $this->db->update($nama_tabel, $data, $where);
		return $res;
	}

}
