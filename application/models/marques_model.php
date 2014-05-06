<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class marques_model extends CI_Model {
 
    public function __construct()
	{
		parent::__construct();
	}
	
	
    function getData()
	{
			
				
		$idioma = $this->lang->lang();
		
		$this->db->start_cache();
			
		$this->db->distinct();
		$this->db->select('idMarca, Nom');
		$this->db->from('marques');
		$this->db->order_by('Nom', "random"); 
		$this->db->limit(10);
		
		
		$this->db->flush_cache();
		
		$query = $this->db->get();
		
			 
		// si hay resultados
		if ($query->num_rows() > 0) {
			// almacenamos en una matriz bidimensional
			foreach($query->result() as $row) {
					$arrDato['idMarca']= htmlspecialchars($row->idMarca, ENT_QUOTES);
					$arrDato['NomMarca'] = htmlspecialchars($row->Nom, ENT_QUOTES);					
					$arrDatos[]      = $arrDato;
			}
			$query->free_result();
				

			return $arrDatos;
		}			
	}
}