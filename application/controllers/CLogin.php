<?php
/**
 * Controlador Login
 */
class CLogin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mUsuario');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	}

	public function index()
	{
		$this->load->view('templates/Header');		
		$this->load->view('vLogin');
		$this->load->view('templates/Footer');		
	}

	public function ingresar()
	{
		if($this->input->post("submit")){
			//Definición de reglas para validación de formularios
			$this->form_validation->set_rules('txtUsuario', 'Usuario', 'required');
			$this->form_validation->set_rules('txtPassword', 'Contraseña', 'required');

			$this->form_validation->set_message('required','El campo %s es obligatorio');	        

	        if($this->form_validation->run()==false)
	        { 
	        	//Si la validación es incorrecta
	            $datos["mensaje"]="Validación incorrecta";
	            $this->load->view('templates/Header');	
	            $this->load->view("vLogin",$datos);
	            $this->load->view('templates/Footer');
	        }
	        else
	        {
	            $this->mUsuario->setUsuario($this->input->post('txtUsuario'));
	            $this->mUsuario->setPassword(sha1($this->input->post('txtPassword')));
	            $res = $this->mUsuario->login($this->mUsuario);
	            if($res == 1)
	            {
	            	//$datos["mensaje"]="Bienvenido ".$this->mUsuario->getUsuario();
	            	//$this->load->view("usuario/vUsuario",$datos);
	            	redirect('CContacto/index/','refresh');
	            }
	            else
	            {
	            	$datos["mensaje"] = "Usuario y/o contraseña incorrectos";
	            	$this->load->view('templates/Header', $datos);	
	            	$this->load->view("vLogin",$datos);
	            	$this->load->view('templates/Footer');
	            }
	        }	              
    	}
	}

}
?>