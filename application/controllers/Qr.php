<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr extends CI_Controller {

	// main login
	// sengaja dikasih login supaya yang bisa pakai cuma admin

	public function __construct(){
		parent::__construct();
		$this->load->library('Session/session');
		if (strtolower($this->session->userdata('username')) != 'admin'){
			redirect(base_url().'index.php/login');
		}
		function tampil($judul, $isi, $parameter){

			// https://stackoverflow.com/questions/27384117/codeigniter-using-this-when-not-in-object-context-in-function

			$ci =& get_instance();

			$ci->load->view('layout/default', array(
				'judul' => $judul,
				'isi' => 'qr code/'.$isi,
				'isi_parameter' => array(
					'data' => $parameter
				)
			));	
		}
		function tampil_polos($judul, $isi, $parameter){
			$ci =& get_instance();
			$ci->load->view('layout/polos', array(
				'judul' => $judul,
				'isi' => 'qr code/'.$isi,
				'isi_parameter' => $parameter
			));
		}
	}

	public function index(){
		$this->b();
	}

	// function a untuk acc qr code booking

	public function a($username = ''){

		// jika verifikasi 'tidak', jalankan skrip di bawah

		$ambil_data = $this->db->get_where('user', array(
			'username' => $username
		))->result();
		$status_verifikasi = $ambil_data[0]->verifikasi;

		if ($status_verifikasi == 'tidak'){

			$data_tertinggi = $this->user_database->tampil_data('user', 'order by nomor_antrian desc');
			$nomor_antrian_tertinggi = $data_tertinggi[0]->nomor_antrian;
			$nomor_antrian = $nomor_antrian_tertinggi + 1;

			// main qr code (=> booking)

			$config['imagedir']     = './gambar/cache/'; //direktori penyimpanan qr code
			$this->ciqrcode->initialize($config);

			$nama_qrcode = $username.'_antrian.png'; //buat name dari qr code sesuai dengan username

			$params['data'] = base_url().'index.php/qr/b/'.$nomor_antrian; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH.$config['imagedir'].$nama_qrcode; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

			// update data

			$this->db->update('user', array(
				'verifikasi' => 'iya',
				'qrcode' => $nama_qrcode,
				'nomor_antrian' => $nomor_antrian
			), array(
				'username' => $username
			));

			// reload punya user

			$this->db->update('user', array(
				'verifikasi_reload' => 'mulai'
			), array(
				'username' => $username
			));
			// echo 'QR Code sudah diverifikasi';
			$nomor_antrian = $ambil_data[0]->nomor_antrian;
			$qrcode = $ambil_data[0]->qrcode;
			$data = array(
				'qrcode' => $qrcode,
				'nomor_antrian' => $nomor_antrian
			)
			tampil_polos('Print QR Code', 'print qr code', $data);
		} else {
			echo 'QR Code sudah diverifikasi';
		}
	}

	// function b untuk cek qr code nomor antrian

	public function b($id = 0){

		// antrian sekarang

		$data = $this->user_database->tampil_data('antrian');
		$sekarang = $data[0]->nomor_antrian;
		$antrian_baru = $sekarang + 1;
		$ubah = array(
			'nomor_antrian' => $antrian_baru
		);
		$where = array(
			'id_antrian' => '1'
		);

		// cek nomor antrian apakah sesuai dengan urutan seharusnya

		if ($id == $sekarang){
			$this->user_database->edit_data('antrian', $ubah, $where);
			$this->load->view('qr_sesuai');

			// qrcode booking => qrcode antrian

		} else {
			$this->load->view('qr_tidak_sesuai');
		}
	}

}
