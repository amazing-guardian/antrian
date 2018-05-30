<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	// main login

	public function __construct(){
		parent::__construct();
		$this->load->library('Session/session');
		if (strtolower($this->session->userdata('username')) != 'admin'){
			redirect(base_url().'index.php/login');
		}
	}

	// index

	public function index(){
		$this->ubah_antrian();
	}

	// tampilkan anggota

	public function tampil_anggota(){
		$data = $this->user_database->tampil_data('user', 'order by nama');
		// $this->load->view('tampil_anggota', array('data' => $data));
		$this->load->view('layout/default', array(
			'judul' => 'Tampil Anggota',
			'isi' => 'tampil_anggota',
			'isi_parameter' => array(
				'data' => $data
			)
		));
	}

	// edit anggota

	public function edit_anggota($ktp){
		$where = array(
			'ktp' => $ktp
		);
		$data = $this->user_database->tampil_data_where('user', $where)->result();
		// $this->load->view('edit_anggota', array('data' => $data));	
		$this->load->view('layout/default', array(
			'judul' => 'Edit Anggota',
			'isi' => 'edit_anggota',
			'isi_parameter' => array(
				'data' => $data
			)
		));
	}

	public function edit_anggota_do(){
		$ktp = $this->input->post('ktp');
		$nama = $this->input->post('nama');
		$gender = $this->input->post('gender');
		$alamat = $this->input->post('alamat');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array(
			'nama' => $nama,
			'gender' => $gender,
			'alamat' => $alamat,
			'username' => $username,
			'password' => $password
		);
		$res = $this->user_database->edit_data('user', $data, array('ktp' => $ktp));
		if ($res >= 1){
			redirect(base_url('index.php/admin/tampil_anggota'));
		} else {
			echo 'Update anggota gagal';
		}
	}

	// hapus anggota

	public function hapus_anggota($ktp){
		$where = array(
			'ktp' => $ktp
		);
		$res = $this->user_database->hapus_data('user', $where);
		$data = $this->user_database->tampil_data_where('user', $where)->result();

		// hapus gambar anggota

		delete_files('./gambar/foto_diri/'.$data[0]->foto_diri, TRUE);

		if ($res >= 1){
			redirect(base_url('index.php/admin/tampil_anggota'));
		} else {
			echo 'Hapus anggota gagal';
		}
	}

	// ubah antrian

	public function ubah_antrian(){

		// data tertinggi

		$data_tertinggi = $this->user_database->tampil_data('user', 'order by nomor_antrian desc');
		$nomor_antrian_tertinggi = $data_tertinggi[0]->nomor_antrian;

		// antrian terakhir

		$data = $this->user_database->tampil_data('antrian');
		$sekarang = $data[0]->nomor_antrian;
		$data = array(
			'sekarang' => $sekarang,
			'tertinggi' => $nomor_antrian_tertinggi
		);
		// $this->load->view('ubah_antrian', array('data' => $data));
		$this->load->view('layout/default', array(
			'judul' => 'Ubah Antrian',
			'isi' => 'ubah_antrian',
			'isi_parameter' => array(
				'data' => $data
			)
		));
	}

	public function data_tertinggi(){
		$data_tertinggi = $this->user_database->tampil_data('user', 'order by nomor_antrian desc');
		$nomor_antrian_tertinggi = $data_tertinggi[0]->nomor_antrian;
		$data = array(
			'tertinggi' => $nomor_antrian_tertinggi
		);
		$this->load->view('data_tertinggi', $data);
	}

	public function antrian_sekarang(){
		$data_antrian = $this->user_database->tampil_data('antrian');
		$sekarang = $data_antrian[0]->nomor_antrian;
		$data = array(
			'tertinggi' => $sekarang
		);
		$this->load->view('data_tertinggi', $data);
	}

	public function ubah_antrian_do(){
		$data = $this->user_database->tampil_data('antrian');
		$sekarang = $data[0]->nomor_antrian;
		$antrian_baru = $sekarang + 1;
		$ubah = array(
			'nomor_antrian' => $antrian_baru
		);
		$where = array(
			'id_antrian' => '1'
		);
		$res = $this->user_database->edit_data('antrian', $ubah, $where);
		if ($res >= 1){
			redirect(base_url('index.php/admin/ubah_antrian'));
		} else {
			echo 'Ubah antrian gagal';
		}
	}

	// reset antrian

	public function reset_antrian(){
		
		// salin semua data ke tabel history

		$ambil_data_user = $this->db->get_where('user')->result();
		foreach ($ambil_data_user as $d){
			$this->db->insert('history', array(
				'ktp' => $d->ktp,
				'nama' => $d->nama,
				'gender' => $d->gender,
				'tempat_lahir' => $d->tempat_lahir,
				'tanggal_lahir' => $d->tanggal_lahir,
				'pekerjaan' => $d->pekerjaan,
				'status' => $d->status,
				'alamat' => $d->alamat,
				'username' => $d->username,
				'password' => $d->password,
				'nomor_antrian' => $d->nomor_antrian,
				'immortal' => $d->immortal,
				'jenis_besuk' => $d->jenis_besuk,
				'foto_diri' => $d->foto_diri,
				'foto_ktp' => $d->foto_ktp,
				'surat_besukan' => $d->surat_besukan,
				'nama_dibesuk' => $d->nama_dibesuk,
				'pengikut_nama' => $d->pengikut_nama,
				'pengikut_ktp' => $d->pengikut_ktp,
				'pengikut_foto_diri' => $d->pengikut_foto_diri,
				'pengikut_foto_ktp' => $d->pengikut_foto_ktp,
				'nama_alias' => $d->nama_alias,
				'ktp_alias' => $d->ktp_alias,
				'qrcode' => $d->qrcode,
				'waktu' => $d->waktu,
				'verifikasi' => $d->verifikasi
			));
		}
		$this->db->delete('history', array(
			'nomor_antrian' => 0
		));

		// ubah semua antrian user menjadi 0
		
		$data_reset_user = array(
			'nomor_antrian' => 0,
			'jenis_besuk' => '',
			// 'foto_diri' => '',
			'surat_besukan' => '',
			'nama_dibesuk' => '',
			'pengikut_nama' => '',
			'pengikut_ktp' => '',
			'pengikut_foto_diri' => '',
			'pengikut_foto_ktp' => '',
			'nama_alias' => '',
			'ktp_alias' => '',
			'qrcode' => '',
			'waktu' => '',
			'verifikasi' => ''
		);
		$this->user_database->edit_data('user', $data_reset_user, array('immortal' => '0'));

		// hapus semua gambar di cache

		delete_files('./gambar/cache/', TRUE);

		// ubah angka antrian jadi 1

		$reset = array(
			'nomor_antrian' => '1'
		);
		$where = array(
			'id_antrian' => '1'
		);
		$res = $this->user_database->edit_data('antrian', $reset, $where);
		if ($res >= 1){
			redirect(base_url('index.php/admin/ubah_antrian'));
		} else {
			echo 'Reset antrian gagal';
		}
	}

}
