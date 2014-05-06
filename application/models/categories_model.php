<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class categories_model extends CI_Model {
 
    public function __construct()
	{
		parent::__construct();
	}
	

	function getNom($idCategoria) {


		$this->db->start_cache();

		$this->db->select('idCategoria, Nom_ca, Nom_es');
		$this->db->from('categories');
		$this->db->where('idCategoria', $idCategoria);
		
		$this->db->flush_cache();

		$query = $this->db->get();

		

		if ($query->num_rows() > 0) {
			$row = $query->row();
			//print_r($row).die;
			$arrDades['idCategoria'] = htmlspecialchars($row->idCategoria, ENT_QUOTES);
			$arrDades['Nom_ca'] = htmlspecialchars($row->Nom_ca, ENT_QUOTES);
			$arrDades['Nom_es'] = htmlspecialchars($row->Nom_es, ENT_QUOTES);


			$query->free_result();

			return $arrDades;
		}


	}
	function getId($NomCategoria) {


		$NomCategoria = str_replace("-", " ", $NomCategoria);

		$NomCategoria = htmlspecialchars($NomCategoria, ENT_QUOTES);


		
		$this->db->start_cache();

		$this->db->select('idCategoria, Nom_ca, Nom_es');
		$this->db->from('categories');
		$this->db->like('Nom_es', $NomCategoria);
		$this->db->or_like('Nom_ca', $NomCategoria); 
		
		$this->db->flush_cache();

		$query = $this->db->get();

		

		if ($query->num_rows() > 0) {
			$row = $query->row();
			//print_r($row).die;
			$arrDades['idCategoria'] = htmlspecialchars($row->idCategoria, ENT_QUOTES);
			$arrDades['Nom_ca'] = htmlspecialchars($row->Nom_ca, ENT_QUOTES);
			$arrDades['Nom_es'] = htmlspecialchars($row->Nom_es, ENT_QUOTES);


			$query->free_result();

			return $arrDades;
		}


	}

    function getData($Nou)
	{
			
				
		$idioma = $this->lang->lang();
		
		$this->db->start_cache();
			
		$this->db->distinct();
		$this->db->select('categories.idCategoria, categories.Nom_'.$idioma.' NomCategoria');
		$this->db->from('articles');
		$this->db->join('grupproducte', 'grupproducte.idGrup = articles.idGrup');
		$this->db->join('categories', 'grupproducte.idCategoria = categories.idCategoria');
		$this->db->where('articles.estat', 'E');
		$this->db->where('articles.publicat_web', 'S');
		
		if ($Nou == "S") {
			$this->db->where('articles.nou_sn', 'S');
		}
		else {
			$this->db->where('articles.endiposit_sn', 'S');
		}
		
		
		$this->db->order_by('categories.Nom_'.$idioma, "asc"); 
		
		
		
		$this->db->flush_cache();
		
		$query = $this->db->get();
		
			 
		// si hay resultados
		if ($query->num_rows() > 0) 
		{
			// almacenamos en una matriz bidimensional
			foreach($query->result() as $row) 
			{
					$arrDato['idCategoria']= htmlspecialchars($row->idCategoria, ENT_QUOTES);
					$arrDato['NomCategoria'] = htmlspecialchars($row->NomCategoria, ENT_QUOTES);					
					$arrDatos[]      = $arrDato;
			}
			$query->free_result();
				

			return $arrDatos;
		}
			
	}	
}