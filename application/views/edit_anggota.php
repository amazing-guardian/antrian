<?php $this->load->view('elemen/anti_tabel'); ?>
<form method="post" action="<?= base_url('index.php/admin/edit_anggota_do') ?>">
	<table class="table">
		<tr>
			<td>No. KTP</td>
			<td>
				<input type="number" name="ktp" class="form-control" value="<?= $data[0]->ktp ?>" readonly>
			</td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>
				<input type="text" name="nama" class="form-control" value="<?= $data[0]->nama ?>" required>
			</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<select name="gender" class="form-control">
					<option <?php if ($data[0]->gender == 'laki-laki') echo 'selected'; ?> value="laki-laki">Laki-laki</option>
					<option <?php if ($data[0]->gender == 'perempuan') echo 'selected'; ?> value="perempuan">Perempuan</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>
				<textarea name="alamat" class="form-control" required><?= $data[0]->alamat ?></textarea>
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
				<input type="text" name="username" class="form-control" value="<?= $data[0]->username ?>" required <?php if ($data[0]->username == 'admin') echo 'readonly' ?>>
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="text" name="password" class="form-control" value="<?= $data[0]->password ?>" required>
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