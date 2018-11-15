<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php echo base_url();?>CLogin/ingresar" method="POST">
		<table>
			<tr>
				<td><label>Usuario</label></td>
				<td><input type="text" name="txtUsuario"></td>
			</tr>
			<tr>
				<td><label>Contraseña</label></td>
				<td><input type="password" name="txtPassword"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Ingresar" name="submit"></td>
			</tr>
		</table>
	</form>
	<h2><?php if(isset($mensaje)) echo $mensaje; ?></h2>
        <?=validation_errors();?><!--mostrar los errores de validación-->
</body>
</html>