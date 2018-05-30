<span class="reload"></span>
<?php
$this->load->view('elemen/anti_tabel');
?>
<!-- <h1 class="text-center"><?= $jenis_besuk ?></h1> -->

<!-- masih diedit -->

<!-- info -->
<?php
$belum_verifikasi = 'tidak';
?>
<?php if ($verifikasi == $belum_verifikasi) { ?>
<div class="alert alert-warning">Silahkan menuju ke Pelayanan dengan membawa semua persyaratan asli</div>
<?php } ?>

<h1 class="text-center">
	<?php
	if ($jenis_besuk == 'besuk_tahanan'){
		echo 'Besuk Tahanan';
	} else if ($jenis_besuk == 'besuk_napi'){
		echo 'Besuk Napi';
	}
	?>		
</h1>
<hr>
<table class="table">
	<tr>
		<td width="250">
			<span class="thumbnail">
				<img src="<?= base_url() ?>gambar/foto_diri/<?= $foto_diri ?>" style="width: 250px; max-width: 100%;">
			</span>
		</td>
		<?php if ($verifikasi == $belum_verifikasi){ ?>
		<td style="display: none;">
			<?php } else { ?>
			<td>
				<?php } ?>
				<p class="text-center">Sisa antrian:</p>
				<h1 class="text-center"><span class='antrian-sisa'><?= $sisa ?></span></h1>
			</td>
			<?php if ($verifikasi == $belum_verifikasi){ ?>
			<td style="display: none;">
				<?php } else { ?>
				<td>
					<?php } ?>
					<p>Antrian Anda: <strong><span class='antrian-user'><?= $nomor_antrian ?></span></strong></p>
					<p>Antrian terakhir: <strong><span class='antrian-sekarang'><?= $sekarang ?></span></strong></p>
				</td>
			</tr>
		</table>
		<table class="table">
			<tr>
				<td>Nama</td>
				<td><?= $nama_alias ?></td>
			</tr>
			<tr>
				<td>KTP</td>
				<td><?= $ktp_alias ?></td>
			</tr>
			<?php if ($pengikut_nama) { ?>
			<tr>
				<td><strong>Pengikut</strong></td>
				<td></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><?= $pengikut_nama ?></td>
			</tr>
			<tr>
				<td>KTP</td>
				<td><?= $pengikut_ktp ?></td>
			</tr>
			<?php } ?>
		</table>
		<?php if ($surat_besukan) { ?>
		<p>
			<strong>Surat besukan</strong>
		</p>
		<center>
			<span class="thumbnail">
				<img src="<?= base_url() ?>gambar/surat_besukan/<?= $surat_besukan ?>">
			</span>
		</center>
		<? } ?>
		<?php if ($pengikut_nama) { ?>
	<!-- <table class="table">
		<tr>
			<td>
				<span class="thumbnail">
					<img src="<?= base_url() ?>gambar/pengikut/foto_diri/<?= $pengikut_foto_diri ?>">
				</span>
			</td>
			<td>
				<span class="thumbnail">
					<img src="<?= base_url() ?>gambar/pengikut/foto_ktp/<?= $pengikut_foto_ktp ?>">
				</span>
			</td>
		</tr>
	</table> -->
	<div class="row">
		<div class="col-sm-6 col-xs-12">
			<p>
				<strong>Foto diri pengikut</strong>
			</p>
			<span class="thumbnail">
				<img src="<?= base_url() ?>gambar/pengikut/foto_diri/<?= $pengikut_foto_diri ?>">
			</span>
		</div>
		<div class="col-sm-6 col-xs-12">
			<p>
				<strong>Foto KTP pengikut</strong>
			</p>
			<span class="thumbnail">
				<img src="<?= base_url() ?>gambar/pengikut/foto_ktp/<?= $pengikut_foto_ktp ?>">
			</span>
		</div>
	</div>
	<?php } ?>
	<center>
		<div class="thumbnail" style="max-width: 250px;">
			<img src="<?= base_url() ?>gambar/cache/<?= $qrcode ?>">
		</div>
	</center>
	<?php
	$this->load->view('elemen/tombol_logout');
	?>
	<?php
	$this->load->view('elemen/script');
	?>
	<script type="text/javascript">
		refresh = function (){
			setInterval(function(){
				$('.antrian-sisa').load('<?= base_url() ?>index.php/user/antrian_sisa');
				$('.antrian-user').load('<?= base_url() ?>index.php/user/antrian_user');
				$('.antrian-sekarang').load('<?= base_url() ?>index.php/user/antrian_sekarang');
				$('.reload').load('<?= base_url() ?>index.php/user/reload');
			}, 1000);
		}
		refresh();
	</script>