<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller {

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
		$this->user();
	}

	// menampilkan masing-masing database

	public function antrian(){
		$data = $this->db->get('antrian')->result();
		$this->load->view('layout/database', array(
			'judul' => 'Database',
			'isi' => 'database_antrian',
			'isi_parameter' => array(
				'data' => $data
			)
		));
	}

	public function user(){
		$data = $this->db->get('user')->result();
		$this->load->view('layout/database', array(
			'judul' => 'User',
			'isi' => 'database_user',
			'isi_parameter' => array(
				'data' => $data
			)
		));
	}

	public function history(){
		$data = $this->db->get('history')->result();
		$this->load->view('layout/database', array(
			'judul' => 'History',
			'isi' => 'database_history',
			'isi_parameter' => array(
				'data' => $data
			)
		));
	}

}
