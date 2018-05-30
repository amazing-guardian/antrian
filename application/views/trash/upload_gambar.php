<!DOCTYPE html>
<html>
<head>
	<title>Upload Gambar</title>
	<?php
		$this->load->view('elemen/head');
	?>
</head>
<body>
	<?php
		$this->load->view('elemen/header');
	?>
	<div class="container">
		<form method="post" action="<?= base_url() ?>index.php/upload/upload_gambar_do" enctype="multipart/form-data">
			<input type="file" name="gambar">
			<input type="submit" name="submit" value="Submit" class="btn btn-default">
		</form>
	</div>
</body>
</html>