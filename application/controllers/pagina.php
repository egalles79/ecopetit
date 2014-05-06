<?php
class pagina extends CI_Controller {

	private function _load_page()
	{
		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->lang->load('capsalera');
		$this->lang->load('menu');
		$this->lang->load('footer');	
	}

	public function index()
	{
		$data['main_template']  = 'index';
		$this->_load_page();
		$this->lang->load('inici');
		
		$data['title'] = lang('menu.inici');
		
		$this->load->view('main_template', $data);		
	}
		
	public function quisom() {
		$data['title']  = 'Qui som';
		$data['main_template']  = 'quisom';
		$this->_load_page();
		$this->lang->load('quisom');
		$this->load->view('main_template', $data);
	}
	public function comfuncionem() {
		$data['title']  = 'Com funcionem';
		$data['main_template']  = 'comfuncionem';
		$this->load->view('main_template', $data);
	}
	public function productesnous() {
		$data['title']  = 'Productes nous';
		$data['main_template']  = 'productesnous';
		$this->load->view('main_template', $data);
	}
	public function productesseminous() {
		$data['title']  = 'Productes seminous';
		$data['main_template']  = 'productesseminous';
		$this->load->view('main_template', $data);
	}
	public function contacte() {
		$data['title']  = 'Contacte';
		$data['main_template']  = 'contacte';
		$this->load->view('main_template', $data);
	}	

}