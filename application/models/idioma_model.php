<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Idioma_model extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}

	//hacemos la inserción en la tabla correspondiente
	public function nuevo_usuario($nombre,$password,$email,$idioma)
	{
		$data = array(
			'nombre_'.$idioma 		=> 		$nombre,
			'password_'.$idioma 	=>		$password,
			'email_'.$idioma 		=>		$email
		);

		return $this->db->insert('usuarios_'.$idioma,$data);
	}
}