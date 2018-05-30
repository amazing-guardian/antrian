<table class="table">
	<thead>
		<tr>
			<th>ID History</th>
			<th>KTP</th>
			<th>Nama</th>
			<th>Gender</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Pekerjaan</th>
			<th>Status</th>
			<th>Alamat</th>
			<th>Username</th>
			<th>Password</th>
			<th>Nomor Antrian</th>
			<th>Immortal</th>
			<th>Janis Besuk</th>
			<th>Foto Diri</th>
			<th>Foto KTP</th>
			<th>Surat Besukan</th>
			<th>Nama Dibesuk</th>
			<th>Pengikut Nama</th>
			<th>Pengikut KTP</th>
			<th>Pengikut Foto Diri</th>
			<th>Pengikut Foto KTP</th>
			<th>Nama Alias</th>
			<th>KTP Alias</th>
			<th>QR Code</th>
			<th>Waktu</th>
			<th>Verifikasi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $d){ ?>
		<tr class="isi">
			<td><?= $d->id_history ?></td>
			<td><?= $d->ktp ?></td>
			<td><?= $d->nama ?></td>
			<td><?= $d->gender ?></td>
			<td><?= $d->tempat_lahir ?></td>
			<td><?= $d->tanggal_lahir ?></td>
			<td><?= $d->pekerjaan ?></td>
			<td><?= $d->status ?></td>
			<td><?= $d->alamat ?></td>
			<td><?= $d->username ?></td>
			<td><?= $d->password ?></td>
			<td><?= $d->nomor_antrian ?></td>
			<td><?= $d->immortal ?></td>
			<td><?= $d->jenis_besuk ?></td>
			<td><?= $d->foto_diri ?></td>
			<td><?= $d->foto_ktp ?></td>
			<td><?= $d->surat_besukan ?></td>
			<td><?= $d->nama_dibesuk ?></td>
			<td><?= $d->pengikut_nama ?></td>
			<td><?= $d->pengikut_ktp ?></td>
			<td><?= $d->pengikut_foto_diri ?></td>
			<td><?= $d->pengikut_foto_ktp ?></td>
			<td><?= $d->nama_alias ?></td>
			<td><?= $d->ktp_alias ?></td>
			<td><?= $d->qrcode ?></td>
			<td><?= $d->waktu ?></td>
			<td><?= $d->verifikasi ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>