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
		//Agregar validación que no se puedan ingresar dos usuarios con
		//el mismo username	
		$UsuarioArray = array(
			'Usuario' => $usuario->getUsuario(),
			'Password' => $usuario->getPassword()
		);
		$this->db->insert('usuario',$UsuarioArray);
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
		$query=$this->db->get();
		return $query->result();
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