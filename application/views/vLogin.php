<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h2>Iniciar Sesión</h2>
			<form action="<?php echo base_url();?>CLogin/ingresar" method="POST" >
				<div class="form-group">
					<label for="txtUsuario">Usuario</label>
					<input type="text" name="txtUsuario" class="form-control">
				</div>
				<div class="form-group">
					<label for="txtPassword">Contraseña</label>
					<input type="password" name="txtPassword" class="form-control">
				</div>

				<input type="submit" value="Ingresar" name="submit" class="btn btn-default">				
			</form>
			<br/>
			<?php if(isset($mensaje)) echo '<div class="alert alert-danger">'.$mensaje.'</div>' ?>
			        <?=validation_errors();?><!--mostrar los errores de validación-->
	    </div>
	</div>
</div>