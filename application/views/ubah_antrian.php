<style type="text/css">
.tombol {
	border-radius: 50%;
}
</style>
<center>
	<p>Antrian:</p>
	<h1><span class="antrian-sekarang"><?= $data['sekarang'] ?></span> <small>dari <span class="tertinggi"><?= $data['tertinggi'] ?></span></small></h1>
	<h1>
		<a href="<?= base_url('index.php/admin/ubah_antrian_do') ?>" class="btn btn-default btn-lg tombol">+</a>
	</h1>
	<hr>
	<p>
		<a href="<?= base_url() ?>index.php/admin/tampil_anggota" class='btn btn-default'>Lihat Anggota</a>
		<a href="<?= base_url() ?>index.php/database" class='btn btn-default'>Database</a>
	</p>
	<br>
	<br>
	<p>
		<a href="<?= base_url('index.php/admin/reset_antrian') ?>">reset</a>
		&bull;
		<a href="<?= base_url() ?>index.php/login/logout">logout</a>
	</p>
</center>
<?php
	$this->load->view('elemen/script');
?>
<script type="text/javascript">
refresh = function (){
	setInterval(function(){
		$('.tertinggi').load('<?= base_url() ?>index.php/admin/data_tertinggi');
		$('.antrian-sekarang').load('<?= base_url() ?>index.php/admin/antrian_sekarang');
	}, 1000);
}
refresh();
</script>