<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	// index

	public function index(){
		$this->upload_gambar();
	}

	// upload gambar

	public function upload_gambar(){
		$this->load->view('upload_gambar');
	}

	public function upload_gambar_do(){
		$config['upload_path'] = './gambar/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')){
			echo $this->upload->display_errors();
		} else {

			// print nama gambar

			echo $this->upload->data()['file_name'];
		}
	}

	// hapus semua gambar

	public function hapus_semua_gambar(){
		delete_files('./gambar/', TRUE);
	}

}
