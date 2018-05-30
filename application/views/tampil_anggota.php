<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>No. KTP</th>
				<th>Nama Lengkap</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
				<th>Username</th>
				<th>Password</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $d) { ?>
				<tr>
					<td><?= $d->ktp ?></td>
					<td><?= $d->nama ?></td>
					<td><?= $d->gender ?></td>
					<td><?= $d->alamat ?></td>
					<td><?= $d->username ?></td>
					<td><?= $d->password ?></td>
					<td>
						<a href="<?= base_url() ?>index.php/admin/edit_anggota/<?= $d->ktp ?>">edit</a>
						<?php if ($d->username != 'admin'){ ?>
							&bull;
							<a href="<?= base_url() ?>index.php/admin/hapus_anggota/<?= $d->ktp ?>">delete</a>
						<?php } ?>
					</td>
				</tr>
			<? } ?>
		</tbody>
	</table>
</div>
<p>
	<a href="<?= base_url('index.php/login/tambah_anggota') ?>" class="btn btn-default">Tambah Anggota</a>
	<a href="<?= base_url() ?>index.php/admin/ubah_antrian" class="btn btn-default">Beranda</a>
</p>
<?php
	$this->load->view('elemen/tombol_logout');
?>