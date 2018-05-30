<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	// index

	public function index(){
		$this->bukan_waktu_daftar_besukan();
	}

	public function bukan_waktu_daftar_besukan(){
		$this->load->view('layout/default', array(
			'judul' => 'Bukan Waktu Daftar Besukan',
			'isi' => 'bukan_waktu_daftar_besukan',
			'isi_parameter' => ''
		));
	}

}
