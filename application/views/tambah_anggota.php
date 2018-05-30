<?php
	$this->load->view('elemen/anti_tabel');
?>
<form method="post" action="<?= base_url('index.php/login/tambah_anggota_do') ?>" enctype='multipart/form-data'>
	<table class="table">
		<tr>
			<td>No. KTP</td>
			<td>
				<input type="number" name="ktp" class="form-control" placeholder="Contoh: 123456" required>
			</td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>
				<input type="text" name="nama" class="form-control" placeholder="Contoh: Budi" required>
			</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<select name="gender" class="form-control">
					<option value="laki-laki">Laki-laki</option>
					<option value="perempuan">Perempuan</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td>
				<input type="text" name="tempat_lahir" class="form-control" placeholder="Contoh: Samarinda" required>
			</td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>
				<input type="date" name="tanggal_lahir" class="form-control"  required>
			</td>
		</tr>
		<tr>
			<td>Pekerjaan</td>
			<td>
				<input type="text" name="pekerjaan" class="form-control" placeholder="Contoh: Wiraswasta" required>
			</td>
		</tr>
		<tr>
			<td>Status</td>
			<td>
				<select name="status" class="form-control">
					<option value="menikah">Menikah</option>
					<option value="tidak menikah">Tidak Menikah</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>
				<textarea name="alamat" placeholder="Contoh: Jln. Cipto Mangunkusumo, RT 1, Blok M" class="form-control" required></textarea>
			</td>
		</tr>
		<tr>
			<td>Foto Diri</td>
			<td>
				<input type="file" name="foto_diri" required>
			</td>
		</tr>
		<tr>
			<td>Foto KTP</td>
			<td>
				<input type="file" name="foto_ktp" required>
			</td>
		</tr>
		<tr>
			<td>
				<hr>
			</td>
			<td>
				<hr>
			</td>
		</tr>
		<tr>
			<td>Username</td>
			<td>
				<?php
					$username_ada = $this->session->flashdata('username_ada');
					if ($username_ada){
						echo '<div class="alert alert-danger">'.$username_ada.'</div>';
					}
				?>
				<input type="text" name="username" class="form-control" placeholder="Contoh: pakmalik" required>
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="text" name="password" class="form-control" placeholder="Contoh: 123789" required>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="selesai" value="Selesai" class="btn btn-default">
			</td>
		</tr>
	</table>	
</form>