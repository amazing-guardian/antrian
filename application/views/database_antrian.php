<table class="table">
	<thead>
		<tr>
			<th>ID Antrian</th>
			<th>Nomor Antrian</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $d){ ?>
			<tr>
				<td><?= $d->id_antrian ?></td>
				<td><?= $d->nomor_antrian ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>