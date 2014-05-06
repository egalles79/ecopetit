<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class contractes_model extends CI_Model {
    public function __construct()
	{
	parent::__construct();
}

	function getData() {
		$idioma = $this->lang->lang();
		$this->db->start_cache();
		$this->db->select('idContracte,idVenedor,DataEntrada,DataLimit,Estat,idBotiga,CodiPromocio');
		$this->db->from('contractes');
		$this->db->flush_cache();
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			// almacenamos en una matriz bidimensional
			foreach($query->result() as $row) {
			$arrDato['idContracte']= htmlspecialchars($row->idContracte, ENT_QUOTES);
			$arrDato['idVenedor']= htmlspecialchars($row->idVenedor, ENT_QUOTES);
			$arrDato['DataEntrada']= htmlspecialchars($row->DataEntrada, ENT_QUOTES);
			$arrDato['DataLimit']= htmlspecialchars($row->DataLimit, ENT_QUOTES);
			$arrDato['Estat']= htmlspecialchars($row->Estat, ENT_QUOTES);
			$arrDato['idBotiga']= htmlspecialchars($row->idBotiga, ENT_QUOTES);
			$arrDato['CodiPromocio']= htmlspecialchars($row->CodiPromocio, ENT_QUOTES);
				$arrDatos[]      = $arrDato;
			}
			$query->free_result();
			return $arrDatos;
		}
	}
	function inserta($idContracte,$idVenedor,$DataEntrada,$DataLimit,$Estat,$idBotiga,$CodiPromocio )
	{
		$this->db->start_cache();
		$this->db->insert('contractes', array('idVenedor' => $idVenedor)); 
		$this->db->insert('contractes', array('DataEntrada' => $DataEntrada)); 
		$this->db->insert('contractes', array('DataLimit' => $DataLimit)); 
		$this->db->insert('contractes', array('Estat' => $Estat)); 
		$this->db->insert('contractes', array('idBotiga' => $idBotiga)); 
		$this->db->insert('contractes', array('CodiPromocio' => $CodiPromocio)); 
		$this->db->flush_cache();

	}
}
