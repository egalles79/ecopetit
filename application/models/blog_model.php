<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class blog_model extends CI_Model {
 
    public function __construct()
	{
		parent::__construct();
	}
	

	
	function insertaEntrada($titol, $contingut, $tipus) {

		$data = array(
			   'titol' => $titol ,
			   'contingut' => $contingut ,
			   'tipus' => $tipus,
			   'data_entrada' => date('Y-m-d'),
			   'publicat' => 0
			  );

		$this->db->start_cache();
		$this->db->insert('entrada_blog',$data);
		$this->db->flush_cache();
		return $this->db->insert_id();
	}
	
	function insertaImatge($idEntrada, $imatge, $ordre) {

		$data = array(
			   'id_entrada' => $idEntrada ,
			   'imatge' => $imatge ,
			   'ordre' => $ordre
			  );

		$this->db->start_cache();
		$this->db->insert('entrada_blog_imatges',$data);
		$this->db->flush_cache();
	}
	
	function esborraImatge($id) {

		$this->db->start_cache();
		$this->db->delete('entrada_blog_imatges', array('id' => $id)); 
		$this->db->flush_cache();
	}
	
		
	function insertaVideo($idEntrada, $url) {

		$data = array(
			   'id_entrada' => $idEntrada ,
			   'url_video' => $url 
			  );

		$this->db->start_cache();
		$this->db->insert('entrada_blog_video',$data);
		
	}
	
	
	function esborraVideo($id) {

		$this->db->start_cache();
		$this->db->delete('entrada_blog_video', array('id' => $id)); 
		$this->db->flush_cache();
	}
	
	
	
	function getEntrada($id) {
	
		$this->db->start_cache();
		$this->db->select('titol, contingut, tipus, data_entrada, publicat');
		$this->db->from('entrada_blog');
		$this->db->where('id',$id);
		$this->db->order_by('data_entrada', "desc"); 
		
		$this->db->flush_cache();
		
		$query = $this->db->get();
		
		// si hay resultados
		if ($query->num_rows() > 0) {
			// almacenamos en una matriz bidimensional
			foreach($query->result() as $row) {
					$arrDato['titol']= htmlspecialchars($row->titol, ENT_QUOTES);
					$arrDato['contingut'] = htmlspecialchars($row->contingut, ENT_QUOTES);
					$arrDato['tipus'] = htmlspecialchars($row->tipus, ENT_QUOTES);					
					$arrDato['data_entrada'] = htmlspecialchars($row->data_entrada, ENT_QUOTES);					
					$arrDato['publicat'] = htmlspecialchars($row->publicat, ENT_QUOTES);					
					$arrDatos[]      = $arrDato;
			}
			$query->free_result();
				

			return $arrDatos;
		}		
	}
	
	
	function getVideo($idEntrada) {
		$this->db->start_cache();
		$this->db->select('id, url_video');
		$this->db->from('entrada_blog_video');
		$this->db->where('id_entrada',$idEntrada);
		//$this->db->order_by('data_entrada', "desc"); 
		
		$this->db->flush_cache();
		
		$query = $this->db->get();
		
		// si hay resultados
		if ($query->num_rows() > 0) {
			// almacenamos en una matriz bidimensional
			foreach($query->result() as $row) {
					$arrDato['id']= htmlspecialchars($row->id, ENT_QUOTES);
					$arrDato['url_video'] = htmlspecialchars($row->url_video, ENT_QUOTES);									
					$arrDatos[]      = $arrDato;
			}
			$query->free_result();
				

			return $arrDatos;
		}		
	}
	
	function getImatges($idEntrada) {
		$this->db->start_cache();
		$this->db->select('id, imatge, ordre');
		$this->db->from('entrada_blog_imatges');
		$this->db->where('id_entrada',$idEntrada);
		$this->db->order_by('ordre', "asc"); 
		
		$this->db->flush_cache();
		
		$query = $this->db->get();
		
		// si hay resultados
		if ($query->num_rows() > 0) {
			// almacenamos en una matriz bidimensional
			foreach($query->result() as $row) {
					$arrDato['id']= htmlspecialchars($row->id, ENT_QUOTES);
					$arrDato['imatge'] = htmlspecialchars($row->imatge, ENT_QUOTES);									
					$arrDato['ordre'] = htmlspecialchars($row->ordre, ENT_QUOTES);									
					$arrDatos[]      = $arrDato;
			}
			$query->free_result();
				

			return $arrDatos;
		}		
	}
	
	
	
	
    function getData()
	{
							
	
		$this->db->start_cache();
		$this->db->select('id, titol, contingut, tipus, data_entrada, publicat');
		$this->db->from('entrada_blog');
		$this->db->order_by('data_entrada', "desc"); 
		
		$this->db->flush_cache();
		
		$query = $this->db->get();
		
		// si hay resultados
		if ($query->num_rows() > 0) {
			// almacenamos en una matriz bidimensional
			foreach($query->result() as $row) {
					$arrDato['id']= htmlspecialchars($row->id, ENT_QUOTES);
					$arrDato['titol']= htmlspecialchars($row->titol, ENT_QUOTES);
					$arrDato['contingut'] = htmlspecialchars($row->contingut, ENT_QUOTES);
					$arrDato['tipus'] = htmlspecialchars($row->tipus, ENT_QUOTES);					
					$arrDato['data_entrada'] = htmlspecialchars($row->data_entrada, ENT_QUOTES);					
					$arrDato['publicat'] = htmlspecialchars($row->publicat, ENT_QUOTES);					
					$arrDatos[]      = $arrDato;
			}
			$query->free_result();
				

			return $arrDatos;
		}
	}	
}