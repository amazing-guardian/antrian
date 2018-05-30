<!DOCTYPE html>
<html>
<head>
	<title>QR Sesuai</title>
	<?php
		$this->load->view('elemen/head');
	?>
	<style type="text/css">
		body {
			background: rgb(76, 175, 80);
		}
		.outer {
		   display: table;
		   position: absolute;
		   width: 100%;
		   height: 100%;
		}
		.inner {
		   display: table-cell;
		   vertical-align: middle;
		   text-align: center;
		}
		.isi {
		   display: inline-block;
		   width: 80%;
		   margin: auto;
		}
		h1 {
			color: white;
		}
	</style>
</head>
<body>
	<center>
		<div class="outer">
			<div class="inner">
				<div class="isi">
					<h1>Antrian sesuai</h1>
				</div>
			</div>
		</div>
	</center>
</body>
</html>