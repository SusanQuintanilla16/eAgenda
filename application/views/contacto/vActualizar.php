<div class="container">
	<div class="row">	
		<h2>Actualizar Contacto</h2>	
		<form method="POST" action="<?php echo base_url();?>CContacto/actualizar" enctype="multipart/form-data">
			<input type="hidden" name="hiddenId" value="<?php echo $contacto->Id; ?>">
			<input type="hidden" name="hiddenFoto" value="<?php echo $contacto->Foto; ?>">
			<?php
				$ruta=str_replace("/index.php", "", base_url());
				if($contacto->Foto != "")
				{
					echo "<center>";
					echo "<img border='0' src=\"".$ruta."photos\\".$contacto->Foto."\" alt='Foto del Contacto' widht='100' height='100' class='img-circle' name='Foto'>";
					echo "</center>";
				}
			?>
			<div class="form-group">
				<div class="col-md-6">
					<label for="txtNombres">Nombres</label>
					<input type="text" name="txtNombres" value="<?php echo $contacto->Nombres; ?>" class="form-control">
				</div>
				<div class="col-md-6">
					<label for="txtApellidos">Apellidos</label>
					<input type="text" name="txtApellidos" value="<?php echo $contacto->Apellidos; ?>" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<label for="txtDireccion">Dirección</label>
					<input type="text" name="txtDireccion" value="<?php echo $contacto->Direccion; ?>" class="form-control">
				</div>
				<div class="col-md-3">
					<label for="txtTelTrabajo">Teléfono Trabajo</label>
					<input type="text" name="txtTelTrabajo" value="<?php echo $contacto->TelTrabajo; ?>" class="form-control">
				</div>
				<div class="col-md-3">
					<label for="txtTelMovil">Teléfono Móvil</label>
					<input type="text" name="txtTelMovil" value="<?php echo $contacto->TelMovil; ?>" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<label for="txtEmail">Correo Electrónico</label>
					<input type="email" name="txtEmail" value="<?php echo $contacto->Email; ?>" class="form-control">
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