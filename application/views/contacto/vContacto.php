<div class="container">
	<div class="row">
		<h2>Ingresar Contacto</h2>
		<form method="POST" action="<?php echo base_url();?>CContacto/ingresar" enctype="multipart/form-data">
			<div class="form-group">
				<div class="col-md-6">
					<label for="txtNombres">Nombres</label>
					<input type="text" name="txtNombres" class="form-control">
				</div>
				<div class="col-md-6">
					<label for="txtApellidos">Apellidos</label>
					<input type="text" name="txtApellidos" class="form-control">
				</div>
			</div>		
			<div class="form-group">
				<div class="col-md-6">
					<label for="txtDireccion">Dirección</label>
					<input type="text" name="txtDireccion" class="form-control">
				</div>
				<div class="col-md-3">
					<label for="txtTelTrabajo">Teléfono Trabajo</label>
					<input type="text" name="txtTelTrabajo" class="form-control">
				</div>
				<div class="col-md-3">
					<label for="txtTelMovil">Teléfono Móvil</label>
					<input type="text" name="txtTelMovil" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<label for="txtEmail">Correo Electrónico</label>
					<input type="email" name="txtEmail" class="form-control">
				</div>
				<div class="col-md-6">
					<label for="fileToUpload">Foto</label>
					<input type="file" name="fileToUpload" id="fileToUpload" accept="image/x-png, image/jpeg, image/jpg">
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