<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Usuarios</h1>
	<form method="POST" action="<?php echo base_url();?>CUsuario/ingresar">
		<table>
			<tr>
				<td><label>Usuario</label></td>
				<td><input type="text" name="txtUsuario" value="<?php echo set_value('txtUsuario'); ?>"></td>
			</tr>
			<tr>
				<td><label>Contraseña</label></td>
				<td><input type="password" name="txtPassword" value="<?php echo set_value('txtPassword'); ?>"></td>
			</tr>
			<tr>
				<td><label>Confirmar Contraseña</label></td>
				<td><input type="password" name="txtConfirmP" value="<?php echo set_value('txtConfirmP'); ?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Guardar"></td>
			</tr>
		</table>
	</form>
	<h2><?php if(isset($mensaje)) echo $mensaje; ?></h2>
        <?=validation_errors();?><!--mostrar los errores de validación-->
</body>
</html>