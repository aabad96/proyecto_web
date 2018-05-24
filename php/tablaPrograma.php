<table id="tabla">
	<thead>
		<tr>
			<th><strong>ID</strong></th>
			<th><strong>Nombre</strong></th>
		</tr>
	</thead>
	<tbody>
	<?php
	require('db.php');
	$count=1;
	$sel_query="Select nombre from programa order by id;";
	$result = mysqli_query($con,$sel_query);
	while($row = mysqli_fetch_assoc($result)) { ?>
	<tr>
		<td><?php echo $count; ?></td>
		<td><?php echo utf8_encode($row["nombre"]); ?></td>
	</tr>
	<?php $count++; } ?>
	</tbody>
</table>