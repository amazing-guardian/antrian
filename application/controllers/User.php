<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// cek login

	public function __construct(){
		parent::__construct();
		$this->load->library('Session/session');
		if ($this->session->userdata('status') != 'login'){
			redirect(base_url().'index.php/login');
		}
	}

	// index

	public function index(){
		if (strtolower($this->session->userdata('username')) == 'admin'){
			redirect(base_url().'index.php/admin');
		}
		$this->tampil_antrian();
	}

	// tampil antrian

	public function tampil_antrian(){
		$data_antrian = $this->user_database->tampil_data('antrian');
		$sekarang = $data_antrian[0]->nomor_antrian;
		$username = $this->session->userdata('username');
		$data_user = $this->user_database->tampil_data_where('user', array('username' => $username))->result();
		$nomor_antrian = $data_user[0]->nomor_antrian;
		$nama_alias = $data_user[0]->nama_alias;
		$ktp_alias = $data_user[0]->ktp_alias;
		$foto_diri = $data_user[0]->foto_diri;
		$pengikut_nama = $data_user[0]->pengikut_nama;
		$pengikut_ktp = $data_user[0]->pengikut_ktp;
		$pengikut_foto_diri = $data_user[0]->pengikut_foto_diri;
		$pengikut_foto_ktp = $data_user[0]->pengikut_foto_ktp;
		$jenis_besuk = $data_user[0]->jenis_besuk;
		$qrcode = $data_user[0]->qrcode;
		$surat_besukan = $data_user[0]->surat_besukan;
		$verifikasi = $data_user[0]->verifikasi;
		if ($nomor_antrian == 0 && $verifikasi == 'iya'){
			redirect(base_url().'index.php/user/masuk_antrian');
		}
		$sisa = '';
		if ($nomor_antrian >= $sekarang){
			$sisa = (int)$nomor_antrian - (int)$sekarang;
		} else {
			$sisa = '-';
		}
		$data = array(
			'sekarang' => $sekarang,
			'nomor_antrian' => $nomor_antrian,
			'sisa' => $sisa,
			'nama_alias' => $nama_alias,
			'ktp_alias' => $ktp_alias,
			'foto_diri' => $foto_diri,
			'pengikut_nama' => $pengikut_nama,
			'pengikut_ktp' => $pengikut_ktp,
			'pengikut_foto_diri' => $pengikut_foto_diri,
			'pengikut_foto_ktp' => $pengikut_foto_ktp,
			'jenis_besuk' => $jenis_besuk,
			'qrcode' => $qrcode,
			'surat_besukan' => $surat_besukan,
			'verifikasi' => $verifikasi
		);
		// $this->load->view('tampil_antrian.php', $data);
		$this->load->view('layout/default', array(
			'judul' => 'Tampil Antrian',
			'isi' => 'tampil_antrian',
			'isi_parameter' => $data
		));
	}

	// main ajax untuk tampil antrian

	public function antrian_sekarang(){
		$data_antrian = $this->user_database->tampil_data('antrian');
		$sekarang = $data_antrian[0]->nomor_antrian;
		$data = array(
			'tertinggi' => $sekarang
		);
		$this->load->view('data_tertinggi', $data);
	}

	public function antrian_user(){
		$username = $this->session->userdata('username');
		$data_user = $this->user_database->tampil_data_where('user', array('username' => $username))->result();
		$nomor_antrian_user = $data_user[0]->nomor_antrian;
		$data = array(
			'tertinggi' => $nomor_antrian_user
		);
		$this->load->view('data_tertinggi', $data);
	}

	public function antrian_sisa(){
		$data_antrian = $this->user_database->tampil_data('antrian');
		$sekarang = $data_antrian[0]->nomor_antrian;
		$username = $this->session->userdata('username');
		$data_user = $this->user_database->tampil_data_where('user', array('username' => $username))->result();
		$nomor_antrian_user = $data_user[0]->nomor_antrian;
		$verifikasi = $data_user[0]->verifikasi;
		if ($nomor_antrian_user == 0 && $verifikasi != 'tidak'){
			echo '<script>location = \''.base_url().'index.php/user/masuk_antrian\';</script>';
		}
		$sisa = '';
		if ($nomor_antrian_user >= $sekarang){
			$sisa = (int)$nomor_antrian_user - (int)$sekarang;
		} else {
			$sisa = '-';
		}
		$data = array(
			'tertinggi' => $sisa
		);
		$this->load->view('data_tertinggi', $data);
	}

	public function reload(){
		$username = $this->session->userdata('username');
		$data_verifikasi = $this->db->get_where('user', array(
			'username' => $username
		))->result();
		$verifikasi_reload = $data_verifikasi[0]->verifikasi_reload;
		if ($verifikasi_reload == 'mulai'){
			echo '<script>location.reload();</script>';
			$this->db->update('user', array(
				'verifikasi_reload' => ''
			), array(
				'username' => $username
			));
		}
	}

	// masuk antrian

	public function masuk_antrian(){
		$username = $this->session->userdata('username');
		$data_user = $this->user_database->tampil_data_where('user', array('username' => $username))->result();
		$nomor_antrian = $data_user[0]->nomor_antrian;
		if ($nomor_antrian != 0){
			redirect(base_url().'index.php/user/tampil_antrian');
		}
		$data_tertinggi = $this->user_database->tampil_data('user', 'order by nomor_antrian desc');
		$nomor_antrian_tertinggi = $data_tertinggi[0]->nomor_antrian;
		$sisa_nomor_antrian = 160 - $nomor_antrian_tertinggi;
		$data = array(
			'nomor_antrian_tertinggi' => $nomor_antrian_tertinggi,
			'sisa_nomor_antrian' => $sisa_nomor_antrian
		);
		// $this->load->view('masuk_antrian', $data);
		$this->load->view('layout/default', array(
			'judul' => 'Masuk Antrian',
			'isi' => 'masuk_antrian',
			'isi_parameter' => $data
		));
	}

	public function data_tertinggi(){

		// ajax data tertinggi (untuk user)

		$data_tertinggi = $this->user_database->tampil_data('user', 'order by nomor_antrian desc');
		$nomor_antrian_tertinggi = $data_tertinggi[0]->nomor_antrian;
		$data = array(
			'tertinggi' => $nomor_antrian_tertinggi
		);
		$this->load->view('data_tertinggi', $data);
	}

	public function sisa_antrian(){

		// ajax sisa antrian

		$data_tertinggi = $this->user_database->tampil_data('user', 'order by nomor_antrian desc');
		$nomor_antrian_tertinggi = $data_tertinggi[0]->nomor_antrian;
		$sisa_antrian = 160 - $nomor_antrian_tertinggi;
		$data = array(
			'tertinggi' => $sisa_antrian
		);
		$this->load->view('data_tertinggi', $data);	
	}

	// ambil nomor antrian

	public function ambil_nomor_antrian($jenis_besuk){

		// cek jamnya dulu baru jalankan yang lain. Kalau jamnya salah, redirect ke blog yang menerangkan jam besuk yang benar

		// <div class="alert alert-info">Maksimal besukan 160 orang (di luar pengikut). Mengambil nomor antrian hanya diperbolehkan pada pukul 08.00-09.00 dan 14.00-16.00</div>

		$waktu_1 = 8;
		// $waktu_1 = 10;
		$waktu_awal_2 = 14;
		$waktu_akhir_2 = 15;
		// $waktu_akhir_2 = 17;

		// $waktu = gmdate("H", time()+60*60*8);
		$waktu = date("H");

		if (!($waktu == $waktu_1) && !($waktu_awal_2 <= $waktu && $waktu <= $waktu_akhir_2)){
			redirect(base_url().'index.php/info/bukan_waktu_daftar_besukan');
			// echo $waktu;
		}

		$username = $this->session->userdata('username');
		$where = array(
			'username' => $username
		);
		$data = $this->user_database->tampil_data_where('user', $where)->result();
		$tampil_data = array(
			'nama' => $data[0]->nama,
			'ktp' => $data[0]->ktp,
			'username' => $data[0]->username,
			'jenis_besuk' => $jenis_besuk
		);
		$data_tertinggi = $this->user_database->tampil_data('user', 'order by nomor_antrian desc');
		$nomor_antrian_tertinggi = $data_tertinggi[0]->nomor_antrian;
		if ($nomor_antrian_tertinggi >= 160){
			// $this->load->view('antrian_habis');
			$this->load->view('layout/default', array(
				'judul' => 'Antrian Habis',
				'isi' => 'antrian_habis',
				'isi_parameter' => ''
			));
		} else {
			// $this->load->view('ambil_nomor_antrian', $tampil_data);
			$this->load->view('layout/default', array(
				'judul' => 'Ambil Nomor Antrian',
				'isi' => 'ambil_nomor_antrian',
				'isi_parameter' => $tampil_data
			));
		}
	}

	public function ambil_nomor_antrian_do($jenis_besuk){
		
		// ambil data dari input. kalau kosong berarti disiapkan untuk gambar

		$nama_alias = $this->input->post('nama_alias');
		$ktp_alias = $this->input->post('ktp_alias');
		$nama_dibesuk = $this->input->post('nama_dibesuk');
		$pengikut_nama = $this->input->post('pengikut_nama');
		$pengikut_ktp = $this->input->post('pengikut_ktp');
		$surat_besukan = '';
		$pengikut_foto_diri = '';
		$pengikut_foto_ktp = '';
		$qrcode = '';
		$username = $this->session->userdata('username');
		// $waktu = gmdate("Y-m-d H:i:s", time()+60*60*8);
		$waktu = date("Y-m-d H:i:s");
		$verifikasi = 'tidak';

		// buat nomor antrian
		// skip dulu bagian ini. Bagian ini aktif setelah diverifikasi oleh petugas

		// $data_tertinggi = $this->user_database->tampil_data('user', 'order by nomor_antrian desc');
		// $nomor_antrian_tertinggi = $data_tertinggi[0]->nomor_antrian;
		// $nomor_antrian = $nomor_antrian_tertinggi + 1;

		// di atas: kuncinya di nomor antrian

		// main upload gambar

		$this->upload->initialize(array(
			'upload_path' => './gambar/surat_besukan',
			'allowed_types' => 'gif|jpg|png',
			'encrypt_name' => TRUE
		));
		if ($this->upload->do_upload('surat_besukan')){
			$surat_besukan = $this->upload->data()['file_name'];
		}

		// upload gambar pengikut

		$this->upload->initialize(array(
			'upload_path' => './gambar/pengikut/foto_diri',
			'allowed_types' => 'gif|jpg|png',
			'encrypt_name' => TRUE
		));
		if ($this->upload->do_upload('pengikut_foto_diri')){
			$pengikut_foto_diri = $this->upload->data()['file_name'];
		}

		$this->upload->initialize(array(
			'upload_path' => './gambar/pengikut/foto_ktp',
			'allowed_types' => 'gif|jpg|png',
			'encrypt_name' => TRUE
		));
		if ($this->upload->do_upload('pengikut_foto_ktp')){
			$pengikut_foto_ktp = $this->upload->data()['file_name'];
		}

		// main qr code (=> booking)

        $config['imagedir']     = './gambar/cache/'; //direktori penyimpanan qr code
        $this->ciqrcode->initialize($config);
        
        $nama_qrcode = $username.'_booking.png'; //buat name dari qr code sesuai dengan username
        
        $params['data'] = base_url().'index.php/qr/a/'.$username; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$nama_qrcode; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		// masukkan database

        $data = array(
        	'nama_alias' => $nama_alias,
        	'ktp_alias' => $ktp_alias,
        	'nama_dibesuk' => $nama_dibesuk,
			// 'foto_diri' => $foto_diri, // foto diri tiba-tiba hilang weh
        	'pengikut_nama' => $pengikut_nama,
        	'pengikut_ktp' => $pengikut_ktp,
        	'surat_besukan' => $surat_besukan,
        	'pengikut_foto_diri' => $pengikut_foto_diri,
        	'pengikut_foto_ktp' => $pengikut_foto_ktp,
        	'jenis_besuk' => $jenis_besuk,
        	// 'nomor_antrian' => $nomor_antrian,
        	'qrcode' => $nama_qrcode,
        	'waktu' => $waktu,
        	'verifikasi' => $verifikasi
        );
        $this->user_database->edit_data('user', $data, array('username' => $username));
        redirect(base_url().'index.php/user/tampil_antrian');
    }	

}
