<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class grupproducte_model extends CI_Model {
 
    public function __construct()
	{
		parent::__construct();
	}
	
	
    function getData()
	{
			
				
		$idioma = $this->lang->lang();
		
		$this->db->start_cache();
			
		$this->db->distinct();
		$this->db->select('grupproducte.idGrup, grupproducte.Nom_ca NomGrup');
		$this->db->from('grupproducte');
		$this->db->order_by('grupproducte.Nom_ca', "asc"); 
		
		
		
		$this->db->flush_cache();
		
		$query = $this->db->get();
		
			 
		// si hay resultados
		if ($query->num_rows() > 0) {
			// almacenamos en una matriz bidimensional
			foreach($query->result() as $row) {
					$arrDato['idGrup']= htmlspecialchars($row->idGrup, ENT_QUOTES);
					$arrDato['NomGrup'] = htmlspecialchars($row->NomGrup, ENT_QUOTES);					
					$arrDatos[]      = $arrDato;
			}
			$query->free_result();
				

			return $arrDatos;
		}			
	}	
}