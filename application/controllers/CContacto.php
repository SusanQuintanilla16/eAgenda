<?php
/**
 * Controlador: Contacto
 */
class CContacto extends CI_Controller
{		
	function __construct()
	{
		parent::__construct();
		$this->load->model('mContacto');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$IdUsuario = 0;
    	if(null !== $this->session->userdata('idUsuario'))
    	{
    		$IdUsuario=$this->session->userdata('idUsuario');
    	}
    	else
    	{
    		$IdUsuario = 2;
    	}
		$datos['usuario']=$this->session->userdata('usuario');		
		$datos['misContactos'] = $this->mContacto->getContactos($IdUsuario);
		$this->load->view("contacto/vLista",$datos);
	}

	public function add()
	{
		$this->load->view('contacto/vContacto');
	}

	public function ingresar()
	{
		if($this->input->post("submit")){
			//Definición de reglas para validación de formularios
			$this->form_validation->set_rules('txtNombres', 'Nombres', 'required');
			$this->form_validation->set_rules('txtApellidos', 'Apellidos', 'required');

			$this->form_validation->set_message('required','El campo %s es obligatorio');	        

	        if($this->form_validation->run()==false)
	        { 
	        	//Si la validación es incorrecta
	            $datos["mensaje"]="Faltan campos";
	            $this->load->view("contacto/vContacto",$datos);
	        }
	        elseif (empty($this->input->post('txtTelTrabajo')) && empty($this->input->post('txtTelMovil')) && empty($this->input->post('txtEmail'))) 
	        {
	        	$datos["mensaje"]="Agregue al menos un medio de contacto";
	        	$this->load->view("contacto/vContacto",$datos);
	        }
	        else
	        {
	        	$this->mContacto->setNombres($this->input->post('txtNombres'));
				$this->mContacto->setApellidos($this->input->post('txtApellidos'));
				$this->mContacto->setDireccion($this->input->post('txtDireccion'));
				$this->mContacto->setTelTrabajo($this->input->post('txtTelTrabajo'));
				$this->mContacto->setTelMovil($this->input->post('txtTelMovil'));
				$this->mContacto->setEmail($this->input->post('txtEmail'));

	        	//Para subir la imagen
	        	$mi_imagen = 'fileToUpload';
			    $config['upload_path'] = "./photos/";
			    $config['allowed_types'] = "jpg|jpeg|png";
			    $config['overwrite']=TRUE;
			    $config['max_size'] = "50000";
			    $config['max_width'] = "2000";
			    $config['max_height'] = "2000";

			    $this->load->library('upload', $config);

			    if (!$this->upload->do_upload($mi_imagen)) {
			        //*** ocurrio un error
			        $data['uploadError'] = $this->upload->display_errors();
			        echo $this->upload->display_errors();
			        return;
			    }
			    else{
			    	//Si sube la foto, toma el nombre y lo anexa al contacto
			    	$this->mContacto->setFoto($this->upload->data('file_name'));
			    }							

				$this->mContacto->guardar($this->mContacto);				

				redirect('CContacto/index','refresh');
			}
		}
	}

	public function update($id)
	{
		if($id != null)
		{
			$contacto=$this->mContacto->getContactById($id);
			$datos['contacto']=$contacto;
			$this->load->view("contacto/vActualizar",$datos);
		}
	}

	public function delete($id)
	{
		if($id != null)
		{
			$this->mContacto->eliminar($id);
			redirect('CContacto/index/','refresh');	
		}
	}

	public function actualizar()
	{
		if($this->input->post("submit")){
			//Definición de reglas para validación de formularios
			$this->form_validation->set_rules('txtNombres', 'Nombres', 'required');
			$this->form_validation->set_rules('txtApellidos', 'Apellidos', 'required');

			$this->form_validation->set_message('required','El campo %s es obligatorio');	        

	        if($this->form_validation->run()==false)
	        { 
	        	//Si la validación es incorrecta
	            $datos["mensaje"]="Faltan campos";
	            $this->load->view("contacto/vActualizar",$datos);
	        }
	        elseif (empty($this->input->post('txtTelTrabajo')) && empty($this->input->post('txtTelMovil')) && empty($this->input->post('txtEmail'))) 
	        {
	        	$datos["mensaje"]="Agregue al menos un medio de contacto";
	        	$this->load->view("contacto/vActualizar",$datos);
	        }
	        else
	        {
	        	$this->mContacto->setId($this->input->post('hiddenId'));
	        	$this->mContacto->setNombres($this->input->post('txtNombres'));
				$this->mContacto->setApellidos($this->input->post('txtApellidos'));
				$this->mContacto->setDireccion($this->input->post('txtDireccion'));
				$this->mContacto->setTelTrabajo($this->input->post('txtTelTrabajo'));
				$this->mContacto->setTelMovil($this->input->post('txtTelMovil'));
				$this->mContacto->setEmail($this->input->post('txtEmail'));
	            $this->mContacto->actualizar($this->mContacto);
	            
	            redirect('CContacto/index/','refresh');	            
	        }	              
    	
		}
	}
}
?>