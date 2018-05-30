<?php
	$flashdata_pesan = $this->session->flashdata('pesan');
	$flashdata_username = $this->session->flashdata('username');
	$flashdata_password = $this->session->flashdata('password');
	if ($flashdata_pesan){
		echo '<div class="alert alert-danger">'.$flashdata_pesan.'</div>';
	}
	if ($flashdata_username){
		echo '<div class="alert alert-danger">Masuklah dengan username '.$flashdata_username.' dan password '.$flashdata_password.'</div>';
	}

	$this->load->view('elemen/anti_tabel');
?>
<form method="post" action="<?= base_url('index.php/login/login_do') ?>">
	<table class="table">
		<tr>
			<td>Username</td>
			<td>
				<input type="text" name="username" class="form-control" placeholder="Contoh: ruditabuti" required autofocus>
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="password" name="password" class="form-control" placeholder="Contoh: rahasia" required>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="login" value="Login" class="btn btn-default">
			</td>
		</tr>
	</table>
</form>
<center>
	<p>Belum menjadi anggota? <a href="<?= base_url('index.php/login/tambah_anggota') ?>">Daftar</a></p>
</center>