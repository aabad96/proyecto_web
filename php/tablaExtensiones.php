<table id="tabla">
	<thead>
		<tr>
			<th><strong>ID</strong></th>
			<th><strong>Nombre</strong></th>
			<th><strong>Descripcion</strong></th>
			<th><strong>Programa</strong></th>
			<th><strong>Link</strong></th>
		</tr>
	</thead>
	<tbody>
	<?php
	require('db.php');
	$count=1;
	$sel_query="Select * from extension order by id;";
	$result = mysqli_query($con,$sel_query);
	while($row = mysqli_fetch_assoc($result)) { ?>
	<tr>
		<td><?php echo $count; ?></td>
		<td><?php echo utf8_encode($row["nombre"]); ?></td>
		<td><?php echo utf8_encode($row["descripcion"]); ?></td>
		<td><?php echo utf8_encode($row["programa"]); ?></td>
		<td><?php echo utf8_encode($row["link"]); ?></td>
	</tr>
	<?php $count++; } ?>
	</tbody>
</table>