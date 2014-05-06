<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class productesSemiNous extends controlador {

	public function index()
	{
		$data = $this->load_page();
		
		$this->load->model('productes_model');
		$data['result'] = $this->productes_model->getData('N');
		$data['main_template']  = 'productesSemiNous';
		$this->lang->load('productes');
		$data['title'] = lang('menu.productes');		
		$this->load->view('main_template', $data);		
	}

}

?>

