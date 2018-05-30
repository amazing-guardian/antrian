<!DOCTYPE html>
<html>
<head>
	<title><?= $judul ?></title>
	<?php $this->load->view('elemen/head'); ?>
</head>
<body>
	<?php $this->load->view('elemen/header'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 sticky">
				<div class="theiaStickySidebar">
					<div class="list-group">
						<a href="#!" class="list-group-item active">Navigasi</a>
						<a href="<?= base_url() ?>index.php/database/antrian" class="list-group-item">Antrian</a>
						<a href="<?= base_url() ?>index.php/database/history" class="list-group-item">History</a>
						<a href="<?= base_url() ?>index.php/database/user" class="list-group-item">User</a>
					</div>
					<div class="list-group">
						<a href="#!" class="list-group-item active">Menu</a>
						<a href="javascript:location.reload();" class="list-group-item">Reload</a>
					</div>
				</div>
			</div>
			<div class="col-sm-9 sticky">
				<div class="theiaStickySidebar">
					<div class="table-responsive">
						<?php $this->load->view($isi, $isi_parameter); ?>
					</div>		
				</div>
			</div>
		</div>
	</div>

	<!-- skrip -->

	<?php
		$this->load->view('elemen/script');
		$skrip = array(
			'ResizeSensor.min.js',
			'theia-sticky-sidebar.min.js'
		);
		foreach ($skrip as $s){
			echo "<script type=\"text/javascript\">";
			$this->load->view('skrip/'.$s);
			echo "</script>";
		}
	?>

	<!-- sticky sidebar -->

	<script type="text/javascript">
		$(document).ready(function(){
			$('.sticky').theiaStickySidebar({
				additionalMarginTop: 20,
				additionalMarginBottom: 20
			});
		});
	</script>

</body>
</html>