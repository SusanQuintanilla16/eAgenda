<div class="container">
<h2>Usuarios registrados</h2>
<center><a href="<?php echo base_url();?>CUsuario/create" class="btn btn-info">Crear Usuario</a></center><br/>
<?php
if($listaUsuarios==null)
{
	echo "<h3>No hay usuarios registrados en el sistema</h3>";
}
else
{
	?>
<div class="table-responsive">
<table class="table">
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
				<td><a href="<?php echo base_url();?>CUsuario/delete/<?php echo $row->Id;?>" onClick="return confirm('¿Está seguro de eliminar usuario?');" class="btn btn-danger">Eliminar</a></td>
			</tr>
			<?php
			}
		?>
	</tbody>
<?php
}
?>
</table>
</div>