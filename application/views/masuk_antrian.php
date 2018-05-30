<div class="alert alert-info">Maksimal besukan 160 orang (di luar pengikut). Mengambil nomor antrian hanya diperbolehkan pada pukul 08.00-09.00 dan 14.00-16.00</div>
<div class="alert alert-warning">Sudah <span class="nomor-antrian-tertinggi"><?= $nomor_antrian_tertinggi ?></span> orang mengambil nomor antrian. Sisa <span class="sisa-nomor-antrian"><?= $sisa_nomor_antrian ?></span> nomor antrian lagi</div>
<center>
	<p>
		<a href="<?= base_url() ?>index.php/user/ambil_nomor_antrian/besuk_tahanan" class="btn btn-default">Antrian Besuk Tahanan</a>
	</p>
	<p>
		<a href="<?= base_url() ?>index.php/user/ambil_nomor_antrian/besuk_napi" class="btn btn-default">Antrian Besuk Napi</a>
	</p>
	<hr>
	<a href="<?= base_url() ?>index.php/berita/tidak_boleh_dibawa" class="btn btn-danger">Barang-barang yang Tidak Boleh Dibawa</a>
	<a href="<?= base_url() ?>index.php/berita/alur_besukan_online" class="btn btn-default">Alur Besukan Online</a>
	<a href="<?= base_url() ?>index.php/berita/alur_besukan_offline" class="btn btn-default">Alur Besukan Offline (Pakai Kartu)</a>
	<?php
		$this->load->view('elemen/tombol_logout');
	?>
</center>
<?php
	$this->load->view('elemen/script');
?>
<script type="text/javascript">
	refresh = function(){
		setInterval(function(){
			$('.nomor-antrian-tertinggi').load('<?= base_url() ?>index.php/user/data_tertinggi');
			$('.sisa-nomor-antrian').load('<?= base_url() ?>index.php/user/sisa_antrian');
		}, 1000)
	}
	refresh();
</script>