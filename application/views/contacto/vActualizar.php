<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Actualizar Contacto</h1>	
	<form method="POST" action="<?php echo base_url();?>CContacto/actualizar">
		<input type="hidden" name="hiddenId" value="<?php echo $contacto->Id; ?>">
		<input type="hidden" name="hiddenFoto" value="<?php echo $contacto->Foto; ?>">
		<?php
			$ruta=str_replace("/index.php", "", base_url());
			if($contacto->Foto != "")
			{
				echo "<img border='0' src=\"".$ruta."photos\\".$contacto->Foto."\" alt='Imagen asociada' widht='50' height='50'>";
			}
		?>
		<table>
			<tr>
				<td><label>Nombres</label></td>
				<td><input type="text" name="txtNombres" value="<?php echo $contacto->Nombres; ?>"></td>
			</tr>
			<tr>
				<td><label>Apellidos</label></td>
				<td><input type="text" name="txtApellidos" value="<?php echo $contacto->Apellidos; ?>"></td>
			</tr>
			<tr>
				<td><label>Dirección</label></td>
				<td><input type="text" name="txtDireccion" value="<?php echo $contacto->Direccion; ?>"></td>
			</tr>
			<tr>
				<td><label>Teléfono Trabajo</label></td>
				<td><input type="text" name="txtTelTrabajo" value="<?php echo $contacto->TelTrabajo; ?>"></td>
			</tr>
			<tr>
				<td><label>Teléfono Móvil</label></td>
				<td><input type="text" name="txtTelMovil" value="<?php echo $contacto->TelMovil; ?>"></td>
			</tr>
			<tr>
				<td><label>Correo Electrónico</label></td>
				<td><input type="email" name="txtEmail" value="<?php echo $contacto->Email; ?>"></td>
			</tr>
			<tr>
				<td><label>Foto</label></td>
				<td><input type="file" name="fileToUpload" id="fileToUpload" accept="image/x-png, image/jpeg, image/jpg"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Guardar" name="submit"></td>
			</tr>
		</table>
	</form>
	<h2><?php if(isset($mensaje)) echo $mensaje; ?></h2>
        <?=validation_errors();?><!--mostrar los errores de validación-->
</body>
</html>