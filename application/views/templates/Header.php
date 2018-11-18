<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://susanquintanilla.000webhostapp.com/CodeIgniterv3/public/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>.::Agenda Electrónica::.</title>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Agenda Electrónica</a>
    </div>
    <ul class="nav navbar-nav">
    	<li><a href="<?php echo base_url();?>CContacto/index">Contactos</a></li>
    <?php
		if($this->session->userdata('admin'))
	{
	?>
      <li><a href="<?php echo base_url();?>CUsuario/index">Usuarios</a></li>
  <?php }?>            
    </ul>
    <ul class="nav navbar-nav navbar-right">
    	<?php
if(!$this->session->userdata('usuario'))
{
?>
      <li><a href="<?php echo base_url();?>CLogin/index"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
  <?php } 
  else{?>
  	<li><a href="#"><b>Usuario: </b><?php echo $this->session->userdata('usuario');?></a></li>
  	<li><a href="<?php echo base_url();?>CLogin/logout" onClick="return confirm('¿Está seguro de cerrar sesión?');"><span class="glyphicon glyphicon-off"></span> Cerrar Sesión</a></li>
  <?php }?>
    </ul>
  </div>
</nav>