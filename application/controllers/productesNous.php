<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class productos extends controlador {

	public function index() {
		$idioma = $this->lang->lang();	
		
		if ($idioma == "es") {
			$this->nuevos(null);
		}
		else {
			$this->nous(null);
		}
		
	}
	
	
	public function nous($Nom = null) {
		$this->carregaDades('S',$Nom);
	}
	
	public function nuevos($Nom = null) {
		$this->carregaDades('S',$Nom);
	}
	
	public function seminous($Nom = null) {
		$this->carregaDades('N',$Nom);
	}
	
	public function seminuevos($Nom = null) {
		$this->carregaDades('N',$Nom);
	}
	
	private function carregaDades($Tipus, $Nom) {
		if (!is_null($Nom)) {
		
			$this->load->model('categories_model');
			$idCategoria = $this->categories_model->getId($Nom);
		} else {
			$idCategoria = null;
		}
		
		$data = $this->load_page();
		$this->load->model('productes_model');
		$data['result'] = $this->productes_model->getData($Tipus, $idCategoria);
		if ($Tipus == "S") {
			$data['main_template']  = 'productesNous';
		} else {
			$data['main_template']  = 'productesSemiNous';
		}
		$this->lang->load('productes');
		$data['title'] = lang('menu.productes');		
		$this->load->view('main_template', $data);	
	}
	


/*
	public function index($Nom = null) {
		
		if (!is_null($Nom)) {
		
			$this->load->model('categories_model');
			$idCategoria = $this->categories_model->getId($Nom);
		} else {
			$idCategoria = null;
		}
		
		$data = $this->load_page();
		$this->load->model('productes_model');
		$data['result'] = $this->productes_model->getData('S', $idCategoria);
		$data['main_template']  = 'productesNous';
		$this->lang->load('productes');
		$data['title'] = lang('menu.productes');		
		$this->load->view('main_template', $data);	
		
	}

	

	public function index()
	{

		$this->carregaDades(null);
		
	}

	private function carregaDades($idCategoria = null) {
		$data = $this->load_page();
		$this->load->model('productes_model');
		$data['result'] = $this->productes_model->getData('S', $idCategoria);
		$data['main_template']  = 'productesNous';
		$this->lang->load('productes');
		$data['title'] = lang('menu.productes');		
		$this->load->view('main_template', $data);	

	}


	public function categoria($Nom) {

		var_dump(utf8_encode($Nom));

		$this->load->model('categories_model');
		$idCategoria = $this->categories_model->getId($Nom);


		var_dump($idCategoria);


		$this->carregaDades($idCategoria);
		
	}
*/
}

?>

