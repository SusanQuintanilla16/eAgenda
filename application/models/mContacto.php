<?php 
/**
 * Modelo Contacto
 */
class mContacto extends CI_Model
{
	private $Id;
	private $Nombres;
	private $Apellidos;
	private $Direccion;
	private $TelTrabajo;
	private $TelMovil;
	private $Email;
	private $Foto;
	private $IdUsuario;	

	function __construct()
	{
		parent::__construct();		
		$Id = 0;
		$Nombres = '';
		$Apellidos = '';
		$Direccion = '';
		$TelTrabajo = '';
		$TelMovil = '';
		$Email = '';
		$IdUsuario =0;		
	}

	//Si no se loguea el usuario se guardara como 
	//contacto de un usuario anonimo
    public function guardar($contacto){
    	$IdUsuario = 0;
    	if(null !== $this->session->userdata('idUsuario'))
    	{
    		$IdUsuario=$this->session->userdata('idUsuario');
    	}
    	else
    	{
    		$IdUsuario = 2;
    	}
    	$ContactoArray=array(
			'IdUsuario' => $IdUsuario,
			'Nombres' => $contacto->getNombres(),
			'Apellidos' => $contacto->getApellidos(),
			'Direccion' => $contacto->getDireccion(),
			'TelTrabajo' => $contacto->getTelTrabajo(),
			'TelMovil' => $contacto->getTelMovil(),
			'Email' => $contacto->getEmail(),
			'Foto' => $contacto->getFoto()
		);
		$this->db->insert('contacto',$ContactoArray);
	}

	//Función para obtener los contactos de la persona
	//que inicio sesión
	public function getContactos($id)
	{
		$this->db->select('*');
		$this->db->from('contacto');
		$this->db->where('IdUsuario',$id);
		$query = $this->db->get();
		return $query->result();
	}

	//Función para obtener un contacto por id
	public function getContactById($id)
	{
		$this->db->select('*');
		$this->db->from('contacto');
		$this->db->where('Id',$id);
		$query = $this->db->get();
		if ( $query->num_rows() > 0 )
    	{
    		$user = $query->row();
    		return $user;
    	}
    	else return null;
	}

	//Función para actualizar registro
	public function actualizar($contacto){

		$IdUsuario = 0;
    	if(null !== $this->session->userdata('idUsuario'))
    	{
    		$IdUsuario=$this->session->userdata('idUsuario');
    	}
    	else
    	{
    		$IdUsuario = 2;
    	}
    	$ContactoArray=array(
			'IdUsuario' => $IdUsuario,
			'Nombres' => $contacto->getNombres(),
			'Apellidos' => $contacto->getApellidos(),
			'Direccion' => $contacto->getDireccion(),
			'TelTrabajo' => $contacto->getTelTrabajo(),
			'TelMovil' => $contacto->getTelMovil(),
			'Email' => $contacto->getEmail()
		);
		$this->db->where('Id', $contacto->getId());
        $this->db->update('contacto', $ContactoArray);
	}

	//Función para eliminar registro
	public function eliminar($id)
	{
		$this->db->where('Id', $id);
        $this->db->delete('contacto');
	} 

	//Sección de getters y setters
	public function getFoto(){
		return $this->Foto;
	}

	public function getId(){
		return $this->Id;
	}

	public function getNombres(){
		return $this->Nombres;
	}

	public function getApellidos(){
		return $this->Apellidos;
	}

	public function getDireccion(){
		return $this->Direccion;
	}

	public function getTelTrabajo(){
		return $this->TelTrabajo;
	}

	public function getTelMovil(){
		return $this->TelMovil;
	}

	public function getEmail(){
		return $this->Email;
	}

	public function getIdUsuario(){
		return $this->IdUsuario;
	}

	public function setId($Id) {
        $this->Id = $Id;
    }

    public function setNombres($Nombres) {
        $this->Nombres = $Nombres;
    }

    public function setFoto($Foto) {
        $this->Foto = $Foto;
    }

    public function setApellidos($Apellidos) {
        $this->Apellidos = $Apellidos;
    }

    public function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    public function setTelTrabajo($TelTrabajo) {
        $this->TelTrabajo = $TelTrabajo;
    }

    public function setTelMovil($TelMovil) {
        $this->TelMovil = $TelMovil;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
    }

    public function setIdUsuario($IdUsuario) {
        $this->IdUsuario = $IdUsuario;
    }
	
}
?>