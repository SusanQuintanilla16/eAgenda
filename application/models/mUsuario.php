<?php
/**
 * Modelo Usuario
 */
class mUsuario extends CI_Model
{
	private $Id;
	private $Usuario;
	private $Password;
	
	function __construct()
	{
		parent::__construct();
		$this->Id = 0;
		$this->Usuario = '';
		$this->Password = '';
	}

	public function guardar($usuario)
	{	
		$this->db->select('usuario');
		$this->db->from('usuario');
		$this->db->where('usuario',$usuario->getUsuario());	
		$query = $this->db->get();
		if($query->num_rows() <= 0)
    	{
			$UsuarioArray = array(
				'Usuario' => $usuario->getUsuario(),
				'Password' => $usuario->getPassword()
			);
			$this->db->insert('usuario',$UsuarioArray);
			return 1;
		}
		else return 0;
	}

	public function login($usuario)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('usuario',$usuario->getUsuario());
		$this->db->where('password',$usuario->getPassword());
		$query = $this->db->get();
		if ( $query->num_rows() > 0 )
    	{
    		$user = $query->row();
    		$this->session->set_userdata('usuario',$user->Usuario);  
    		$this->session->set_userdata('idUsuario',$user->Id);
    		if($user->Usuario=='admin')
    		{
    			//Si es admin, pone bandera
    			$this->session->set_userdata('admin',1);
    		}	
    		return 1;
    	}
    	else
    	{
    		return 0;
    	}
	}

	//Función para obtener usuarios
	public function lista()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('Id !=',1);
		$this->db->where('Id !=',2);
		$query=$this->db->get();
		return $query->result();
	}

	//Función para eliminar usuario
	public function delete($id)
	{
		$this->db->where('Id', $id);
        $this->db->delete('usuario');
	}

	//Sección de Getters y Setters
	public function getId()
	{
		return $this->Id;
	}

	public function getUsuario()
	{
		return $this->Usuario;
	}

	public function getPassword()
	{
		return $this->Password;
	}

	public function setId($Id)
	{
		$this->Id = $Id;
	}

	public function setUsuario($Usuario)
	{
		$this->Usuario = $Usuario;
	}

	public function setPassword($Password)
	{
		$this->Password = $Password;
	}
}
?>