<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>Usuarios registrados</h2>
<a href="<?php echo base_url();?>CUsuario/create">Crear Usuario</a><br/>
<?php
if($listaUsuarios==null)
{
	echo "<h3>No hay usuarios registrados en el sistema</h3>";
}
else
{
	?>
<table>
	<thead>
		<th>Usuario</th>
		<th>Eliminar</th>
	</thead>	
	<tbody>
		<?php 
			foreach ($listaUsuarios as $row) {
			?>
			<tr>
				<td><?php echo $row->Usuario;?></td>
				<td><a href="<?php echo base_url();?>CUsuario/delete/<?php echo $row->Id;?>" onClick="return confirm('¿Está seguro de eliminar usuario?');">Eliminar</a></td>
			</tr>
			<?php
			}
		?>
	</tbody>
<?php
}
?>
</body>
</html>