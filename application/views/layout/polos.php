<!DOCTYPE html>
<html>
<head>
	<title><?= $judul ?></title>
	<?php $this->load->view('elemen/head'); ?>
</head>
<body>
	<?php $this->load->view($isi, $isi_parameter); ?>
</body>
</html>