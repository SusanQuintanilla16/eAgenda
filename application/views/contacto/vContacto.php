<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Ingresar Contacto</h1>
	<form method="POST" action="<?php echo base_url();?>CContacto/ingresar" enctype="multipart/form-data">
		<table>
			<tr>
				<td><label>Nombres</label></td>
				<td><input type="text" name="txtNombres"></td>
			</tr>
			<tr>
				<td><label>Apellidos</label></td>
				<td><input type="text" name="txtApellidos"></td>
			</tr>
			<tr>
				<td><label>Dirección</label></td>
				<td><input type="text" name="txtDireccion"></td>
			</tr>
			<tr>
				<td><label>Teléfono Trabajo</label></td>
				<td><input type="text" name="txtTelTrabajo"></td>
			</tr>
			<tr>
				<td><label>Teléfono Móvil</label></td>
				<td><input type="text" name="txtTelMovil"></td>
			</tr>
			<tr>
				<td><label>Correo Electrónico</label></td>
				<td><input type="email" name="txtEmail"></td>
			</tr>
			<tr>
				<td><label>Foto</label></td>
				<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
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