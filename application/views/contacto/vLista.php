<div class="container">
<h2>Mis Contactos</h2>
<center><a href="<?php echo base_url();?>CContacto/add" class="btn btn-info">Nuevo Contacto</a></center><br/>
<?php 
	if($misContactos==null)
	{
		echo "<h3>Lista de Contactos Vacía</h3>";
	}
	else
	{
?>
<div class="table-responsive">
<table class="table">
	<thead>
		<th>Foto</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Dirección</th>
		<th>Teléfono Trabajo</th>
		<th>Teléfono Móvil</th>
		<th>Email</th>
		<th>Actualizar</th>
		<th>Eliminar</th>
	</thead>
	<tbody>
		<?php 
			foreach ($misContactos as $row) {
		?>
			<tr>
				<?php
					$ruta=base_url();
					if($row->Foto != "")
					{
						echo "<td><a target='_blank' href=\"".$ruta."photos\\".$row->Foto."\"><img border='0' src=\"".$ruta."photos\\".$row->Foto."\" alt='Foto del Contacto' widht='50' height='50' class='img-circle'></a></td>\n";
					}
					else
					{
						echo "<td><a target='_blank' href=\"".$ruta."photos\\unknown.jpg\"><img border='0' src=\"".$ruta."photos\\unknown.jpg\" alt='Foto del Contacto' widht='50' height='50' class='img-circle'></a></td>\n";
					}
				?>
				<td><?php echo $row->Nombres;?></td>
				<td><?php echo $row->Apellidos;?></td>
				<td><?php echo $row->Direccion;?></td>
				<td><?php echo $row->TelTrabajo;?></td>
				<td><?php echo $row->TelMovil;?></td>
				<td><?php echo $row->Email;?></td>
				<td><a href="<?php echo base_url();?>CContacto/update/<?php echo $row->Id;?>" class="btn btn-primary">Actualizar</a></td>
				<td><a href="<?php echo base_url();?>CContacto/delete/<?php echo $row->Id;?>" onClick="return confirm('¿Está seguro de eliminar contacto?');" class="btn btn-danger">Eliminar</a></td>
			</tr>
		<?php
			}
		?>
	</tbody>	
</table>
</div>
<?php } ?>
</div>