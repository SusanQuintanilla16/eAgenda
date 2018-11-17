<?php
/**
 * prueba desde rama de ale
 */
class CUsuario extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('admin'))
		{
			//Solo el usuario admin puede ver usuarios	
			$this->load->model('mUsuario');
			$this->load->library('form_validation');
			$this->load->library('encrypt');
		}
		else
		{
			echo '<script language="javascript">alert("';
			echo "No posee los permisos para acceder a este sitio";
			echo '");window.location=window.history.back();</script>';
		}
	}

	public function index()
	{
		$data['listaUsuarios'] = $this->mUsuario->lista();
		$this->load->view('usuario/vLista', $data);
	}

	public function create()
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
	            $this->mUsuario->setPassword(sha1($this->input->post('txtPassword')));
	            $value = $this->mUsuario->guardar($this->mUsuario);
	            if($value)
	            {
	            	redirect('CUsuario/index','refresh');
	            }
	            else
	            {
	            	echo '<script language="javascript">alert("';
					echo "Este usuario ya está registrado en el sistema";
					echo '");window.location=window.history.back();</script>';
	            }
	        }	              
    	}
    }

    public function delete($id)
    {
    	if($id != null)
		{
			$this->mUsuario->delete($id);
			redirect('CUsuario/index/','refresh');	
		}
    }

    public function logout()
    {
    	$keys = array('usuario', 'idUsuario');
		$this->session->unset_userdata($keys);
		$this->session->sess_destroy();
		ob_clean();
    	redirect(base_url());
    }

}
?>