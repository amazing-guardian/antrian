<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct(){
		parent::__construct();
		function tampil($judul, $isi){

			// https://stackoverflow.com/questions/27384117/codeigniter-using-this-when-not-in-object-context-in-function

			$ci =& get_instance();

			$ci->load->view('layout/default', array(
				'judul' => $judul,
				'isi' => 'berita/'.$isi,
				'isi_parameter' => ''
			));	
		}
	}

	public function index(){
		$this->tidak_boleh_dibawa();
	}

	public function tidak_boleh_dibawa(){
		tampil('Barang-barang yang Tidak Boleh Dibawa', 'tidak_boleh_dibawa');
	}

	public function alur_besukan_online(){
		tampil('Alur Besukan Online', 'alur_besukan_online');
	}

	public function alur_besukan_offline(){
		tampil('Alur Besukan Offline (Pakai Kartu)', 'alur_besukan_offline');
	}

}
