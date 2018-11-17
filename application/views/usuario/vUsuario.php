<div class="container">
	<div class="row">
	<h2>Crear Usuario</h2>
	<form method="POST" action="<?php echo base_url();?>CUsuario/ingresar">
		<div class="form-group">
			<div class="col-md-6">
				<label for="txtUsuario">Usuario</label>
				<input type="text" name="txtUsuario" value="<?php echo set_value('txtUsuario'); ?>" class="form-control">
			</div>
			<div class="col-md-3">
				<label for="txtPassword">Contraseña</label>
				<input type="password" name="txtPassword" value="<?php echo set_value('txtPassword'); ?>" class="form-control">
			</div>
			<div class="col-md-3">
				<label for="txtConfirmP">Confirmar Contraseña</label>
				<input type="password" name="txtConfirmP" value="<?php echo set_value('txtConfirmP'); ?>" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<br/><center><input type="submit" value="Guardar" name="submit" class="btn btn-default"></center>
			</div>
		</div>		
	</form>
	</div>
		<?php if(isset($mensaje)) echo '<br/><div class="alert alert-danger">'.$mensaje.'</div>'; ?>
		<?=validation_errors();?><!--mostrar los errores de validación-->	
	</div>