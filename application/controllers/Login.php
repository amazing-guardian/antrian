<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// ada login di sini

	public function __construct(){
		parent::__construct();
		$this->load->library('Session/session');
	}

	// index

	public function index(){
		$this->login();
	}

	// login

	public function login(){
		// $this->load->view('login');
		$this->load->view('layout/default', array(
			'judul' => 'Login',
			'isi' => 'login',
			'isi_parameter' => ''
		));
	}

	public function login_do(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$cek = $this->user_database->tampil_data_where('user', $where)->num_rows();
		if ($cek > 0){
			$data_session = array(
				'username' => $username,
				'status' => 'login'
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('index.php/user'));
		} else {
			// echo 'Username dan password salah';
			$this->session->set_flashdata('pesan', 'Username dan password salah');
			redirect(base_url('index.php/login'));
		}
	}

	// tambah anggota

	public function tambah_anggota(){
		// $this->load->view('tambah_anggota');
		$this->load->view('layout/default', array(
			'judul' => 'Tambah Anggota',
			'isi' => 'tambah_anggota',
			'isi_parameter' => ''
		));
	}

	public function tambah_anggota_do(){
		$ktp = $this->input->post('ktp');
		$nama = $this->input->post('nama');
		$gender = $this->input->post('gender');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$pekerjaan = $this->input->post('pekerjaan');
		$status = $this->input->post('status');
		$alamat = $this->input->post('alamat');
		$foto_diri = ''; // mengapa yang ini yang tersimpan di database?
		$foto_ktp = '';
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// main upload gambar

		$config['upload_path'] = './gambar/foto_diri/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		if ($this->upload->do_upload('foto_diri')){
			$foto_diri = $this->upload->data()['file_name']; // seharusnya yang ini yang tersimpan di database
		}

		$config2['upload_path'] = './gambar/ktp/';
		$config2['allowed_types'] = 'gif|jpg|png';
		$config2['encrypt_name'] = TRUE;
		$this->upload->initialize($config2);
		if ($this->upload->do_upload('foto_ktp')){
			$foto_ktp = $this->upload->data()['file_name']; // seharusnya yang ini yang tersimpan di database
		}
		
		$data = array(
			'ktp' => $ktp,
			'nama' => $nama,
			'gender' => $gender,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'pekerjaan' => $pekerjaan,
			'status' => $status,
			'alamat' => $alamat,
			'foto_diri' => $foto_diri,
			'foto_ktp' => $foto_ktp,
			'username' => $username,
			'password' => $password
		);
		$cek_username = $this->user_database->tampil_data_where('user', array('username' => $username))->num_rows();
		if ($cek_username >= 1){
			$this->session->set_flashdata('username_ada', 'Username tidak tersedia. Coba yang lain');
			redirect(base_url().'index.php/login/tambah_anggota');
		} else {
			$res = $this->user_database->tambah_data('user', $data);
			if ($res >= 1){
				if ($this->session->userdata('username') == 'admin'){
					redirect(base_url().'index.php/admin/tampil_anggota');
				} else {
					$this->session->set_flashdata('username', $username);
					$this->session->set_flashdata('password', $password);
					redirect(base_url().'index.php/login');	
				}
			} else {
				echo 'Tambah anggota gagal';
			}
		}
	}

	// logout

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'index.php/login');
	}

}
