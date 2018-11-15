<?php
/**
 * prueba desde rama de ale
 */
class CUsuario extends CI_Controller
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
		$this->load->view("usuario/vUsuario");
	}

	public function ingresar()
	{
		if($this->input->post("submit")){
			//Definición de reglas para validación de formularios
			$this->form_validation->set_rules('txtUsuario', 'Usuario', 'required|min_length[3]|trim');
			$this->form_validation->set_rules('txtPassword', 'Contraseña', 'required|min_length[3]');
			$this->form_validation->set_rules('txtConfirmP', 'Confirma de Contraseña', 'required|min_length[3]|matches[txtPassword]');

			$this->form_validation->set_message('required','El campo %s es obligatorio');
	        $this->form_validation->set_message('min_length[3]','El campo %s debe tener mas de 3 caracteres');
	        $this->form_validation->set_message('matches[txtPassword]','El campo Confirma de Contraseña debe coincidir con la Contraseña');

	        if($this->form_validation->run()==false)
	        { 
	        	//Si la validación es incorrecta
	            $datos["mensaje"]="Validación incorrecta";
	            $this->load->view("usuario/vUsuario",$datos);
	        }
	        else
	        {
	            $this->mUsuario->setUsuario($this->input->post('txtUsuario'));
	            $this->mUsuario->setPassword($this->encrypt->sha1($this->input->post('txtPassword')));
	            $this->mUsuario->guardar($this->mUsuario);
	        }	              
    	}
    }

}
?>